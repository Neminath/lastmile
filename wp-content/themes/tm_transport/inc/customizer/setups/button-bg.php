<?php
/**
 * Button Background
 * ============
 */
$section = 'button_bg';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'button_bg_color',
  'label'     => __('Background color', 'infinity'),
  'help'      => __('Setup background color for your button', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#CA1F26',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.btn.alt:before,.cart_list .button.wc-forward,.eg-infinity-features-element-26 span,.btn span,input[type="submit"]',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.btn span',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'button_bg_color_hover',
  'label'     => __('Background color on hover', 'infinity'),
  'help'      => __('Setup background color for your button', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#232331',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.btn.alt span,.cart_list .button.wc-forward:hover,.eg-infinity-features-element-26::before,.btn::before',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.btn::before',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));