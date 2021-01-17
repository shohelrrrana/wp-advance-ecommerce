<?php
/**
 * Template for entry Meta
 *
 * @package advance-ecommerce
 */
$post_terms = wp_get_post_terms( get_the_ID(), [ 'category' ] );
?>
<div class="card-body entry-meta">
    <span>
        <i class="fa fa-clock-o"></i>
        <span><?php _e( 'Posted on: ', 'advance-ecommerce' ); ?></span>
        <time class="entry-date">
            <a href="<?php echo get_the_permalink(); ?>">
                <?php echo get_the_date( 'dS M Y' ); ?>
            </a>
        </time>
    </span>
    &nbsp;
    <span>
        <i class="fa fa-user-o"></i>
        <?php _e( 'By ' ); ?>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>">
            <?php echo get_the_author_meta( 'display_name' ) ?>
        </a>
    </span>
    &nbsp;
    <span>
        <i class="fa fa-comment-o"></i>
        <?php echo get_comment_count( get_the_ID() )['approved']; ?>
    </span>
    &nbsp;
    <span>
        <i class="fa fa-folder-o"></i>
        <?php
		if ( ! empty( $post_terms ) ):
			foreach ( $post_terms as $key => $post_term ):
				?>
                <a href="<?php echo get_term_link( $post_term ); ?>">
                    <?php echo esc_html( $post_term->name ); ?>&nbsp;
                </a>
			<?php
			endforeach;
		endif;
		?>
    </span>
</div>