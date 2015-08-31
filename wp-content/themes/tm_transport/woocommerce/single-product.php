<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$layout = Kirki::get_option( 'infinity', 'woo_layout_single_product' );
get_header(); ?>
<div class="big-title" style="background-image: url('<?php echo esc_url( $infinity_heading_image ); ?>')">
  <div class="container">
    <h1 class="entry-title">
      <?php woocommerce_page_title(); ?>
    </h1>
    <?php if (function_exists('tm_bread_crumb')) { ?>
      <div class="breadcrumb">
        <div class="container">
          <?php echo tm_bread_crumb(array('home_label' => Kirki::get_option( 'infinity', 'site_general_breadcrumb_home_text' ))); ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<div class="container">
  <div class="row">
    <?php if($layout == 'sidebar-content'){ ?>
      <?php do_action( 'woocommerce_sidebar' ); ?>
    <?php } ?>
    <?php if ($layout == 'sidebar-content' || $layout == 'content-sidebar') { ?>
      <?php $class = 'col-md-8'; ?>
    <?php } else { ?>
      <?php $class = 'col-md-12'; ?>
    <?php } ?>
    <div class="<?php echo esc_attr($class); ?>">
      <?php do_action( 'woocommerce_before_main_content' ); ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <?php wc_get_template_part( 'content', 'single-product' ); ?>
      <?php endwhile; // end of the loop. ?>
      <?php do_action( 'woocommerce_after_main_content' ); ?>
    </div>
    <?php if($layout == 'content-sidebar'){ ?>
      <?php do_action( 'woocommerce_sidebar' ); ?>
    <?php } ?>
  </div>
</div>

<?php get_footer( 'shop' ); ?>
