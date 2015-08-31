<?php
/**
 * Footer Spacing
 * ============
 */
$section = 'footer_spacing';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'text',
  'setting'     => 'footer_general_padding',
  'label' => __('Padding', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '70px 0px 40px 0px',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.site-footer',
      'property' => 'padding',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-footer',
      'function' => 'css',
      'property' => 'padding',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'footer_general_margin',
  'label'     => __('Margin', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '0px 0px 0px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-footer',
      'property' => 'margin',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer',
      'function' => 'css',
      'property' => 'margin',
    ),
  )
));