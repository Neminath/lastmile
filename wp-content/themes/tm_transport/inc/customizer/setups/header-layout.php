<?php
/**
 * Header Layout
 * ==============
 */
$section = 'header_layout';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'select',
  'setting'     => 'header_type',
  'label'       => __('Header Type', 'infinity'),
  'description' => __('Choose the header type you want', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'header01',
  'choices'     => array(
    'header01' => 'Type 01',
    'header02' => 'Type 02',
    'header03' => 'Type 03',
    'header04' => 'Type 04',
    'header05' => 'Type 05',
    'header06' => 'Type 06',
  ),
));

Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'header_layout_search_enable',
  'label'       => __('Search box', 'infinity'),
  'description' => __('Turn on this option if you want to enable search box on your site', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 1,
));

if(class_exists('WooCommerce')) {
  Kirki::add_field('infinity', array(
    'type'        => 'toggle',
    'setting'     => 'header_layout_mini_cart_enable',
    'label'       => __('Mini Cart', 'infinity'),
    'description' => __('Turn on this option if you want to enable mini cart for header', 'infinity'),
    'section'     => $section,
    'priority'    => $priority++,
    'default'     => 1,
  ));
}