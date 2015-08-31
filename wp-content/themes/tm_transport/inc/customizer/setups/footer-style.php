<?php
/**
 * Footer Style
 * ============
 */
$section = 'footer_style';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'footer_style_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Text</div>',
));

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'footer_style_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Open Sans',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '.site-footer',
    'property' => 'font-family',
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'footer_style_font_size',
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
    'element'  => '.site-footer',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'footer_style_font_weight',
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
    'element'  => '.site-footer',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'footer_style_text_color',
  'label'     => __('Text Color', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#AAAAAA',
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => '.site-footer,.copyright .right',
    'property' => 'color',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer,.copyright .right',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'footer_style_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Link</div>',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'footer_style_link_color',
  'label'       => __('Link Color', 'infinity'),
  'description' => __('Link Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#AAAAAA',
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.site-footer a',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-footer a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'footer_style_link_color_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => primary_color,
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.site-footer a:hover',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-footer a:hover',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'footer_style_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Widget Title</div>',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'footer_style_widget_title_color',
  'label'       => __('Link Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.site-footer .widget-title',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-footer .widget-title',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

