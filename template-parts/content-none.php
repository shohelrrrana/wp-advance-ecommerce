<?php
/**
 * The Content None File
 *
 * @package advance-ecommerce
 */
?>
<section class="no-results not-found">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
				<?php echo esc_html( 'Nothing Found' ); ?>
            </h1>
        </header>
        <div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) {
				printf(
					wp_kses_post( 'Ready to publish your first post? <a href="%s">Get started</a>' ),
					esc_url( admin_url( 'post-new.php' ) )
				);
			} elseif ( is_search() ) {
				echo wp_kses_post( '<p>Sorry! Nothing match item on your search keyword. Please try again with different keyword</p>' );
			} else {
				echo wp_kses_post( '<p>Sorry! cannot find what you are looking.</p>' );
			}
			?>
        </div>
    </div>
</section>