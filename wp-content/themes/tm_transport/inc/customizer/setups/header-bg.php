<?php
/**
 * Header Background
 * ============
 */
$section = 'header_bg';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'header_bg_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">Header</div>',
));

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'header_bg_color',
  'label'     => __('Background color', 'infinity'),
  'help'      => __('Setup background color for your header', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#ffffff',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-header,.header03 .headroom--not-top,.header04 .headroom--not-top',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-header,.header03 .headroom--not-top,.header04 .headroom--not-top',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));
if(class_exists('WooCommerce')) {
  Kirki::add_field('infinity', array(
    'type'     => 'custom',
    'setting'  => 'header_bg_group_title_' . $priority++,
    'section'  => $section,
    'priority' => $priority++,
    'default'  => '<div class="group_title">Mini Cart</div>',
    'required' => array(
      array(
        'setting'  => 'header_layout_mini_cart_enable',
        'operator' => '==',
        'value'    => 1,
      ),
    )
  ));

  Kirki::add_field('infinity', array(
    'type'      => 'color-alpha',
    'setting'   => 'header_bg_minicart_number_bg',
    'label'     => __('Number Background Color', 'infinity'),
    'section'   => $section,
    'priority'  => $priority++,
    'default'   => primary_color,
    'transport' => 'postMessage',
    'required'  => array(
      array(
        'setting'  => 'header_layout_mini_cart_enable',
        'operator' => '==',
        'value'    => 1,
      ),
    ),
    'output'    => array(
      array(
        'element'  => '.mini-cart .mini-cart__button .mini-cart-icon:after',
        'property' => 'background-color',
      ),
    ),
    'js_vars'   => array(
      array(
        'element'  => '.mini-cart .mini-cart__button .mini-cart-icon:after',
        'function' => 'css',
        'property' => 'background-color',
      ),
    )
  ));
}