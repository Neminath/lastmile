<?php
/**
 * Footer Border
 * ============
 */
$section = 'footer_border';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'footer_border_width',
  'label'     => __('Border width', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '0px 0px 0px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-footer',
      'property' => 'border-width',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer',
      'function' => 'css',
      'property' => 'border-width',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'radio-buttonset',
  'setting'   => 'footer_border_style',
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
      'element'  => '.site-footer',
      'property' => 'border-style',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer',
      'function' => 'css',
      'property' => 'border-style',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'footer_border_color',
  'label'     => __('Border color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#000',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-footer',
      'property' => 'border-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer',
      'function' => 'css',
      'property' => 'border-color',
    ),
  )
));