<?php
	extract( shortcode_atts( array(
    'enable_share' => ''
  ), $atts ) );
?>
<?php
global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args  = array(
  'post_type' => 'post',
  'paged'     => $paged
);
$the_query = new WP_Query( $args );
?>
<?php if ( $the_query->have_posts() ) : ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php get_template_part( 'template-parts/content','blog' ); ?>
  <?php endwhile; ?>
  <?php infinity_paging_nav(); ?>
  <?php wp_reset_postdata(); ?>
<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.','infinity' ); ?></p>
<?php endif; ?>