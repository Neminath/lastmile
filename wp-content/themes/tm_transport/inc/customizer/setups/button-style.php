<?php
/**
 * Button Style
 * ============
 */
$section = 'button_style';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'button_style_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Oswald',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '.cart_list .wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.eg-infinity-features-element-26,.btn,.wpcf7-submit',
    'property' => 'font-family',
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'button_style_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 13,
  'choices'   => array(
    'min'  => 7,
    'max'  => 48,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => '.cart_list .wc-forward,.woocommerce .cart .button, .woocommerce .cart input.button,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.btn',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.btn',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'button_style_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 400,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => '.cart_list .wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.btn',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.btn',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'button_style_link_color',
  'label'       => __('Link Color', 'infinity'),
  'description' => __('Link Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.cart_list a.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.eg-infinity-features-element-26 span,.btn span',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.eg-infinity-features-element-26 span,.btn span',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'button_style_link_color_hover',
  'description' => __('Link Color on hover', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'output'      => array(
    'element'  => '.cart_list a.wc-forward:hover,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.eg-infinity-features-element-26::before,.btn::before',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.btn::before',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));