<?php
/**
 * Nav Border
 * ================
 */
$section = 'nav_border';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_border_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Main Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'label'     => __('Boder width', 'infinity'),
  'setting'   => 'nav_border_menu_text_border_with',
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '1px 1px 1px 1px',
  'transport' => 'postMessage',
));

Kirki::add_field('infinity', array(
  'type'      => 'radio-buttonset',
  'setting'   => 'nav_border_style',
  'label'     => __('Border style', 'kirki'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 'solid',
  'transport' => 'postMessage',
  'choices'   => array(
    'solid'  => __('Solid', 'infinity'),
    'dashed' => __('Dashed', 'infinity'),
    'dotted' => __('Dotted', 'infinity'),
    'double' => __('Double', 'infinity'),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_border_menu_text_border_color',
  'label'       => __('Color', 'infinity'),
  'description' => __('Border color', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#999',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_border_menu_text_border_color_hover',
  'description' => __('Border color on hover', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#999',
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'nav_border_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Sub Menu</div>',
));

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'label'     => __('Border width', 'infinity'),
  'setting'   => 'nav_border_sub_menu_text_border_with',
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '1px 1px 1px 1px',
  'transport' => 'postMessage',
));

Kirki::add_field('infinity', array(
  'type'      => 'radio-buttonset',
  'setting'   => 'nav_border_sub_menu_style',
  'label'     => __('Border style', 'kirki'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 'solid',
  'transport' => 'postMessage',
  'choices'   => array(
    'solid'  => __('Solid', 'infinity'),
    'dashed' => __('Dashed', 'infinity'),
    'dotted' => __('Dotted', 'infinity'),
    'double' => __('Double', 'infinity'),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_style_sub_menu_text_border_color',
  'label'       => __('Color', 'infinity'),
  'description' => __('Border color', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#999',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'nav_style_sub_menu_text_border_color_hover',
  'description' => __('Border color on hover', 'kirki'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#999',
));