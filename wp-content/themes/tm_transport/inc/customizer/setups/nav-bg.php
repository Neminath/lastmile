<?php
/**
 * Nav Background
 * ================
 */
$section = 'nav_bg';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_bg_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Main Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'nav_bg_menu_background',
  'label'     => __('Main Background', 'infinity'),
  'help'      => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => secondary_color,
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.main-navigation',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.main-navigation',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color-alpha',
  'setting'     => 'nav_bg_menu_text_bg',
  'label'       => __('Link background', 'infinity'),
  'description' => __('Link background', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'rgba(255,255,255,0.2)',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '#site-navigation .menu > ul > li:after, #site-navigation .menu > li:after',
      'property' => 'background-color',
    )
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_bg_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Sub Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_bg_sub_menu_text_bg',
  'label'       => __('Link background', 'infinity'),
  'description' => __('Link background', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => secondary_color,
  'transport'   => 'postMessage',
  'output'    => array(
    array(
      'element'  => '#site-navigation .sub-menu li:after, #site-navigation .children li:after',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '#site-navigation .sub-menu li:after, #site-navigation .children li:after',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_bg_sub_menu_text_bg_hover',
  'description' => __('Link background on hover', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => primary_color,
  'output'    => array(
    array(
      'element'  => '#site-navigation .sub-menu li:hover:after, #site-navigation .children li:hover:after',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '#site-navigation .sub-menu li:hover:after, #site-navigation .children li:hover:after',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_bg_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">Mobile Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_bg_mobile_menu_bg',
  'description' => __('Mobile menu background', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => primary_color,
  'output'    => array(
    array(
      'element'  => '.site-header',
      'property' => 'background-color',
      'prefix'   => '@media ( max-width: 61.9375rem ) {',
      'suffix'   => '}',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-header',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));