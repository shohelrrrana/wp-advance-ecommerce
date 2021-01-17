<?php
/**
 *  The offer banner template part for front page
 *
 * @package advance-ecommerce
 */
$offer_banner_section = get_option( 'front_page_offer_banner_section', [] );
if ( empty( $offer_banner_section ) ) return;

$section_image    = $offer_banner_section['section_image'] ?? '';
$section_subtitle = $offer_banner_section['section_subtitle'] ?? '';
$section_title    = $offer_banner_section['section_title'] ?? '';
$offer_title      = $offer_banner_section['offer_title'] ?? '';
$offer_discount   = $offer_banner_section['offer_discount'] ?? '';
$button_title     = $offer_banner_section['button_title'] ?? '';
$button_link      = $offer_banner_section['button_link'] ?? '';
?>
<section id="offer_banner_section">
    <div class="container">
        <div class="home-banner">
            <div class="image-container">
                <img class="section_image"
                     src="<?php echo esc_url( $section_image ); ?>">
            </div>
            <div class="info-group">
                <div class="">
                    <p class="section_subtitle">
						<?php echo esc_html( $section_subtitle ); ?>
                    </p>
                    <h2 class="section_title">
						<?php echo esc_html( $section_title ); ?>
                    </h2>
                </div>
                <div class="skew-box-group">
                    <span class="skew-box offer_title">
                        <?php echo esc_html( $offer_title ); ?>
                    </span>
                    <h3 class="sale-off skew-box">
                        <span class="offer_discount">
                            <?php echo esc_html( $offer_discount ); ?>
                        </span>
                        off
                    </h3>
                </div>
                <div class="">
                    <a href="<?php echo esc_url( $button_link ); ?>">
                        <button class="btn button_title">
							<?php echo esc_html( $button_title ); ?>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>