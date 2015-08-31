<?php
/**
 * Shortcode attributes
 * @var $type
 * @var $number
 * @var $show_title
 * @var $show_excerpt
 * @var $show_meta
 * Shortcode class
 * @var $this WPBakeryShortCode_Thememove_Recentposts
 */
  $output = '';
  $atts = vc_map_get_attributes( $this->getShortcode(), $atts );
  extract( $atts );
  $args = array( 'post_type' => 'post', 'posts_per_page' => $number);
  $loop = new WP_Query( $args );
?>
<?php if($type == 'type_2'){ ?>
  <div class="recent-posts type_2">
    <div class="row">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); $meta = get_post_meta(get_the_ID()); ?>
        <div class="col-md-4">
          <div>
            <div class="post-thumb">
              <div class="dates">
                <span class="month"><?php the_time('F'); ?></span>
                <span class="date"><?php the_time('d'); ?></span>
                <span class="year"><?php the_time('Y'); ?></span>
              </div>
              <?php the_post_thumbnail('medium-thumb'); ?>
            </div>
            <?php if ($show_title): ?>
              <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <?php endif ?>
            <?php if ($show_meta): ?>
              <div class="entry-meta">
                <span class="author vcard"><i class="fa fa-user"></i> <?php echo __('Posted by ','infinity') . get_the_author(); ?></span>
                <span class="categories-links"><i class="fa fa-folder"></i> <?php echo __('In ','infinity'). get_the_category_list( __( ', ', 'infinity' ) ) ?> </span>
                <span class="comments-counts"><i class="fa fa-comment"></i><?php comments_number( '0', '1', '%' ); ?> <?php comments_number( 'comment', 'Comment', 'Comments' ); ?></span>
              </div><!-- .entry-meta -->
            <?php endif ?>
            <?php if ($show_excerpt): ?>
              <div class="entry-excerpt"><?php the_excerpt(); ?></div>
            <?php endif ?>
          </div>
        </div>
      <?php endwhile; wp_reset_postdata(); ?>
    </div>
  </div>
<?php }else{ ?>
  <div class="recent-posts type_1">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); $meta = get_post_meta(get_the_ID()); ?>
    <div class="recent-posts__item">
        <div class="recent-posts__thumb">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('small-thumb'); ?>
          </a>
        </div>
        <?php if ($show_title): ?>
          <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
        <?php endif ?>
        <?php if ($show_excerpt): ?>
          <div class="entry-excerpt"><?php the_excerpt(); ?></div>
        <?php endif ?>
        <?php if ($show_meta): ?>
          <div class="post-meta">
            <span class="author"><i class="fa fa-user"></i> <?php the_author(); ?></span>
            <span class="post-date"><i class="fa fa-clock-o"></i> <?php the_time('F j, Y'); ?></span>
            <span class="post-com"><i class="fa fa-comments"></i> <?php comments_number( 'No response', 'One response', '% responses' ); ?></span>
          </div>
        <?php endif ?>
    </div>
  <?php endwhile; wp_reset_postdata(); ?>
</div>
<?php } ?>