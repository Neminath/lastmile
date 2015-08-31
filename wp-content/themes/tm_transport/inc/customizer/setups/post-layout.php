<?php
/**
 * Post Layout
 * =========
 */
$section = 'post_layout';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'post_layout',
  'label'       => __('Post layout', 'infinity'),
  'description' => __('Choose the post layout you want', 'infinity'),
  'help'        => __('Choose the post layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'content-sidebar',
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));