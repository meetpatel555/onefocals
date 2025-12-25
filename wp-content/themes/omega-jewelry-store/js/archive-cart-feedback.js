jQuery(document).ready(function ($) {

    // Helper to Create Qty Control HTML
    function createQtyControl(product_id, qty) {
        return '<div class="flipkart-qty-control" data-product_id="' + product_id + '">' +
            '<button class="flipkart-qty-btn minus" type="button">-</button>' +
            '<input type="text" class="flipkart-qty-val" value="' + qty + '" readonly>' +
            '<button class="flipkart-qty-btn plus" type="button">+</button>' +
            '</div>';
    }

    // 1. Handle "Added to Cart" event
    $(document.body).on('added_to_cart', function (event, fragments, cart_hash, $button) {
        if ($button && $button.length) {
            var pid = $button.data('product_id');
            // Hide "Add to Cart" button (Main button)
            $button.hide();

            // Check if control exists next to it
            if ($button.parent().find('.flipkart-qty-control').length === 0) {
                // Insert Controls
                $button.after(createQtyControl(pid, 1));
            }
        }
    });

    // 2. Handle Plus / Minus Click
    $(document).on('click', '.flipkart-qty-btn', function (e) {
        e.preventDefault();
        var $btn = $(this);
        var $control = $btn.closest('.flipkart-qty-control');
        var $valInput = $control.find('.flipkart-qty-val');
        var currentVal = parseInt($valInput.val());
        var pid = $control.data('product_id');
        var $addToCartBtn = $control.parent().find('.add_to_cart_button');

        if ($btn.hasClass('plus')) {
            // Increase
            currentVal++;
            $valInput.val(currentVal);
            updateCartQty(pid, currentVal);

        } else {
            // Decrease
            currentVal--;
            if (currentVal <= 0) {
                // Remove Control, Show Add to Cart Button again
                $control.remove();
                $addToCartBtn.show().text('Add to Cart').removeClass('item-added-success').css({ 'background-color': '', 'color': '', 'border-color': '' });
                // Update Cart to 0 (Remove)
                updateCartQty(pid, 0);
            } else {
                $valInput.val(currentVal);
                updateCartQty(pid, currentVal);
            }
        }
    });

    // Helper: Update Cart via AJAX
    function updateCartQty(product_id, qty) {

        // We use a small bespoke AJAX endpoint for speed or standard WC logic.
        // For simplicity in a theme context, we'll hit a custom endpoint we create in functions.php
        $.ajax({
            type: 'POST',
            url: wc_add_to_cart_params.ajax_url,
            data: {
                action: 'omega_update_cart_qty',
                product_id: product_id,
                qty: qty
            },
            success: function (response) {
                // Trigger fragment refresh to update Header Cart
                $(document.body).trigger('wc_fragment_refresh');
            }
        });
    }

});
