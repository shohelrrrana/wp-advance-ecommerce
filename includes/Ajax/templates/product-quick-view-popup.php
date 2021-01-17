<div class="product-quick-view-wrapper popup-wrapper">
    <div class="popup product-single-container product-single-default product-quick-view container">
        <button title="Close" type="button" class="close-popup mfp-close">×</button>
        <div class="row">
			<?php advance_template_single_product_gallery( $product ); ?>

            <div class="col-lg-6 col-md-6">
                <div class="product-single-details">
					<?php
					advance_template_single_product_title( $product );
					advance_template_product_rating( $product );
					advance_template_product_price( $product );
					advance_template_product_short_desc( $product );
					?>

                    <div class="product-action">
						<?php
						advance_template_product_quantity();
						advance_template_product_add_to_cart( $product, false );
						advance_template_product_add_to_wishlist( $product );
						advance_template_single_product_share( $product );
						?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>