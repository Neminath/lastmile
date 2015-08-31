<?php
/**
 * Copyright Style
 * ============
 */
$section = 'copyright_style';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'copyright_style_text_color',
  'label'       => __('Text Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.copyright',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.copyright',
      'function' => 'css',
      'property' => 'color',
    ),
  ),
  'required'    => array(
    array(
      'setting'  => 'copyright_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'copyright_style_link_color',
  'label'       => __('Link Color', 'infinity'),
  'description' => __('Link Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.copyright a',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.copyright a',
      'function' => 'css',
      'property' => 'color',
    ),
  ),
  'required'    => array(
    array(
      'setting'  => 'copyright_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'copyright_style_link_color_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.copyright a:hover',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.copyright a:hover',
      'function' => 'css',
      'property' => 'color',
    ),
  ),
  'required'    => array(
    array(
      'setting'  => 'copyright_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
));