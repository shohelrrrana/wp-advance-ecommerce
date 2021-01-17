<?php
/**
 * The BLog Content File For Displaying Blog Posts
 *
 * @package advance-ecommerce
 */
?>

<article <?php post_class() ?>>
    <div class="card mb-5">
		<?php
		get_template_part( 'template-parts/blog/entry-header' );
		get_template_part( 'template-parts/blog/entry-meta' );
		get_template_part( 'template-parts/blog/entry-content' );
		get_template_part( 'template-parts/blog/entry-footer' );
		?>
    </div>
</article>