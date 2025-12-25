jQuery(document).ready(function ($) {
    // Listen for the single product add to cart form submission
    $('form.cart').on('submit', function (e) {
        var $form = $(this);

        // If it's a simple product or valid variable product
        if ($form.attr('method') === 'post' && $form.attr('enctype') !== 'multipart/form-data') {
            e.preventDefault();

            var $button = $form.find('button[type="submit"]');
            var originalText = $button.text();

            // Loading state on button only
            $button.text('Adding...').prop('disabled', true);

            // Serialize Form Data
            var data = $form.serialize();
            data += '&add-to-cart=' + $button.val();

            $.ajax({
                type: 'POST',
                url: wc_add_to_cart_params.wc_ajax_url.toString().replace('%%endpoint%%', 'add_to_cart'),
                data: data,
                success: function (response) {
                    if (response.error && response.product_url) {
                        window.location = response.product_url;
                        return;
                    }

                    // Trigger WooCommerce event to update fragments (This updates the Header Count)
                    $(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, $button]);

                    // Success Feedback
                    $button.text('Added to Bag');
                    $button.prop('disabled', false);

                    // Optional: Revert text after few seconds
                    setTimeout(function () {
                        $button.text(originalText);
                    }, 3000);
                },
                error: function () {
                    window.location = window.location.href; // Fallback
                }
            });
        }
    });
});
