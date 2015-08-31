<?php
/**
 * Top Area Style
 * ============
 */
$section = 'top_style';
$priority = 1;

//Kirki::add_field('infinity', array(
//  'type'     => 'custom',
//  'setting'  => 'top_style_group_title_' . $priority++,
//  'section'  => $section,
//  'priority' => $priority++,
//  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
//  'default'  => '<div class="group_title">Text</div>',
//));
//
//Kirki::add_field('infinity', array(
//  'type'     => 'select2',
//  'setting'  => 'top_style_font_family',
//  'label'    => __('Font Family', 'infinity'),
//  'section'  => $section,
//  'priority' => $priority++,
//  'default'  => 'Open Sans',
//  'choices'  => Kirki_Fonts::get_font_choices(),
//  'output'   => array(
//    'element'  => '.site-top',
//    'property' => 'font-family',
//  ),
//));
//
//Kirki::add_field('infinity', array(
//  'type'      => 'slider',
//  'setting'   => 'top_style_font_size',
//  'label'     => __('Font Size', 'infinity'),
//  'section'   => $section,
//  'priority'  => $priority++,
//  'default'   => 14,
//  'choices'   => array(
//    'min'  => 7,
//    'max'  => 48,
//    'step' => 1,
//  ),
//  'transport' => 'postMessage',
//  'output'    => array(
//    'element'  => '.site-top',
//    'property' => 'font-size',
//    'units'    => 'px',
//  ),
//  'js_vars'   => array(
//    array(
//      'element'  => '.site-top',
//      'function' => 'css',
//      'property' => 'font-size',
//      'units'    => 'px',
//    ),
//  )
//));
//
//Kirki::add_field('infinity', array(
//  'type'      => 'slider',
//  'setting'   => 'top_style_font_weight',
//  'label'     => __('Font Weight', 'infinity'),
//  'section'   => $section,
//  'priority'  => $priority++,
//  'default'   => 300,
//  'transport' => 'postMessage',
//  'choices'   => array(
//    'min'  => 100,
//    'max'  => 900,
//    'step' => 100,
//  ),
//  'output'    => array(
//    'element'  => '.site-top',
//    'property' => 'font-weight',
//  ),
//  'js_vars'   => array(
//    array(
//      'element'  => '.site-top',
//      'function' => 'css',
//      'property' => 'font-weight',
//    ),
//  )
//));
//
//Kirki::add_field('infinity', array(
//  'type'      => 'color',
//  'setting'   => 'top_style_font_color',
//  'label'     => __('Font Color', 'infinity'),
//  'section'   => $section,
//  'priority'  => $priority++,
//  'default'   => '#000',
//  'transport' => 'postMessage',
//  'output'    => array(
//    'element'  => '.site-top',
//    'property' => 'color',
//  ),
//  'js_vars'   => array(
//    array(
//      'element'  => '.site-top',
//      'function' => 'css',
//      'property' => 'color',
//    ),
//  )
//));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'top_style_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">Link</div>',
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'top_style_link_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Open Sans',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '.site-top a',
    'property' => 'font-family',
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'top_style_link_font_size',
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
    'element'  => '.site-top a',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-top a',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'top_style_link_font_weight',
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
    'element'  => '.site-top a',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-top a',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'top_style_link_font_color',
  'label'       => __('Link Color', 'infinity'),
  'description' => __('Link Color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#777777',
  'transport'   => 'postMessage',
  'output'      => array(
    'element'  => '.site-top a',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-top a',
      'function' => 'css',
      'property' => 'color',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'top_style_link_font_color_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => primary_color,
  'output'      => array(
    'element'  => '.site-top a:hover',
    'property' => 'color',
  ),
  'js_vars'     => array(
    array(
      'element'  => '.site-top a:hover',
      'function' => 'css',
      'property' => 'color',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'top_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));