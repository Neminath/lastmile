<?php
/**
 * Post Style
 * =========
 */
$section = 'post_style';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'post_style_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'help'     => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'default'  => '<div class="group_title">Title</div>',
));

Kirki::add_field('infinity', array(
  'type'     => 'select2',
  'setting'  => 'post_style_heading_font_family',
  'label'    => __('Font Family', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 'Oswald',
  'choices'  => Kirki_Fonts::get_font_choices(),
  'output'   => array(
    'element'  => '.big-title--single .entry-title',
    'property' => 'font-family',
  ),
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'post_style_heading_font_weight',
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
    'element'  => '.big-title--single .entry-title',
    'property' => 'font-weight',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title--single .entry-title',
      'function' => 'css',
      'property' => 'font-weight',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'post_style_heading_letter_spacing',
  'label'     => __('Letter Spacing', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 0,
  'transport' => 'postMessage',
  'choices'   => array(
    'min'  => -1,
    'max'  => 1,
    'step' => .05,
  ),
  'output'    => array(
    'element'  => '.big-title--single .entry-title',
    'property' => 'letter-spacing',
    'units'    => 'em',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title--single .entry-title',
      'function' => 'css',
      'property' => 'letter-spacing',
      'units'    => 'em',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'post_style_heading_font_color',
  'label'     => __('Font Color', 'kirki'),
  //'description' => __('This is the control description', 'kirki'),
  'help'      => __('This is some extra help text.', 'kirki'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#111111',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.big-title--single .entry-title',
      'property' => 'color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title--single .entry-title',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'slider',
  'setting'   => 'post_style_heading_font_size',
  'label'     => __('Font Size', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 35,
  'choices'   => array(
    'min'  => 15,
    'max'  => 100,
    'step' => 1,
  ),
  'transport' => 'postMessage',
  'output'    => array(
    'element'  => '.big-title--single .entry-title',
    'property' => 'font-size',
    'units'    => 'px',
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title--single .entry-title',
      'function' => 'css',
      'property' => 'font-size',
      'units'    => 'px',
    ),
  )
));