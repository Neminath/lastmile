<?php
/**
 * Copyright Layout
 * ============
 */
$section = 'copyright_layout';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'toggle',
  'setting'     => 'copyright_layout_enable',
  'label'       => __('Copyright', 'infinity'),
  'description' => __('Enabling this option will display copyright area', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 1,
));

Kirki::add_field('infinity', array(
  'type'        => 'textarea',
  'setting'     => 'copyright_layout_left_text',
  'label'       => __('Left Text', 'infinity'),
  'description' => __('Entry the text for left block', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'Made with <i class="fa fa-heart"></i> by <a target="_blank" href="http://themeforest.net/item/structure-construction-business-wordpress-theme/10798442?ref=ThemeMove">ThemeMove.com</a>.',
  'transport'   => 'postMessage',
  'required'    => array(
    array(
      'setting'  => 'copyright_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.copyright .left',
      'function' => 'html',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'textarea',
  'setting'     => 'copyright_layout_right_text',
  'label'       => __('Right Text', 'infinity'),
  'description' => __('Entry the text for left block', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '&copy; Copyrights 2015 Transport Inc. All rights reserved.',
  'transport'   => 'postMessage',
  'required'    => array(
    array(
      'setting'  => 'copyright_layout_enable',
      'operator' => '==',
      'value'    => 1,
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.copyright .right',
      'function' => 'html',
    ),
  )
));
