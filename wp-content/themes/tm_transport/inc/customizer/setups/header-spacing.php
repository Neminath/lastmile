<?php
/**
 * Header Spacing
 * ============
 */
$section = 'header_spacing';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'text',
  'setting'     => 'header_spacing_padding',
  'label' => __('Padding', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '0px 0px 0px 0px',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.site-header',
      'property' => 'padding',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-header',
      'function' => 'css',
      'property' => 'padding',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'header_spacing_margin',
  'label'     => __('Margin', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '0px 0px 0px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-header',
      'property' => 'margin',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-header',
      'function' => 'css',
      'property' => 'margin',
    ),
  )
));