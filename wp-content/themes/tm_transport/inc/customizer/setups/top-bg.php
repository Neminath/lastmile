<?php
/**
 * Top Area Background
 * ============
 */
$section = 'top_bg';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'top_bg_color',
  'label'     => __('Background color', 'infinity'),
  'help'      => __('Setup background color for your top', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#ffffff',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.header02 .site-top,.header03 .site-top',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.header02 .site-top,.header03 .site-top',
      'function' => 'css',
      'property' => 'background-color',
    ),
  ),
  'required'    => array(
    array(
      'setting'  => 'header_type',
      'operator' => '!=',
      'value'    => 'header01',
    ),
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));