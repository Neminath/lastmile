<?php
/**
 * Site Logo
 * =========
 */
$section = 'site_logo';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'        => 'image',
  'setting'     => 'site_logo',
  'label'       => __('Logo', 'infinity'),
  'description' => __('Choose a default logo image to display', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => 'http://transport.thememove.com/data/images/logo.png',
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_logo_group_title_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<div class="group_title">Spacing</div>',
));


Kirki::add_field('infinity', array(
  'type'      => 'text',
  'label'     => __('Logo Padding', 'infinity'),
  'setting'   => 'site_logo_padding',
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => '60px 20px 60px 15px',
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.site-branding',
      'property' => 'padding',
      'prefix'   => '@media ( min-width: 62rem ) {',
      'suffix'   => '}',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.site-branding',
      'function' => 'css',
      'property' => 'padding',
    ),
  )
));
