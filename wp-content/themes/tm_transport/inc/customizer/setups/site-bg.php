<?php
/**
 * Site Background
 * =========
 */
$section = 'background_image';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'site_bg_color',
  'label'     => __('Background color', 'infinity'),
  'help'      => __('Setup background color for your header', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '#999',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => 'body.boxed',
      'property' => 'background-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => 'body',
      'function' => 'css',
      'property' => 'background-color',
    ),
  )
));