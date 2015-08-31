<?php
/**
 * Woo Color
 * ================
 */
$section = 'woo_color';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'woo_color_primary',
  'label'     => __('Primary color', 'infinity'),
  'help'      => __('Action buttons/price slider/layered nav UI', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => primary_color,
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce .widget_price_filter .ui-slider .ui-slider-range,p.demo_store,.woocommerce a.button.alt.disabled, .woocommerce button.button.alt.disabled, .woocommerce input.button.alt.disabled, .woocommerce #respond input#submit.alt.disabled, .woocommerce a.button.alt:disabled, .woocommerce button.button.alt:disabled, .woocommerce input.button.alt:disabled, .woocommerce #respond input#submit.alt:disabled, .woocommerce a.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled],background-color',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.woocommerce .woocommerce-message,.woocommerce .woocommerce-info',
      'property' => 'border-top-color',
    ),
    array(
      'element'  => '.woocommerce .woocommerce-message:before,.woocommerce .woocommerce-info:before',
      'property' => 'color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '',
      'function' => 'css',
      'property' => 'border-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'woo_color_secondary',
  'label'     => __('Secondary color', 'infinity'),
  'help'      => __('Buttons and tabs', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => secondary_color,
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.woocommerce #reviews #comments ol.commentlist li img.avatar,.woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus',
      'property' => 'background',
    ),
    array(
      'element'  => '.woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart .cart-collaterals .cart_totals tr th,.woocommerce.widget_shopping_cart .total, .woocommerce .widget_shopping_cart .total',
      'property' => 'border-top-color'
    )
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'woo_color_high_light',
  'label'     => __('High Light Color', 'infinity'),
  'help'      => __('Price labels and sale flashes', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#000',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.woocommerce-cart .cart-collaterals .cart_totals .discount td,.woocommerce div.product .stock,.woocommerce div.product span.price, .woocommerce div.product p.price',
      'property' => 'color',
    ),
    array(
      'element'  => '.woocommerce span.onsale',
      'property' => 'background-color',
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'woo_color_content_bg',
  'label'     => __('Content Background Color', 'infinity'),
  'help'      => __('Your themes page background - used for tab active states', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#000',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '',
      'property' => 'color',
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'woo_color_subtext',
  'label'     => __('Subtext Color', 'infinity'),
  'help'      => __('Used for certain text and asides - breadcrumbs, small text etc', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#000',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.woocommerce-checkout #payment div.payment_box span.help,.woocommerce-checkout .checkout .create-account small,.woocommerce-cart .cart-collaterals .cart_totals table small,.woocommerce-cart .cart-collaterals .cart_totals p small,.woocommerce #reviews #comments ol.commentlist li .meta,.woocommerce #reviews h2 small a,.woocommerce #reviews h2 small,.woocommerce .woocommerce-breadcrumb a,.woocommerce small.note,.woocommerce .woocommerce-breadcrumb',
      'property' => 'color',
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'woo_button_color',
  'label'       => __('Button Color', 'infinity'),
  'description' => __('Color for button', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#111',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt,.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit',
      'property' => 'color',
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'woo_button_color_hover',
  'description' => __('Hover color for button', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
      'property' => 'color',
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'woo_button_bg_color',
  'label'       => __('Button Background Color', 'infinity'),
  'description' => __('Color for button', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#dddddd',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt,.woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit',
      'property' => 'background-color',
    ),
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'woo_button_bg_color_hover',
  'description' => __('Hover background color for button', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => primary_color,
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.woocommerce a.button.alt.disabled:hover, .woocommerce button.button.alt.disabled:hover, .woocommerce input.button.alt.disabled:hover, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce a.button.alt:disabled:hover, .woocommerce button.button.alt:disabled:hover, .woocommerce input.button.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt:disabled[disabled]:hover, .woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.woocommerce a.button.alt:hover:before,.woocommerce div.product form.cart .button:hover:before,.woocommerce ul.products li.product a.add_to_cart_button:hover:before',
      'property' => 'border-left-color',
    ),
  ),
));