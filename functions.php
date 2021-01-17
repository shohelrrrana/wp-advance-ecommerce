<?php
/**
 * The main function file for theme
 *
 * @package advance-ecommerce
 */

//Include autoloader
require_once __DIR__ . '/includes/class-autoloader.php';

//Theme Boot
$theme = new \Theme\Theme();
$theme->boot();