<?php
/**
 *  The products template part for front page
 *
 * @package advance-ecommerce
 */
$product_section = get_option( 'front_page_product_section', [] );
if ( empty( $product_section ) ) return;

$product_sections = $product_section['product_sections'] ?? [];
?>
<?php foreach ( $product_sections as $product_section ) : ?>
    <section class="product-panel">
        <div class="container">
            <div class="section-title">
                <h2>
					<?php echo esc_html( $product_section['section_title'] ); ?>
                </h2>
            </div>

			<?php if ( class_exists( 'WooCommerce' ) ): ?>
                <div class="owl-carousel owl-theme" data-toggle="owl" data-owl-options="{
                        'margin': 0,
                        'items': 2,
                        'autoplayTimeout': 5000,
                        'dots': false,
                        'nav': true,
                        'responsive': {
                            '576': {
                                'items': 3
                            },
                            '992': {
                                'items': 4
                            },
                            '1200': {
                                'items' : 5
                            }
                        }
                    }">
					<?php
					$args = [
						'post_type'           => 'product',
						'post_status'         => 'publish',
						'ignore_sticky_posts' => 1,
					];
					switch ( $product_section['show_product_by'] ) {
						case 'popularity':
							$args['meta_key'] = 'total_sales';
							$args['orderby']  = 'meta_value_num';
							break;
						case 'date':
							$args['orderby'] = 'date';
							$args['order']   = 'desc';
							break;
						case 'price':
							$args['meta_key'] = '_price';
							$args['orderby']  = 'meta_value_num';
							$args['order']    = 'asc';
							break;
						case 'price-desc':
							$args['meta_key'] = '_price';
							$args['orderby']  = 'meta_value_num';
							$args['order']    = 'desc';
					}
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ): $the_query->the_post();
						wc_get_template_part( 'content', 'product' );
					endwhile;
					wp_reset_query();
					?>
                </div>
			<?php endif; ?>

        </div>
    </section>
<?php endforeach; ?>
