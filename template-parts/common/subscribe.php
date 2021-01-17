<?php
/**
 *  The subscribe template part for global pages
 *
 * @package advance-ecommerce
 */
$common_subscribe_section = get_option( 'common_subscribe_section', [] );
$section_title            = $common_subscribe_section['section_title'] ?? '';
$content_subtitle         = $common_subscribe_section['content_subtitle'] ?? '';
$content_title            = $common_subscribe_section['content_title'] ?? '';
$form_shortcode           = $common_subscribe_section['form_shortcode'] ?? '';
?>
<div class="footer-top" id="subscribe_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <a href="#" class="widget-newsletter-title section_title">
					<?php echo esc_html( $section_title ); ?>
                </a>
            </div>
            <div class="col-lg-4">
                <p class="widget-newsletter-content content_subtitle">
					<?php echo esc_html( $content_subtitle ); ?>
                    <br>
                    <span class="widget-newsletter-content content_title">
                        <?php echo esc_html( $content_title ); ?>
                    </span>
                </p>
            </div>
            <div class="col-lg-5 form_shortcode">
				<?php echo do_shortcode( $form_shortcode ); ?>
            </div>
        </div>
    </div>
</div>
