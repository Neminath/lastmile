<?php
/**
 * Top Area Spacing
 * ============
 */
$section = 'top_spacing';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'text',
  'setting'     => 'top_general_padding',
  'label' => __('Padding', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '0px 0px 0px 0px',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.site-top',
      'property' => 'padding',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-top',
      'function' => 'css',
      'property' => 'padding',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'top_general_margin',
  'label'     => __('Margin', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '0px 0px 0px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-top',
      'property' => 'margin',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-top',
      'function' => 'css',
      'property' => 'margin',
    ),
  )
));