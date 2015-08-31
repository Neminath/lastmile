<?php
/**
 * Custom JS
 * ===================
 */
$section = 'custom_js';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'checkbox',
  'settings' => 'custom_js_enable',
  'label'    => __('Enable custom JS', 'infinity'),
  'section'  => $section,
  'priority' => $priority++,
  'default'  => 1,
));

Kirki::add_field('infinity', array(
  'type'      => 'textarea',
  'settings'  => 'custom_js',
  'label'     => __('Custom JS', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '',
  'required'  => array(
    array(
      'setting'  => 'custom_js_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  )
));