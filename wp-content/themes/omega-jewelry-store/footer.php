<?php
/**
 * The template for displaying the footer
 * @package Omega Jewelry Store
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked omega_jewelry_store_content_offcanvas - 30
*/

do_action('omega_jewelry_store_before_footer_content_action'); ?>

</div>


<!-- Page Loader -->
<div id="page-loader">
    <div class="loader-spinner"></div>
</div>
<script>
window.addEventListener('load', function() {
    var loader = document.getElementById('page-loader');
    loader.style.opacity = '0';
    setTimeout(function(){ loader.style.display = 'none'; }, 500);
});
// Re-show on link click (if internal)
document.addEventListener('click', function(e) {
    var target = e.target.closest('a');
    // Ignore Add to Cart buttons (Archive/Shop) and Remove Cart Item links
    if (target && (target.classList.contains('add_to_cart_button') || target.classList.contains('ajax_add_to_cart') || target.classList.contains('remove'))) {
        return;
    }
    
    if(target && target.href && target.href.startsWith(window.location.origin) && !target.getAttribute('target') && !target.href.includes('#')) {
         document.getElementById('page-loader').style.display = 'flex';
         document.getElementById('page-loader').style.opacity = '1';
    }
});
</script>

<footer id="site-footer" role="contentinfo" style="background-color: #f0f8ff; border-top: 1px solid #bfd7ed; padding-top: 50px;">
    <div class="wrapper footer-wrapper" style="display: flex; flex-wrap: wrap; justify-content: space-between; padding-bottom: 50px;">
        
        <!-- Col 1 -->
        <div class="footer-col" style="flex: 1; min-width: 200px; margin-bottom: 20px;">
            <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 20px;">Shop By Collections</h3>
            <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
                <li><a href="#" style="text-decoration: none; color: #333;">All Collections</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Bracelets</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Rings</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Necklaces</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Earrings</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Engagement Rings</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Wedding Bands</a></li>
            </ul>
        </div>

        <!-- Col 2 -->
        <div class="footer-col" style="flex: 1; min-width: 200px; margin-bottom: 20px;">
            <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 20px;">Information</h3>
            <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
                <li><a href="#" style="text-decoration: none; color: #333;">Privacy Policy</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Refund Policy</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Shipping Policy</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Terms of Service</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Return Policy</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">About Us</a></li>
                <li><a href="#" style="text-decoration: none; color: #333;">Contact Us</a></li>
            </ul>
        </div>

        <!-- Col 3 -->
        <div class="footer-col" style="flex: 1; min-width: 200px; margin-bottom: 20px;">
            <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 20px;">Connect</h3>
            <ul style="list-style: none; padding: 0; margin: 0; line-height: 2; margin-bottom: 20px;">
                <li><a href="#" style="text-decoration: none; color: #061e47;"><i class="fab fa-facebook-f" style="width:20px;"></i> Facebook</a></li>
                <li><a href="#" style="text-decoration: none; color: #061e47;"><i class="fab fa-twitter" style="width:20px;"></i> Twitter</a></li>
                <li><a href="#" style="text-decoration: none; color: #061e47;"><i class="fab fa-linkedin-in" style="width:20px;"></i> Linkedin</a></li>
                <li><a href="#" style="text-decoration: none; color: #061e47;"><i class="fab fa-instagram" style="width:20px;"></i> Instagram</a></li>
                <li><a href="#" style="text-decoration: none; color: #061e47;"><i class="fab fa-youtube" style="width:20px;"></i> Youtube</a></li>
            </ul>
        </div>

        <!-- Col 4 -->
        <div class="footer-col" style="flex: 1.5; min-width: 300px; margin-bottom: 20px;">
            <h3 style="font-size: 18px; font-weight: bold; margin-bottom: 20px;">BE IN THE KNOW</h3>
            <p style="margin-bottom: 20px; color: #666;">Sign up to get the latest on products, styling and events</p>
            <form style="display: flex; gap: 0; margin-bottom: 30px;">
                <input type="email" placeholder="email@example.com" style="padding: 10px; border: 1px solid #ddd; flex-grow: 1; border-radius: 4px 0 0 4px;">
                <button type="submit" style="padding: 10px 20px; background: #bfd7ed; color: #061e47; border: none; border-radius: 0 4px 4px 0; cursor: pointer; font-weight: bold;">Sign Up</button>
            </form>
            <!-- Logo -->
            <div style="text-align: center; margin-top:20px;">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/onefocals-logo.png" alt="onefocals" style="max-width: 150px; height: auto; opacity: 0.7;">
            </div>
        </div>

    </div>

    <!-- Bottom Bar -->
    <div class="site-info" style="background-color: #bfd7ed; color: #061e47; padding: 15px 0; font-size: 14px;">
        <div class="wrapper" style="display: flex; justify-content: space-between; align-items: center;">

            <!-- Copyright Only -->
             <div class="copyright" style="width: 100%; text-align: center;">
                © 2023 - OneFocals - Design & Developed by <strong style="color: #061e47;">Omegathemes</strong>
            </div>
        </div>
    </div>
</footer>
</div>
</div>



<?php wp_footer(); ?>
</body>
</html>