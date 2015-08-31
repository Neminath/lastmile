<?php
/**
 * @package Infinity
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if(has_post_thumbnail()) { ?>
    <div class="post-thumb">
      <?php the_post_thumbnail('post-thumb'); ?>
    </div>
  <?php } ?>
  <header class="entry-header">
    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  </header><!-- .entry-header -->
  <?php if ( 'post' == get_post_type() ) : ?>
    <div class="entry-meta">
      <span class="author vcard"><i class="fa fa-user"></i> <?php echo __('Posted by ','infinity') . get_the_author(); ?></span>
      <span class="categories-links"><i class="fa fa-folder"></i> <?php echo __('In ','infinity'). get_the_category_list( __( ', ', 'infinity' ) ) ?> </span>
      <span class="comments-counts"><i class="fa fa-comment"></i><?php comments_number( '0', '1', '%' ); ?> <?php comments_number( 'comment', 'Comment', 'Comments' ); ?></span>
    </div><!-- .entry-meta -->
  <?php endif; ?>

  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->
  <div class="entry-footer">
    <div class="row middle">
      <div class="col-sm-6">
        <a class="read-more" href="<?php echo get_permalink() ?>"><span><?php echo __( 'Continue Reading', 'infinity' ) ?></span></a>
      </div>
      <div class="col-sm-6 end">
        <div class="share">
          <span><i class="fa fa-share-alt"></i> <?php echo __('Share: ','infinity'); ?></span>
          <span><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook"></i></a></span>
          <span><a target="_blank" href="http://twitter.com/share?text=<?php echo urlencode(the_title()); ?>&url=<?php echo urlencode(the_permalink()); ?>&via=twitter&related=<?php echo urlencode("coderplus:Wordpress Tips, jQuery and more"); ?>"><i class="fa fa-twitter"></i></a></span>
          <span><a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink() ?>"><i class="fa fa-google-plus"></i></a></span>
        </div>
      </div>
    </div>
  </div>

</article><!-- #post-## -->