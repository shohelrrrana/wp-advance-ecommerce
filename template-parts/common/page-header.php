<?php
/**
 * Header page title template
 *
 * @package advance-ecommerce
 */
$hide_page_title = get_post_meta( get_the_ID(), 'hide_page_title', true );
?>

<?php if ( $hide_page_title !== 'yes' ): ?>
    <header class="page-header">
        <div class="container">
            <h2 class="page-title text-center py-3 my-5">
				<?php
				if ( is_page() ) {
					single_post_title();
				} elseif ( is_archive() ) {
					the_archive_title();
				} elseif ( is_search() ) {
					echo __( 'Search result for: ', 'advance-ecommerce' ) . '<strong>' . get_search_query() . '</strong>';
				} elseif ( is_singular( 'post' ) ) {
					single_post_title();
				} elseif ( ! is_single() ) {
					single_post_title();
				}
				?>
            </h2>
        </div>
    </header>
<?php endif; ?>
