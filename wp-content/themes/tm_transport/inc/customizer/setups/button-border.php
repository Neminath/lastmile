<?php
/**
 * Button Border
 * ============
 */
$section = 'button_border';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'button_border_width',
  'label'     => __('Border width', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '0px 0px 0px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.btn',
      'property' => 'border-width',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.btn',
      'function' => 'css',
      'property' => 'border-width',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'radio-buttonset',
  'setting'   => 'button_border_style',
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
  'output'    => array(
    array(
      'element'  => '.btn',
      'property' => 'border-style',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.btn',
      'function' => 'css',
      'property' => 'border-style',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'button_border_color',
  'label'       => __('Border color', 'infinity'),
  'description' => __('Border color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#000',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.btn',
      'property' => 'border-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.btn',
      'function' => 'css',
      'property' => 'border-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'button_border_color_hover',
  'description' => __('Border color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#000',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.btn:hover',
      'property' => 'border-color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.btn',
      'function' => 'css',
      'property' => 'border-color',
    ),
  )
));