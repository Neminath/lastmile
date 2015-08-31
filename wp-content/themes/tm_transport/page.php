<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Infinity
 */

$infinity_page_layout_private = get_post_meta(get_the_ID(), "infinity_page_layout_private", true);
$infinity_header_top          = get_post_meta(get_the_ID(), "infinity_header_top", true);
$infinity_sticky_menu         = get_post_meta(get_the_ID(), "infinity_sticky_menu", true);
$infinity_custom_logo         = get_post_meta(get_the_ID(), "infinity_custom_logo", true);
$infinity_heading_image       = get_post_meta(get_the_ID(), "infinity_heading_image", true);
$infinity_bread_crumb_enable  = get_post_meta(get_the_ID(), "infinity_bread_crumb_enable", true);
$infinity_disable_comment     = get_post_meta(get_the_ID(), "infinity_disable_comment", true);
$infinity_disable_title       = get_post_meta(get_the_ID(), "infinity_disable_title", true);
$infinity_custom_class        = get_post_meta(get_the_ID(), "infinity_custom_class", true);
if( $infinity_page_layout_private != 'default' && class_exists('cmb2_bootstrap_205')){
  $layout = get_post_meta(get_the_ID(), "infinity_page_layout_private", true);
}else{
  $layout = Kirki::get_option( 'infinity', 'page_layout' );
}
if($infinity_heading_image){
  $infinity_heading_image = get_post_meta(get_the_ID(), "infinity_heading_image", true);
}else{
  $infinity_heading_image = Kirki::get_option( 'infinity', 'page_bg_image' );
}
get_header(); ?>
<?php if($infinity_disable_title != 'on'){ ?>
  <div class="big-title" style="background-image: url('<?php echo esc_url( $infinity_heading_image ); ?>')">
    <div class="container">
      <?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
      <?php if (function_exists('tm_bread_crumb')&&Kirki::get_option( 'infinity', 'site_general_breadcrumb_enable' ) == 1) { ?>
        <div class="breadcrumb">
          <div class="container">
            <?php echo tm_bread_crumb(array('home_label' => Kirki::get_option( 'infinity', 'site_general_breadcrumb_home_text' ))); ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
<?php } ?>
<div class="container">
  <div class="row">
    <?php if($layout == 'sidebar-content'){ ?>
      <?php get_sidebar(); ?>
    <?php } ?>
    <?php if ($layout == 'sidebar-content' || $layout == 'content-sidebar') { ?>
      <?php $class = 'col-md-8'; ?>
    <?php } else { ?>
      <?php $class = 'col-md-12'; ?>
    <?php } ?>
    <div class="<?php echo esc_attr($class); ?>">
      <div class="content">
        <?php while ( have_posts() ) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>">
            <div class="entry-content">
              <?php the_content(); ?>
              <?php
              wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'infinity' ),
                'after'  => '</div>',
              ) );
              ?>
            </div><!-- .entry-content -->
          </article><!-- #post-## -->
          <?php if ((comments_open() || get_comments_number())&&$infinity_disable_comment != 'on' ) : comments_template(); endif; ?>
        <?php endwhile; // end of the loop. ?>
      </div>
    </div>
    <?php if($layout == 'content-sidebar'){ ?>
      <?php get_sidebar(); ?>
    <?php } ?>
  </div>
</div>
<?php get_footer(); ?>
