<?php
/**
 * Header Spacing
 * ============
 */
$section = 'button_spacing';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'text',
  'setting'     => 'button_padding',
  'label' => __('Padding', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '15px 20px 15px 20px',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.eg-infinity-features-element-26 span,.eg-infinity-features-element-26::before,.btn span,.btn::before',
      'property' => 'padding',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.btn span,.btn::before',
      'function' => 'css',
      'property' => 'padding',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'button_margin',
  'label'     => __('Margin', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '0px 0px 0px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.btn',
      'property' => 'margin',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.btn',
      'function' => 'css',
      'property' => 'margin',
    ),
  )
));