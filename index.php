<?php
/**
 * The main template file
 *
 * @package advance-ecommerce
 */

get_header();
$is_active_blog_sidebar = is_active_sidebar( 'blog-sidebar' );
?>

<?php get_template_part( 'template-parts/common/page-header' ); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-<?php echo is_home() && $is_active_blog_sidebar ? 8 : 12; ?> col-sm-12">
				<?php if ( have_posts() ): ?>
                    <div class="row post-container" data-masonry='{ "itemSelector": ".grid-item" }'>
						<?php while ( have_posts() ): the_post(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-12 grid-item">
								<?php get_template_part( 'template-parts/content', 'blog' ); ?>
                            </div>
						<?php endwhile; ?>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-5">
							<?php
							$args = [
								'before_page_number' => '<span class="btn border border-secondary btn-link">',
								'after_page_number'  => '</span>'
							];
							echo paginate_links( $args );
							?>
                        </div>
                    </div>
				<?php
				else:
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>

            </div>
			<?php if ( is_home() && $is_active_blog_sidebar ): ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
					<?php get_sidebar(); ?>
                </div>
			<?php endif; ?>
        </div>
    </div>

<?php
get_footer();
