<?php
/**
 * Page Layout
 * =========
 */
$section = 'page_layout';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'page_layout',
  'label'       => __('Page layout', 'infinity'),
  'description' => __('Choose the site layout you want', 'infinity'),
  'help'        => __('Choose the site layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'full-width',
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));