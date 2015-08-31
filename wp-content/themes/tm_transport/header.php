<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Infinity
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo Kirki::get_option( 'infinity', 'site_favicon' ); ?>">
  <link rel="apple-touch-icon" href="<?php echo Kirki::get_option( 'infinity', 'site_apple_touch_icon' ); ?>"/>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="snap-drawers">
  <div class="snap-drawer snap-drawer-left">
    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'mobile-menu', 'container_class' => 'mobile-menu' ) ); ?>
  </div>
  <div class="snap-drawer snap-drawer-right"></div>
</div>
<div id="page" class="hfeed site">

	<?php
  $header_type = Kirki::get_option( 'infinity', 'header_type' );
  locate_template('/template-parts/' . $header_type . '.php',true,true);
  ?>
	<div id="content" class="site-content">
