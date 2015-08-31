<?php
/*
Template Name:	Blog

*/
get_header(); ?>
<?php do_action('rockthemes_pb_frontend_before_page'); ?>
<?php if(function_exists('rockthemes_pb_frontend_sidebar_before_content')) rockthemes_pb_frontend_sidebar_before_content(); ?>
	<div id="primary" class="content-area large-<?php echo rockthemes_pb_frontend_get_content_columns_after_sidebars(); ?> column">
		<div id="content" class="site-content" role="main">
		<?php
        $posts = new WP_Query( array('post_type' => 'post', 'post_per_page' => get_option('posts_per_page'), 'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1 )));
        ?>        
        
		<?php if ( $posts->have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ($posts->have_posts() ) : $posts->the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
                <div class="clear"></div>
                <div class="vertical-space"></div>
                <hr />
                <div class="vertical-space"></div>
			<?php endwhile; ?>

			<?php quasar_paging_nav(true); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php 
if(function_exists('rockthemes_pb_frontend_sidebar_after_content')) rockthemes_pb_frontend_sidebar_after_content();
else get_sidebar();
get_sidebar();
?>
<?php do_action('rockthemes_pb_frontend_after_page'); ?>
<?php get_footer(); ?>