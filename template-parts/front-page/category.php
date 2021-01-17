<?php
/**
 *  The category template part for front page
 *
 * @package advance-ecommerce
 */
$category_section = get_option( 'front_page_category_section', [] );
if ( empty( $category_section ) ) return;

$section_title = $category_section['section_title'] ?? '';
$product_cats  = get_terms( [ 'taxonomy' => 'product_cat', 'number' => 8 ] );
?>
<section id="category_section" class="product-category-panel mb-6">
    <div class="container">
        <div class="section-title">
            <h2 class="section_title">
				<?php echo esc_html( $section_title ); ?>
            </h2>
        </div>

        <div class="product-category-intro owl-carousel owl-theme text-center" data-toggle="owl"
             data-owl-options="{
                        'margin': 0,
                        'items': 2,
                        'autoplayTimeout': 5000,
                        'dots': false,
                        'nav': true,
                        'responsive': {
                            '480': {
                                'items': 3
                            },
                            '576': {
                                'items' : 4;
                            },
                            '768': {
                                'items': 5
                            },
                            '992': {
                                'items' : 6
                            },
                            '1200' : {
                                'items' : 7
                            }
                        }
                    }">
			<?php
			if ( is_array( $product_cats ) && ! empty( $product_cats ) ):
				foreach ( $product_cats as $product_cat ) :
					$thumbnail_id = get_term_meta( $product_cat->term_id, 'thumbnail_id', true );
					$image_url = wp_get_attachment_url( $thumbnail_id );
					?>
                    <div>
                        <img src="<?php echo esc_url( $image_url ); ?>" alt="">
                        <a href="<?php echo esc_url( get_term_link( $product_cat ) ); ?>">
							<?php echo esc_html( $product_cat->name ); ?>
                        </a>
                    </div>
				<?php
				endforeach;
			endif;
			?>
        </div>
    </div>
</section>