<?php
/**
 * Customer Registration Approval and Login Logic
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * 1. Add "Pending" status to new customers
 */
add_action( 'woocommerce_created_customer', 'cw_add_activation_status_to_new_customer', 10, 3 );
function cw_add_activation_status_to_new_customer( $customer_id, $new_customer_data, $password_generated ) {
    // Add meta to indicate account is pending
    update_user_meta( $customer_id, 'pw_user_status', 'pending' );
    
    // Add a notice to inform the user
    wc_add_notice( __( 'Registration successful! Your account is currently pending approval by an administrator. You will be notified via email once approved.', 'omega-jewelry-store' ), 'success' );
}

/**
 * 2. Prevent auto-login after registration
 */
add_filter( 'woocommerce_registration_auth_new_customer', '__return_false' );

/**
 * 3. Prevent login if status is pending
 */
add_filter( 'wp_authenticate_user', 'cw_check_user_status_login', 10, 2 );
function cw_check_user_status_login( $user, $password ) {
    if ( is_wp_error( $user ) ) {
        return $user;
    }
    
    // Check if user has the restricted capability/role (customer) and status is pending
    // Admins and Store Managers should skip this check
    if ( user_can( $user, 'manage_options' ) || user_can( $user, 'manage_woocommerce' ) ) {
        return $user;
    }

    $status = get_user_meta( $user->ID, 'pw_user_status', true );
    
    // If status is specifically pending, deny login
    if ( 'pending' === $status ) {
        return new WP_Error( 'cw_account_pending', __( '<strong>Error:</strong> Your account is currently pending approval. Please wait for an administrator to approve your account.', 'omega-jewelry-store' ) );
    }
    
    return $user;
}

/**
 * 4. Add User Column to Admin
 */
add_filter( 'manage_users_columns', 'cw_add_user_status_column' );
function cw_add_user_status_column( $columns ) {
    $columns['pw_user_status'] = 'Status';
    return $columns;
}

add_action( 'manage_users_custom_column', 'cw_show_user_status_column_content', 10, 3 );
function cw_show_user_status_column_content( $value, $column_name, $user_id ) {
    if ( 'pw_user_status' == $column_name ) {
        $status = get_user_meta( $user_id, 'pw_user_status', true );
        if ( 'pending' === $status ) {
            $approve_url = wp_nonce_url( add_query_arg( array( 'action' => 'approve_user', 'user_id' => $user_id ), admin_url( 'users.php' ) ), 'approve_user_' . $user_id );
            $deny_url    = wp_nonce_url( add_query_arg( array( 'action' => 'deny_user', 'user_id' => $user_id ), admin_url( 'users.php' ) ), 'deny_user_' . $user_id );
            
            return '<span style="color:orange; font-weight:bold;">Pending</span><br>' .
                   '<a href="' . esc_url( $approve_url ) . '" class="button button-small" style="color:green; margin-top:5px;">Approve</a>'; 
                   // Deny logic could delete user or set to denied, keeping it simple for now.
        } elseif ( 'approved' === $status ) {
             return '<span style="color:green;">Approved</span>';
        } else {
             // For users who registered before this system or admins, assume approved or show nothing
             return '<span style="color:grey;">Active</span>';
        }
    }
    return $value;
}

/**
 * 5. Handle Approval Action
 */
add_action( 'admin_init', 'cw_process_user_approval' );
function cw_process_user_approval() {
    if ( isset( $_GET['action'] ) && 'approve_user' == $_GET['action'] && isset( $_GET['user_id'] ) ) {
        $user_id = intval( $_GET['user_id'] );
        if ( ! current_user_can( 'edit_users' ) ) {
            return;
        }
        
        check_admin_referer( 'approve_user_' . $user_id );
        
        update_user_meta( $user_id, 'pw_user_status', 'approved' );
        
        // Send email to user
        $user = get_userdata( $user_id );
        $to = $user->user_email;
        $subject = 'Your Account Has Been Approved';
        $message = "Hi " . $user->display_name . ",\n\nYour account has been approved. You can now log in to our store.\n\n" . site_url( '/my-account/' );
        $headers = array('Content-Type: text/plain; charset=UTF-8');
        
        wp_mail( $to, $subject, $message, $headers );
        
        wp_redirect( admin_url( 'users.php?updated=true' ) );
        exit;
    }
}

// /**
//  * 6. Force Login Redirect (All pages except Login/Register/LostPassword)
//  */
// add_action( 'template_redirect', 'cw_force_login_redirect' );
// function cw_force_login_redirect() {
//     // If user is logged in, do nothing
//     if ( is_user_logged_in() ) {
//         return;
//     }

//     // Allow the My Account page so they can actually log in or register
//     if ( is_account_page() ) {
//         return;
//     }
    
//     // Redirect to My Account page (which shows login form)
//     // wp_safe_redirect( wc_get_page_permalink( 'myaccount' ) );
//     // exit;
// }

/**
 * 7. Name Field In Registration
 */

// Validate Name
add_filter( 'woocommerce_process_registration_errors', 'cw_validate_name_field', 10, 3 );
function cw_validate_name_field( $errors, $username, $email ) {
    if ( isset( $_POST['reg_name'] ) && empty( $_POST['reg_name'] ) ) {
        $errors->add( 'reg_name_error', __( '<strong>Error</strong>: Please provide a valid name.', 'woocommerce' ) );
    }
    return $errors;
}

// Save Name
add_action( 'woocommerce_created_customer', 'cw_save_name_field' );
function cw_save_name_field( $customer_id ) {
    if ( isset( $_POST['reg_name'] ) ) {
        $name = sanitize_text_field( $_POST['reg_name'] );
        // Split name into first and last
        $parts = explode( ' ', $name, 2 );
        $first_name = $parts[0];
        $last_name = isset( $parts[1] ) ? $parts[1] : '';
        
        update_user_meta( $customer_id, 'first_name', $first_name );
        update_user_meta( $customer_id, 'last_name', $last_name );
        update_user_meta( $customer_id, 'billing_first_name', $first_name );
        update_user_meta( $customer_id, 'billing_last_name', $last_name );
        
        // Ensure role is a customer
        $user = new WP_User( $customer_id );
        $user->set_role( 'customer' );
    }
}

