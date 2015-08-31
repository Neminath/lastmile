<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Infinity
 */
?>

	</div><!-- #content -->
  <?php if ( is_active_sidebar( 'footer' ) ) { ?>
    <footer <?php footer_class(); ?>>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <?php dynamic_sidebar( 'footer' ); ?>
            <div class="social">
              <?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu', 'container_class' => 'social-menu','fallback_cb' => false  ) ); ?>
            </div>
          </div>
          <div class="col-md-4">
            <?php dynamic_sidebar( 'footer2' ); ?>
          </div>
          <div  class="col-md-4">
            <?php dynamic_sidebar( 'footer3' ); ?>
          </div>
        </div>
      </div>
    </footer><!-- #colophon -->
  <?php } ?>
  <?php if(Kirki::get_option( 'infinity', 'copyright_layout_enable' ) == 1){ ?>
    <div class="copyright">
      <div class="container">
       <div class="row middle">
         <div class="col-md-4 left">
           <?php echo html_entity_decode(Kirki::get_option( 'infinity', 'copyright_layout_left_text' )); ?>
         </div>
         <div class="col-md-8 end-md end-lg">
           <div class="right">
             <?php echo html_entity_decode(Kirki::get_option( 'infinity', 'copyright_layout_right_text' )); ?>
           </div>
         </div>
       </div>
      </div>
    </div>
  <?php } ?>
</div><!-- #page -->

<?php wp_footer(); ?>
<p class="TK">Powered by <a href="http://themekiller.com/" title="themekiller" rel="follow"> themekiller.com </a><a href="http://anime4online.com/" title="themekiller" rel="follow"> anime4online.com </a> <a href="http://animextoon.com/" title="themekiller" rel="follow"> animextoon.com </a> </p>
</body>
</html>
