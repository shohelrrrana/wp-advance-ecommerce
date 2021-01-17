<?php
/**
 * The single template file
 *
 * @package advance-ecommerce
 */

get_header();
?>

<?php get_template_part( 'template-parts/common/page-header' ); ?>
    <div class="container">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();
				if ( is_singular( 'post' ) ) {
					get_template_part( 'template-parts/content', 'single' );
				} else {
					get_template_part( 'template-parts/content', 'page' );
				}
			}
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
		if ( is_singular( 'post' ) && comments_open( get_the_ID() ) ) {
			comments_template();
		}
		?>
    </div>

<?php
get_footer();
