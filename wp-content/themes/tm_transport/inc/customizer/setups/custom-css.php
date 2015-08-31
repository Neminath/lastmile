<?php
/**
 * Custom CSS
 * ==========
 */
$section = 'custom_css';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'checkbox',
  'settings' => 'custom_css_enable',
  'label'    => __('Enable custom css', 'infinity'),
  'section'  => $section,
  'default'  => 1,
  'priority' => $priority++,
));

Kirki::add_field('infinity', array(
  'type'      => 'textarea',
  'settings'  => 'custom_css',
  'label'     => __('Custom CSS', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'transport' => 'postMessage',
  'default'   => '',
  'js_vars'   => array(
    array(
      'element'  => '#infinity-main-inline-css',
      'function' => 'html',
    ),
  ),
  'required'  => array(
    array(
      'setting'  => 'custom_css_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));