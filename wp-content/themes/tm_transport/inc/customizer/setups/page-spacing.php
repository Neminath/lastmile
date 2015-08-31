<?php
/**
 * Page Spacing
 * =========
 */
$section = 'page_spacing';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'page_spacing_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">Title</div>',
));

Kirki::add_field('infinity', array(
  'type'      => 'text',
  'setting'   => 'page_spacing_padding',
  'label'     => __('Padding', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '90px 0px 60px 0px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.big-title .entry-title',
      'property' => 'padding',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.big-title .entry-title',
      'function' => 'css',
      'property' => 'padding',
    ),
  )
));