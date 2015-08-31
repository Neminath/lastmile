<?php
/**
 * Top Area Border
 * ============
 */
$section = 'top_border';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'top_border_width',
  'label'     => __('Border width', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '0px 0px 0px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-top',
      'property' => 'border-width',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-top',
      'function' => 'css',
      'property' => 'border-width',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'radio-buttonset',
  'setting'   => 'top_border_style',
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
      'element'  => '.site-top',
      'property' => 'border-style',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-top',
      'function' => 'css',
      'property' => 'border-style',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'top_border_color',
  'label'     => __('Border color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#dddddd',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-top',
      'property' => 'border-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-top',
      'function' => 'css',
      'property' => 'border-color',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));