<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package advance-ecommerce
 */

get_header();
?>

<section class="error-404 not-found">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title my-5 text-center">
                <?php _e( 'Oops! That page cannot be found.', 'advance-ecommerce' ); ?>
            </h1>
        </header>
    </div>
</section>

<?php
get_footer();
