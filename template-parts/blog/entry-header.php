<?php
/**
 * Template for entry header
 *
 * @package advance-ecommerce
 */
?>
<header class="entry-header mb-3">
	<?php if ( has_post_thumbnail() ): ?>
        <div class="entry-image text-center">
            <a href="<?php echo get_the_permalink(); ?>">
				<?php
				if ( is_singular( 'post' ) ) {
					the_post_thumbnail( 'full' );
				} else {
					the_post_thumbnail( 'medium' );
				}
				?>
            </a>
        </div>
	<?php endif; ?>
	<?php if ( ! is_singular() ): ?>
        <h4 class="card-header entry-title">
            <a href="<?php echo get_the_permalink(); ?>">
				<?php the_title(); ?>
            </a>
        </h4>
	<?php endif; ?>
</header>