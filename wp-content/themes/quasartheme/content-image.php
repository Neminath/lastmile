<?php
/**
 * The template for displaying posts in the Image post format.
 *
 * @package WordPress
 * @subpackage Quasar
 * @since Quasar 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<?php echo quasar_get_title_with_date(); ?>
		<?php endif; // is_single() ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'quasar' ) ); ?>
		<?php quasar_get_link_pages(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php if ( comments_open() && ! is_single() ) : ?>
		<span class="comments-link">
			<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'quasar' ) . '</span>', __( 'One comment so far', 'quasar' ), __( 'View all "%" comments', 'quasar' ) ); ?>
		</span><!-- .comments-link -->
		<?php endif; // comments_open() ?>
        
		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
