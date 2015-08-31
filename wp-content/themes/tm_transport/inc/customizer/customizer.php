<?php
/**
 * Infinity Theme Customizer
 *
 * @package Infinity
 */

/**
 * Configuration for the Kirki Customizer
 * =============================================
 */
function infinity_config() {
  $args = array(
    //'logo_image'      => 'http://kirki.org/images/logo.png',
    //'color_accent'    => '#00bcd4',
    //'color_back'      => '#455a64',
    //'description'     => __('This is the theme description.', 'infinity'),
    'styles_priority'   => 999,
    'width'             => '300px',
    'url_path'          => THEME_ROOT . '/core/customizer/kirki/'
  );
  return $args;
}
add_filter('kirki/config', 'infinity_config');

/**
 * Remove Unused Native Sections
 * =============================
 */
function infinity_remove_customizer_sections($wp_customize)
{
  $wp_customize->remove_section('nav');
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('title_tagline');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('static_front_page');

  $wp_customize->remove_control('blogname');
  $wp_customize->remove_control('blogdescription');
  $wp_customize->remove_control('page_for_posts');
  //$wp_customize->remove_control( 'nav_menu_locations[primary]' );
  //$wp_customize->remove_control( 'nav_menu_locations[footer]' );

}
add_action('customize_register', 'infinity_remove_customizer_sections');

/**
 * Setting Customizer
 * ==================
 */
function infinity_customizer_sections($wp_customize)
{
  $wp_customize->get_section('io_section')->priority = '40';
}
if (function_exists('register_section_for_io_section')) {
  add_action('customize_register', 'infinity_customizer_sections');
}

/**
 * General setups
 * ==============
 */
Kirki::add_config('infinity', array(
  'option_type' => 'theme_mod',
  'capability'  => 'edit_theme_options',
));

$priority = 1;
// Add panels
Kirki::add_panel('site', array(
  'priority'    => $priority++,
  'title'       => __('Site', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('top', array(
  'priority'    => $priority++,
  'title'       => __('Top Area', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('header', array(
  'priority'    => $priority++,
  'title'       => __('Header', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('nav', array(
  'priority'    => $priority++,
  'title'       => __('Navigation', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('button', array(
  'priority'    => $priority++,
  'title'       => __('Button', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('footer', array(
  'priority'    => $priority++,
  'title'       => __('Footer', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('copyright', array(
  'priority'    => $priority++,
  'title'       => __('Copyright', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('page', array(
  'priority'    => $priority++,
  'title'       => __('Page', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('post', array(
  'priority'    => $priority++,
  'title'       => __('Post', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('woo', array(
  'priority'    => $priority++,
  'title'       => __('Woocommerce', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

Kirki::add_panel('custom', array(
  'priority'    => $priority++,
  'title'       => __('Custom code', 'infinity'),
  'description' => __('My Description', 'infinity'),
));

$priority = 1;
// Add sections for site panel
Kirki::add_section('site_general', array(
  'title'       => __('General', 'infinity'),
  'description' => __('In this section you can control all general settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

Kirki::add_section('site_layouts', array(
  'title'       => __('Layouts', 'infinity'),
  'description' => __('In this section you can control all layouts settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

Kirki::add_section('site_logo', array(
  'title'       => __('Logo', 'infinity'),
  'description' => __('In this section you can control all logo settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

Kirki::add_section('site_favicon', array(
  'title'       => __('Favicon', 'infinity'),
  'description' => __('In this section you can control all favicon settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

Kirki::add_section('site_color', array(
  'title'       => __('Color', 'infinity'),
  'description' => __('In this section you can control all color settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

Kirki::add_section('site_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

Kirki::add_section('background_image', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of your site', 'infinity'),
  'panel'       => 'site',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for navigation panel
Kirki::add_section('nav', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of navigation', 'infinity'),
  'panel'       => 'nav',
  'priority'    => $priority++,
));

Kirki::add_section('nav_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of navigation', 'infinity'),
  'panel'       => 'nav',
  'priority'    => $priority++,
));

Kirki::add_section('nav_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of navigation', 'infinity'),
  'panel'       => 'nav',
  'priority'    => $priority++,
));

Kirki::add_section('nav_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of navigation', 'infinity'),
  'panel'       => 'nav',
  'priority'    => $priority++,
));

Kirki::add_section('nav_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of navigation', 'infinity'),
  'panel'       => 'nav',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for button panel
Kirki::add_section('button_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of buttons', 'infinity'),
  'panel'       => 'button',
  'priority'    => $priority++,
));

Kirki::add_section('button_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of buttons', 'infinity'),
  'panel'       => 'button',
  'priority'    => $priority++,
));

Kirki::add_section('button_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of buttons', 'infinity'),
  'panel'       => 'button',
  'priority'    => $priority++,
));

Kirki::add_section('button_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of buttons', 'infinity'),
  'panel'       => 'button',
  'priority'    => $priority++,
));

Kirki::add_section('button_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of buttons', 'infinity'),
  'panel'       => 'button',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for top area panel
Kirki::add_section('top_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of top area', 'infinity'),
  'panel'       => 'top',
  'priority'    => $priority++,
));

Kirki::add_section('top_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of top area', 'infinity'),
  'panel'       => 'top',
  'priority'    => $priority++,
));

Kirki::add_section('top_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of top area', 'infinity'),
  'panel'       => 'top',
  'priority'    => $priority++,
));

Kirki::add_section('top_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of top area', 'infinity'),
  'panel'       => 'top',
  'priority'    => $priority++,
));

Kirki::add_section('top_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of top area', 'infinity'),
  'panel'       => 'top',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for header panel
Kirki::add_section('header_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of header', 'infinity'),
  'panel'       => 'header',
  'priority'    => $priority++,
));

Kirki::add_section('header_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of header', 'infinity'),
  'panel'       => 'header',
  'priority'    => $priority++,
));

Kirki::add_section('header_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of header', 'infinity'),
  'panel'       => 'header',
  'priority'    => $priority++,
));

Kirki::add_section('header_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of header', 'infinity'),
  'panel'       => 'header',
  'priority'    => $priority++,
));

Kirki::add_section('header_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of header', 'infinity'),
  'panel'       => 'header',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for footer panel
Kirki::add_section('footer_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of footer', 'infinity'),
  'panel'       => 'footer',
  'priority'    => $priority++,
));

Kirki::add_section('footer_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of footer', 'infinity'),
  'panel'       => 'footer',
  'priority'    => $priority++,
));

Kirki::add_section('footer_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of footer', 'infinity'),
  'panel'       => 'footer',
  'priority'    => $priority++,
));

Kirki::add_section('footer_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of footer', 'infinity'),
  'panel'       => 'footer',
  'priority'    => $priority++,
));

Kirki::add_section('footer_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of footer', 'infinity'),
  'panel'       => 'footer',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for copyright panel
Kirki::add_section('copyright_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of copyright', 'infinity'),
  'panel'       => 'copyright',
  'priority'    => $priority++,
));

Kirki::add_section('copyright_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of copyright', 'infinity'),
  'panel'       => 'copyright',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for page panel
Kirki::add_section('page_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of pages', 'infinity'),
  'panel'       => 'page',
  'priority'    => $priority++,
));

Kirki::add_section('page_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of pages', 'infinity'),
  'panel'       => 'page',
  'priority'    => $priority++,
));

Kirki::add_section('page_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of pages', 'infinity'),
  'panel'       => 'page',
  'priority'    => $priority++,
));

Kirki::add_section('page_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of pages', 'infinity'),
  'panel'       => 'page',
  'priority'    => $priority++,
));

Kirki::add_section('page_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of pages', 'infinity'),
  'panel'       => 'page',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for post panel
Kirki::add_section('post_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of posts', 'infinity'),
  'panel'       => 'post',
  'priority'    => $priority++,
));

Kirki::add_section('post_style', array(
  'title'       => __('Style', 'infinity'),
  'description' => __('In this section you can control all style settings of posts', 'infinity'),
  'panel'       => 'post',
  'priority'    => $priority++,
));

Kirki::add_section('post_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of posts', 'infinity'),
  'panel'       => 'post',
  'priority'    => $priority++,
));

Kirki::add_section('post_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of posts', 'infinity'),
  'panel'       => 'post',
  'priority'    => $priority++,
));

Kirki::add_section('post_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of posts', 'infinity'),
  'panel'       => 'post',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for woo panel
Kirki::add_section('woo_layout', array(
  'title'       => __('Layout', 'infinity'),
  'description' => __('In this section you can control all layout settings of woocommerce', 'infinity'),
  'panel'       => 'woo',
  'priority'    => $priority++,
));

Kirki::add_section('woo_color', array(
  'title'       => __('Color', 'infinity'),
  'description' => __('In this section you can control all color settings of woocommerce', 'infinity'),
  'panel'       => 'woo',
  'priority'    => $priority++,
));

Kirki::add_section('woo_spacing', array(
  'title'       => __('Spacing', 'infinity'),
  'description' => __('In this section you can control all spacing settings of woocommerce', 'infinity'),
  'panel'       => 'woo',
  'priority'    => $priority++,
));

Kirki::add_section('woo_border', array(
  'title'       => __('Border', 'infinity'),
  'description' => __('In this section you can control all border settings of woocommerce', 'infinity'),
  'panel'       => 'woo',
  'priority'    => $priority++,
));

Kirki::add_section('woo_bg', array(
  'title'       => __('Background', 'infinity'),
  'description' => __('In this section you can control all background settings of woocommerce', 'infinity'),
  'panel'       => 'woo',
  'priority'    => $priority++,
));

$priority = 1;
// Add sections for custom code panel
Kirki::add_section('custom_css', array(
  'title'       => __('Custom CSS', 'infinity'),
  'description' => __('In this section you can control custom css', 'infinity'),
  'panel'       => 'custom',
  'priority'    => $priority++,
));

Kirki::add_section('custom_js', array(
  'title'       => __('Custom JS', 'infinity'),
  'description' => __('In this section you can control custom javascript', 'infinity'),
  'panel'       => 'custom',
  'priority'    => $priority++,
));

/**
 * Include setups
 * ==============
 */
//site
locate_template('/inc/customizer/setups/site-general.php',true,true);
locate_template('/inc/customizer/setups/site-layouts.php',true,true);
locate_template('/inc/customizer/setups/site-logo.php',true,true);
locate_template('/inc/customizer/setups/site-favicon.php',true,true);
locate_template('/inc/customizer/setups/site-color.php',true,true);
locate_template('/inc/customizer/setups/site-style.php',true,true);
locate_template('/inc/customizer/setups/site-bg.php',true,true);
//nav
locate_template('/inc/customizer/setups/nav-layout.php',true,true);
locate_template('/inc/customizer/setups/nav-style.php',true,true);
locate_template('/inc/customizer/setups/nav-spacing.php',true,true);
locate_template('/inc/customizer/setups/nav-border.php',true,true);
locate_template('/inc/customizer/setups/nav-bg.php',true,true);
//button
locate_template('/inc/customizer/setups/button-layout.php',true,true);
locate_template('/inc/customizer/setups/button-style.php',true,true);
locate_template('/inc/customizer/setups/button-spacing.php',true,true);
locate_template('/inc/customizer/setups/button-border.php',true,true);
locate_template('/inc/customizer/setups/button-bg.php',true,true);
//top area
locate_template('/inc/customizer/setups/top-layout.php',true,true);
locate_template('/inc/customizer/setups/top-style.php',true,true);
locate_template('/inc/customizer/setups/top-spacing.php',true,true);
locate_template('/inc/customizer/setups/top-border.php',true,true);
locate_template('/inc/customizer/setups/top-bg.php',true,true);
//header
locate_template('/inc/customizer/setups/header-layout.php',true,true);
locate_template('/inc/customizer/setups/header-style.php',true,true);
locate_template('/inc/customizer/setups/header-spacing.php',true,true);
locate_template('/inc/customizer/setups/header-border.php',true,true);
locate_template('/inc/customizer/setups/header-bg.php',true,true);
//footer
locate_template('/inc/customizer/setups/footer-layout.php',true,true);
locate_template('/inc/customizer/setups/footer-style.php',true,true);
locate_template('/inc/customizer/setups/footer-spacing.php',true,true);
locate_template('/inc/customizer/setups/footer-border.php',true,true);
locate_template('/inc/customizer/setups/footer-bg.php',true,true);
//copyright
locate_template('/inc/customizer/setups/copyright-layout.php',true,true);
locate_template('/inc/customizer/setups/copyright-style.php',true,true);
//page
locate_template('/inc/customizer/setups/page-layout.php',true,true);
locate_template('/inc/customizer/setups/page-style.php',true,true);
locate_template('/inc/customizer/setups/page-spacing.php',true,true);
locate_template('/inc/customizer/setups/page-bg.php',true,true);
//post
locate_template('/inc/customizer/setups/post-layout.php',true,true);
locate_template('/inc/customizer/setups/post-style.php',true,true);
locate_template('/inc/customizer/setups/post-spacing.php',true,true);
locate_template('/inc/customizer/setups/post-bg.php',true,true);

locate_template('/inc/customizer/io.php',true,true);
//woocommerce
if (class_exists('WooCommerce')) {
  locate_template('/inc/customizer/setups/woo-layout.php',true,true);
  locate_template('/inc/customizer/setups/woo-color.php',true,true);
}
//custom code
locate_template('/inc/customizer/setups/custom-css.php',true,true);
locate_template('/inc/customizer/setups/custom-js.php',true,true);

/**
 * Add custom css
 * ==============
 */
function infinity_customize_preview_css()
{
  wp_enqueue_style('infinity-kirki-custom-css', THEME_ROOT . '/core/customizer/css/custom.css');
}

add_action('customize_controls_init', 'infinity_customize_preview_css');