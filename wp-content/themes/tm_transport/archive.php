<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Infinity
 */
$infinity_heading_image = Kirki::get_option( 'infinity', 'page_bg_image' );
$layout                 = Kirki::get_option( 'infinity', 'archive_layout' );
get_header(); ?>
<header class="big-title" style="background-image: url('<?php echo esc_url( $infinity_heading_image ); ?>')">
  <div class="container">
    <?php
    the_archive_title( '<h1 class="entry-title">', '</h1>' );
    the_archive_description( '<div class="taxonomy-description">', '</div>' );
    ?>
    <?php if (function_exists('tm_bread_crumb')) { ?>
      <div class="breadcrumb">
        <div class="container">
          <?php echo tm_bread_crumb(array('home_label' => Kirki::get_option( 'infinity', 'site_general_breadcrumb_home_text' ))); ?>
        </div>
      </div>
    <?php } ?>
  </div>
</header>
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
      <main class="content">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content','blog' ); ?>
        <?php endwhile; // end of the loop. ?>
        <?php infinity_paging_nav(); ?>
      </main>
    </div>
    <?php if($layout == 'content-sidebar'){ ?>
      <?php get_sidebar(); ?>
    <?php } ?>
  </div>
</div>
<?php get_footer(); ?>