<?php
/**
 * Infinity functions and definitions
 *
 * @package Infinity
 */

if (!function_exists('infinity_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   * ===========================================================================
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function infinity_setup()
  {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Infinity, use a find and replace
     * to change 'infinity' to the name of your theme in all the template files
     */
    load_theme_textdomain('infinity', locate_template('/languages'));

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');
    add_image_size('post-thumb', 848, 450, true);
    add_image_size('small-thumb', 120, 90, true);
    add_image_size('medium-thumb', 370, 220, true);

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      'primary' => esc_html__('Primary Menu', 'infinity'),
      'social'  => __('Social Profile Menu', 'thememove'),
      'top'     => __('Top Menu', 'thememove'),

    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    /*
     * Enable support for Post Formats.
     * See http://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', array(
      'aside',
      'image',
      'video',
      'quote',
      'link',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('infinity_custom_background_args', array(
      'default-color' => '#ffffff',
      'default-image' => '',
    )));

    //support woocommerce
    add_theme_support('woocommerce');
  }
endif; // infinity_setup
add_action('after_setup_theme', 'infinity_setup');

/**
 * Define Constants
 * ================
 */
define('THEME_ROOT', get_template_directory_uri());
define('primary_color', '#ca1f26');
define('secondary_color', '#232331');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * ===========================================================================
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!isset($content_width)) {
  $content_width = 640; /* pixels */
}

/**
 * Register widget area.
 * ====================
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function infinity_widgets_init()
{
  register_sidebar(array(
    'name'          => esc_html__('Sidebar', 'infinity'),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => esc_html__('Top Slider', 'infinity'),
    'id'            => 'top-slider',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  register_sidebar(array(
    'name'          => esc_html__('Header Right', 'infinity'),
    'id'            => 'header-right',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget header-right %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ));

  if(class_exists('WooCommerce')){
    register_sidebar(array(
      'name'          => __('Sidebar for shop', 'thememove'),
      'id'            => 'sidebar-shop',
      'description'   => '',
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget'  => '</aside>',
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
    ));
  }
  register_sidebar(array(
    'name'          => __('Footer 1 Widget Area', 'thememove'),
    'id'            => 'footer',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title"><span>',
    'after_title'   => '</span></h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 2 Widget Area', 'thememove'),
    'id'            => 'footer2',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title"><span>',
    'after_title'   => '</span></h3>',
  ));

  register_sidebar(array(
    'name'          => __('Footer 3 Widget Area', 'thememove'),
    'id'            => 'footer3',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title"><span>',
    'after_title'   => '</span></h3>',
  ));
}

add_action('widgets_init', 'infinity_widgets_init');

/**
 * Enqueue scripts and styles.
 * ==========================
 */
function infinity_scripts()
{
  wp_enqueue_style('infinity-style', THEME_ROOT . '/style.css');
  wp_enqueue_style('infinity-main', THEME_ROOT . '/css/main.css');
  wp_enqueue_style('infinity-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

  if(Kirki::get_option( 'infinity', 'nav_sticky_enable' ) == 1) {
    wp_enqueue_script('infinity-js-head-room-jquery', THEME_ROOT . '/js/jQuery.headroom.min.js');
    wp_enqueue_script('infinity-js-head-room', THEME_ROOT . '/js/headroom.min.js');
  }
  wp_enqueue_script('infinity-js-snap', THEME_ROOT . '/js/snap.min.js', array(), NULL, true);
  wp_enqueue_script('infinity-js-owl-carousel', THEME_ROOT . '/js/owl.carousel.min.js', array('jquery'), NULL, true);
  wp_enqueue_script('infinity-js-main', THEME_ROOT . '/js/main.js', array('jquery'), NULL, true);
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'infinity_scripts');

/**
 * Setup custom css.
 * ================
 */
function custom_css() {
  $custom_css = Kirki::get_option( 'infinity', 'custom_css' ) ;
  if(Kirki::get_option( 'infinity', 'custom_css_enable' ) == 1) {
    wp_add_inline_style('infinity-main', $custom_css);
  }
}
add_action( 'wp_enqueue_scripts', 'custom_css' );

/**
 * Auto update theme
 * ================
 */
locate_template('wp-updates-theme.php',true,true);
new WPUpdatesThemeUpdater_1501( 'http://wp-updates.com/api/2/theme', basename( get_template_directory() ) );
/**
 * Implement other setup.
 * ======================
 */
//load core
locate_template('/core/initial.php',true,true);
locate_template('/inc/customizer/customizer.php',true,true);
locate_template('/inc/oneclick.php',true,true);
//load tmg
locate_template('/inc/tmg-plugin-activation.php',true,true);
locate_template('/inc/tmg-plugin-registration.php',true,true);
//load metabox
locate_template('/inc/meta-box.php',true,true);
//load custom js
locate_template('/inc/custom-js.php',true,true);
//load custom header
locate_template('/inc/custom-header.php',true,true);
//Custom template tags for this theme.
locate_template('/inc/template-tags.php',true,true);
//Custom functions that act independently of the theme templates.
locate_template('/inc/extras.php',true,true);
//Load Jetpack compatibility file.
locate_template('/inc/jetpack.php',true,true);
//support shortcode in widget
add_filter('widget_text', 'do_shortcode');
// Extend VC
if (class_exists('WPBakeryVisualComposerAbstract')) {
  function requireVcExtend() {
    require locate_template('/inc/vc-extend.php');
  }
  add_action('init', 'requireVcExtend', 2);
}

/**
 * Woocommerce Setup
 * =================
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
//switch to 3 columns
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns() {
    return 3; // 3 products per row
  }
}
//3 related products
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
function jk_related_products_args( $args ) {
  $args['posts_per_page'] = 3; // 3 related products
  $args['columns'] = 3; // arranged in 3 columns
  return $args;
}