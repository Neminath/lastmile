<?php
/**
 * Nav Color
 * ================
 */
$section = 'nav_style';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_typo_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Mobile Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_style_sub_menu_icon',
  'label'       => __('Link color', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '#open-left',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '#open-left',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_typo_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Main Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'nav_typo_menu_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Oswald',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '#site-navigation',
    'property' => 'font-family',
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'nav_typo_menu_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 400,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => '#site-navigation',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => '#site-navigation',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'nav_typo_menu_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 13,
  'choices'   => array(
    'min'  => 7,
    'max'  => 48,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => '#site-navigation',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => '#site-navigation',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_style_menu_text',
  'label'       => __('Link color', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '#site-navigation .menu > ul > li > a, #site-navigation .menu > li > a',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '#site-navigation .menu > ul > li > a, #site-navigation .menu > li > a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_style_menu_text_hover',
  'description' => __('Link color hover', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '#site-navigation .menu > ul > li > a:hover, #site-navigation .menu > li > a:hover',
      'property' => 'color',
    ),
    array(
      'element'  => '.header03 #site-navigation .menu > ul > li.current-menu-item a, .header03 #site-navigation .menu > li.current-menu-item a, .header03 #site-navigation .menu > ul > li:hover a, .header03 #site-navigation .menu > li:hover a',
      'property' => 'border-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '#site-navigation .menu > ul > li > a:hover, #site-navigation .menu > li > a:hover',
      'function' => 'css',
      'property' => 'color',
    ),
    array(
      'element'  => '.header03 #site-navigation .menu > ul > li.current-menu-item a, .header03 #site-navigation .menu > li.current-menu-item a, .header03 #site-navigation .menu > ul > li:hover a, .header03 #site-navigation .menu > li:hover a',
      'function' => 'css',
      'property' => 'border-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_typo_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Sub Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'nav_typo_sub_menu_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Oswald',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '#site-navigation .sub-menu,#site-navigation .children',
    'property' => 'font-family',
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'nav_typo_sub_menu_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 400,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => '#site-navigation .sub-menu li a, #site-navigation .children li a',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => '#site-navigation .sub-menu li a, #site-navigation .children li a',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'nav_typo_sub_menu_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 12,
  'choices'   => array(
    'min'  => 7,
    'max'  => 48,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => '#site-navigation .sub-menu li a, #site-navigation .children li a',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => '#site-navigation .sub-menu li a, #site-navigation .children li a',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_style_sub_menu_text',
  'label'       => __('Link color', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '#site-navigation .sub-menu li a, #site-navigation .children li a',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '#site-navigation .sub-menu li a, #site-navigation .children li a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_style_sub_menu_text_hover',
  'description' => __('Link color on hover', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '#site-navigation .sub-menu li a:hover, #site-navigation .children li a:hover',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '#site-navigation .sub-menu li a:hover, #site-navigation .children li a:hover',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));