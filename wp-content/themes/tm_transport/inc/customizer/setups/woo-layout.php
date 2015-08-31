<?php
/**
 * Woo Layout
 * ================
 */
$section = 'woo_layout';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'woo_layout_category',
  'label'       => __('Category Product Page Layout', 'infinity'),
  'description' => __('Choose the category product page layout you want', 'infinity'),
  'help'        => __('Choose the category product page layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'sidebar-content',
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'radio-image',
  'setting'     => 'woo_layout_single_product',
  'label'       => __('Single Product Page Layout', 'infinity'),
  'description' => __('Choose the product page layout you want', 'infinity'),
  'help'        => __('Choose the product page layout you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'sidebar-content',
  'choices'     => array(
    'full-width'      => THEME_ROOT . '/core/customizer/images/1c.png',
    'content-sidebar' => THEME_ROOT . '/core/customizer/images/2cr.png',
    'sidebar-content' => THEME_ROOT . '/core/customizer/images/2cl.png',
  ),
));