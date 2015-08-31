<?php
/**
 * Page Background
 * =========
 */
$section = 'page_bg';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'page_bg_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">Title</div>',
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'page_bg_color',
  'label'     => __('Background color', 'infinity'),
  'help'      => __('Setup background color for your header', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#fff',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.big-title',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'color-alpha',
  'setting'   => 'page_overlay_bg_color',
  'label'     => __('Overlay color', 'infinity'),
  'help'      => __('Setup overlay color for your header', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 'rgba(238,238,238,0.9)',
  'output'    => array(
    array(
      'element'  => '.big-title:after',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title:after',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'      => 'image',
  'setting'   => 'page_bg_image',
  'label'     => __('Background Image', 'infinity'),
  'help'      => __('Default background image for your header', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => 'http://transport.thememove.com/data/images/bg01.jpg',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.big-title',
      'property' => 'background-image',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title',
      'function' => 'css',
      'property' => 'background-image',
    ),
  )
));