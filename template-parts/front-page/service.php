<?php
/**
 *  The service template part for front page
 *
 * @package advance-ecommerce
 */
$service_section = get_option( 'front_page_service_section', [] );
if ( empty( $service_section ) ) return;

$service_items = $service_section['service_items'] ?? [];
?>
<section class="service-section mb-4">
    <div class="container">
        <div class="row service_items">

			<?php foreach ( $service_items as $service_item ) : ?>
                <div class="col-md-6 col-xl-3">
                    <div class="service-widget">
                        <i class="service-icon <?php echo esc_attr( $service_item['icon'] ); ?>"></i>
                        <div class="service-content">
                            <h3 class="service-title">
								<?php echo esc_html( $service_item['title'] ); ?>
                            </h3>
                            <p><?php echo esc_html( $service_item['subtitle'] ); ?></p>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>

        </div>
    </div>
</section>