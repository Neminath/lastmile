<?php
/**
 * Site Style
 * =========
 */
$section = 'site_style';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_style_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Body</div>',
));

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'site_style_body_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Open Sans',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => 'body',
    'property' => 'font-family',
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_body_font_weight',
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
    'element'  => 'body',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'body',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_body_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 14,
  'choices'   => array(
    'min'  => 7,
    'max'  => 48,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'body',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'body',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'site_style_body_text',
  'label'     => __('Font Color', 'infinity'),
  'help'      => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#000',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => 'body',
      'property' => 'color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => 'body',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_style_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Heading</div>',
));

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'site_style_heading_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Oswald',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '.vc_label,.tp-caption.a1,.t1,.woocommerce div.product p.price del, .woocommerce div.product span.price del,.woocommerce ul.products li.product .price,.widget_products,.eg-infinity-members-element-0,.wpb_widgetised_column .better-menu-widget ul li, .sidebar .better-menu-widget ul li,.pagination span, .pagination a,.hentry .read-more,.post-thumb .date,.thememove_testimonials .author span:first-child,.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header a,.recent-posts__item a,.eg-infinity-features-element-0,h1,h2,h3,h4,h5,h6',
    'property' => 'font-family',
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_heading_font_weight',
  'label'     => __('Font Weight', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 700,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => 100,
    'max'  => 900,
    'step' => 100,
  ),
  'output'    => array(
    'element'  => 'h1,h2,h3,h4,h5,h6',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h1,h2,h3,h4,h5,h6',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_heading_letter_spacing',
  'label'     => __('Letter Spacing', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 0.05,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => -1,
    'max'  => 1,
    'step' => .05,
  ),
  'output'    => array(
    'element'  => '.sidebar .better-menu-widget ul li,.wpb_widgetised_column .better-menu-widget ul li,h1,h2,h3,h4,h5,h6,.eg-infinity-features-element-0',
    'property' => 'letter-spacing',
    'units'    => 'em',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h1,h2,h3,h4,h5,h6,.eg-infinity-features-element-0',
      'function' => 'css',
      'property' => 'letter-spacing',
      'units'    => 'em',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'site_style_heading_font_color',
  'label'     => __('Font Color', 'kirki'),
  //'description' => __('This is the control description', 'kirki'),
  'help'      => __('This is some extra help text.', 'kirki'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#111',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => 'h1, h2, h3, h4',
      'property' => 'color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h1, h2, h3, h4',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_style_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_heading_h1_font_size',
  'label'     => __('H1 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 28,
  'choices'   => array(
    'min'  => 15,
    'max'  => 100,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h1',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h1',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_heading_h2_font_size',
  'label'     => __('H2 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 24,
  'choices'   => array(
    'min'  => 10,
    'max'  => 90,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h2',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h2',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_heading_h3_font_size',
  'label'     => __('H3 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 20,
  'choices'   => array(
    'min'  => 10,
    'max'  => 80,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h3',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h3',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'site_style_heading_h4_font_size',
  'label'     => __('H4 Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 16,
  'choices'   => array(
    'min'  => 10,
    'max'  => 70,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => 'h4',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => 'h4',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));