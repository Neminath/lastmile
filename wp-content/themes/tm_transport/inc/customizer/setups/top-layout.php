<?php
/**
 * Top Area Layout
 * ==============
 */
$section = 'top_layout';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'top_layout_enable',
  'label'       => __('Top area', 'infinity'),
  'description' => __('Enabling this option will display top area', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 1,
));