<?php
/**
 * The header for our theme
 *
 * @package advance-ecommerce
 */
?>

<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta <?php echo bloginfo( 'charset' ); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="loading hide">
    <img src="<?php echo get_theme_file_uri( '/assets/images/loading.gif' ); ?>" alt="Loading">
</div>

<div class="page-wrapper">
	<?php get_template_part( '/template-parts/header/header' ); ?>
    <main class="main <?php echo is_front_page() ? 'home' : ''; ?>">


