<?php
vc_map(array(
  'name'     => __('BLog', 'thememove'),
  'base'     => 'thememove_blog',
  'category' => __('by THEMEMOVE', 'thememove'),
  'params'   => array(
    array(
      "type"        => "dropdown",
      "heading"     => "Show Share Buttons",
      "param_name"  => "enable_share",
      "value"       => array(
        "No"  => 'false',
        "Yes" => 'true',
      ),
    ),
  )
));