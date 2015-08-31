<?php function infinity_js_custom_code()
{ ?>
  <?php if (Kirki::get_option('infinity', 'custom_js_enable') == 1): ?>
    <?php echo html_entity_decode(Kirki::get_option('infinity', 'custom_js')); ?>
  <?php endif ?>
  <?php if (Kirki::get_option('infinity', 'nav_sticky_enable') == 1 && has_nav_menu( 'primary' )): ?>
    <?php if (Kirki::get_option('infinity', 'header_type') == 'header03'||Kirki::get_option('infinity', 'header_type') == 'header04') { ?>
      <script>
        jQuery(document).ready(function ($) {
          $(".header").headroom(
            {
              offset: 52
            }
          );
        });
      </script>
    <?php } else { ?>
      <script>
        jQuery(document).ready(function ($) {
          $("#site-navigation").headroom(
            {
              offset: 160
            }
          );
        });
      </script>
    <?php } ?>
  <?php endif ?>
<?php }

add_action('wp_footer', 'infinity_js_custom_code');
