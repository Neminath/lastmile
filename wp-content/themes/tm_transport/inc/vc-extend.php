<?php
/**
 * Initial setup
 * =============
 */
$new_vc_dir = get_template_directory() . '/inc/vc-template';
if (function_exists("vc_set_shortcodes_templates_dir")) {
  vc_set_shortcodes_templates_dir($new_vc_dir);
}

if (class_exists('WPBakeryShortCode')) {
  class WPBakeryShortCode_Thememove_Recentposts extends WPBakeryShortCode { }
  class WPBakeryShortCode_Thememove_Testi extends WPBakeryShortCode { }
  class WPBakeryShortCode_Thememove_Button extends WPBakeryShortCode { }
  class WPBakeryShortCode_Thememove_Blog extends WPBakeryShortCode { }

  class WPBakeryShortCode_Thememove_Gmaps extends WPBakeryShortCode
  {
    public function __construct($settings)
    {
      parent::__construct($settings);
      $this->jsScripts();
    }

    public function jsScripts()
    {
      wp_enqueue_script('thememove-js-maps', 'http://maps.google.com/maps/api/js?sensor=false&amp;language=en');
      wp_enqueue_script('thememove-js-gmap3', THEME_ROOT . '/js/gmap3.min.js');
    }
  }

  class WPBakeryShortCode_Thememove_Project_Details extends WPBakeryShortCode
  {
  }
}
locate_template('inc/vc-maps/blog.php', true, true);
locate_template('inc/vc-maps/button.php', true, true);
locate_template('inc/vc-maps/google-map.php', true, true);
locate_template('inc/vc-maps/recent-post.php', true, true);
locate_template('inc/vc-maps/testimonial.php', true, true);