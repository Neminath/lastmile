<?php
vc_map(array(
  'name'     => __('Recent Posts', 'thememove'),
  'base'     => 'thememove_recentposts',
  'category' => __('by THEMEMOVE', 'thememove'),
  'params'   => array(
    array(
      "type"       => "dropdown",
      "heading"    => "Type",
      "param_name" => "type",
      "value"      => array(
        "Type 1" => 'type_1',
        "Type 2" => 'type_2',
      ),
    ),
    array(
      'type'       => 'checkbox',
      'param_name' => 'show_title',
      'value'      => array(
        'Show title' => true
      )
    ),
    array(
      'type'       => 'checkbox',
      'param_name' => 'show_excerpt',
      'value'      => array(
        'Show excerpt' => true
      )
    ),
    array(
      'type'       => 'checkbox',
      'param_name' => 'show_meta',
      'value'      => array(
        'Show Meta' => true
      )
    ),
    array(
      'type'       => 'textfield',
      'heading'    => "Enter numbers of articles",
      'param_name' => 'number',
    ),
  )
));

