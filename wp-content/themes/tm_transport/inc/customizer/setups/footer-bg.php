<?php
/**
 * Footer Background
 * ============
 */
$section = 'footer_bg';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'footer_bg_color',
  'label'     => __('Background color', 'infinity'),
  'help'      => __('Setup background color for your footer', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => secondary_color,
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-footer,.copyright',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer,.copyright',
      'function' => 'css',
      'property' => 'background-color',
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
  'type'      => 'color-alpha',
  'setting'   => 'footer_bg_widget_title_bg',
  'label'     => __('Background color', 'infinity'),
  'help'      => __('Setup background color for your footer', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => primary_color,
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-footer .widget-title span',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.site-footer .widget-title span:after',
      'property' => 'border-left-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-footer .widget-title span,.site-footer .widget-title span:after',
      'function' => 'css',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.site-footer .widget-title span:after',
      'function' => 'css',
      'property' => 'border-left-color',
    ),
  )
));