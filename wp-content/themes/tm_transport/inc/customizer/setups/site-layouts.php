<?php
/**
 * Site Layout
 * ================
 */
$section = 'site_layouts';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_layouts_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'site_layout',
  'label'       => __('Site layout', 'infinity'),
  'description' => __('Choose the site layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'content-sidebar',
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_layouts_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'archive_layout',
  'label'       => __('Archive layout', 'infinity'),
  'description' => __('Choose the archive layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'content-sidebar',
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_layouts_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'search_layout',
  'label'       => __('Search layout', 'infinity'),
  'description' => __('Choose the search layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'sidebar-content',
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));