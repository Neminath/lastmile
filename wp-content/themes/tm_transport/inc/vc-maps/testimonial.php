<?php
vc_map(array(
  "name"                      => "Testimonials",
  "base"                      => "thememove_testi",
  "category"                  => 'by THEMEMOVE',
  "allowed_container_element" => 'vc_row',
  "params"                    => array(
    array(
      "type"       => "dropdown",
      "heading"    => "Enable Carousel",
      "param_name" => "enable_carousel",
      "value"      => array(
        "No"  => 'false',
        "Yes" => 'true',
      ),
    ),
    array(
      "type"       => "dropdown",
      "heading"    => "Show Bullets",
      "param_name" => "display_bullets",
      "value"      => array(
        "No"  => 'false',
        "Yes" => 'true',
      ),
      "dependency" => Array('element' => "enable_carousel", 'value' => array('true'))
    ),
    array(
      "type"       => "dropdown",
      "heading"    => "Enable Autoplay",
      "param_name" => "enable_autoplay",
      "value"      => array(
        "No"  => 'false',
        "Yes" => 'true',
      ),
      "dependency" => Array('element' => "enable_carousel", 'value' => array('true'))
    ),
    array(
      "type"        => "textfield",
      "heading"     => "Number",
      "param_name"  => "limit",
      "value"       => "",
      "description" => "Number of Testimonials"
    ),
    array(
      "type"        => "dropdown",
      "heading"     => "Order by",
      "param_name"  => "orderby",
      "value"       => array(
        "None"       => "none",
        "ID"         => "ID",
        "Title"      => "title",
        "Date"       => "date",
        "Menu Order" => "menu_order",
      ),
      "description" => "How to order the items"
    ),
    array(
      "type"        => "dropdown",
      "heading"     => "Order",
      "param_name"  => "order",
      "value"       => array(
        "DESC" => "DESC",
        "ASC"  => "ASC",
      ),
      "description" => "How to order the items"
    ),
    array(
      "type"        => "dropdown",
      "heading"     => "Show Author Info",
      "param_name"  => "display_author",
      "value"       => array(
        "No"  => 'false',
        "Yes" => 'true',
      ),
      "description" => "Choose yes to show author name and byline"
    ),
    array(
      "type"        => "dropdown",
      "heading"     => "Show URL",
      "param_name"  => "display_url",
      "value"       => array(
        "No"  => 'false',
        "Yes" => 'true',
      ),
      "description" => "Choose yes to show author url",
      "dependency"  => Array('element' => "display_author", 'value' => array('true'))
    ),
    array(
      "type"        => "dropdown",
      "heading"     => "Show Author Image",
      "param_name"  => "display_avatar",
      "value"       => array(
        "No"  => false,
        "Yes" => true,
      ),
      "description" => "Choose yes to show author avatar",
    ),
    array(
      "type"        => "textfield",
      "heading"     => "Avatar Size",
      "param_name"  => "size",
      "value"       => "",
      "description" => "Size of Avatar",
    ),
    array(
      'type'       => 'textfield',
      'heading'    => "Extra class name",
      'param_name' => 'el_class',
    )
  )
));