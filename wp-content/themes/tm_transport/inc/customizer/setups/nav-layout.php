<?php
/**
 * Nav General
 * ================
 */
$section = 'nav';
$priority = 50;

Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'nav_sticky_enable',
  'label'       => __('Sticky Menu', 'infinity'),
  'description' => __('Turn on this option if you want to enable sticky header on your site', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 1,
));