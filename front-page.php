<?php
/**
 * The front page template
 *
 * @package advance-ecommerce
 */
$front_page_sections = get_option( 'sortable_front_page_sections', [] );

get_header();

get_template_part( '/template-parts/front-page/home-slider' );
foreach ( $front_page_sections as $front_page_section ) {
	get_template_part( "/template-parts/front-page/{$front_page_section}" );
}

get_footer();
