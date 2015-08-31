<?php
/**
 * Site Color
 * ================
 */
$section = 'site_color';
$priority = 1;

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'site_color_primary',
  'label'     => __('Primary color', 'infinity'),
  'help'      => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => primary_color,
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.wpb_text_column li:before,.tp-caption.a1 span,.vc_custom_heading.style5:before,.vc_custom_heading.style4:before,.vc_custom_heading.style4:after,.woocommerce ul.products li.product .price,.woocommerce ul.products li.product .price ins,.woocommerce ul.product_list_widget li,ul.style1 li:before,.better-menu-widget li:before,.single-post .comment-reply-title:before, .page .comment-reply-title:before, .single-post .comments-title:before, .page .comments-title:before,.post-thumb .date,.sidebar .widget-title:before, .wpb_widgetised_column .widget-title:before,.vc_custom_heading.style3,.related.products h2:before,.eg-infinity-features-element-25 i,.services1 .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-blue .vc_icon_element-icon,.extra-info i,.vc_custom_heading.style1:before,.vc_custom_heading.style1:after,.vc_custom_heading.style2:before,.vc_custom_heading.style2:after',
      'property' => 'color',
    ),
    array(
      'element'  => '.pricing.style1 .wpb_column:nth-child(2) .wpb_wrapper .vc_custom_heading,.pricing.style1 .wpb_column:hover .wpb_wrapper .vc_custom_heading,.tp-caption.icon,.better-menu-widget li:hover:before,.pagination span.current,.thememove_testimonials .author,.recent-posts__item .recent-posts__thumb a:before,.header01 .site-branding,.header01 .site-branding:before,.copyright .left,.copyright .left:before',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.services1 .vc_col-sm-6:hover .vc_col-sm-3 .wpb_wrapper',
      'property' => 'background-color',
      'prefix'   => '@media ( min-width: 1200px ) {',
      'suffix'   => '}',
    ),
    array(
      'element'  => '.services1 .vc_col-sm-6:hover .vc_col-sm-3 .wpb_wrapper:after',
      'property' => 'border-left-color',
      'prefix'   => '@media ( min-width: 1200px ) {',
      'suffix'   => '}',
    ),
    array(
      'element'  => '.better-menu-widget li:hover:after,.header01 .site-branding:after,.copyright .left:after',
      'property' => 'border-left-color',
    ),
    array(
      'element'  => '.better-menu-widget ul li:hover,input:focus, textarea:focus,.pagination span.current,.search-box input[type="search"],.services1 .vc_col-sm-6:hover .wpb_wrapper:before',
      'property' => 'border-color',
    ),
    array(
      'element'  => '.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon',
      'property' => 'background',
      'units'    => '!important',
    ),
    array(
      'element'  => '.thememove_testimonials .author:after',
      'property' => 'border-left-color',
    ),
    array(
      'element'  => '.wpb_accordion .wpb_accordion_wrapper .ui-state-active .ui-icon:after',
      'property' => 'border-left-color',
      'units'    => '!important',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.woocommerce ul.products li.product .price,.woocommerce ul.products li.product .price ins,.woocommerce ul.product_list_widget li,ul.style1 li:before,.better-menu-widget li:before,.single-post .comment-reply-title:before, .page .comment-reply-title:before, .single-post .comments-title:before, .page .comments-title:before,.post-thumb .date,.sidebar .widget-title:before, .wpb_widgetised_column .widget-title:before,.vc_custom_heading.style3,.related.products h2:before,.eg-infinity-features-element-25 i,.services1 .vc_icon_element.vc_icon_element-outer .vc_icon_element-inner.vc_icon_element-color-blue .vc_icon_element-icon,.extra-info i,.vc_custom_heading.style1:before,.vc_custom_heading.style1:after,.vc_custom_heading.style2:before,.vc_custom_heading.style2:after',
      'function' => 'css',
      'property' => 'color',
    ),
    array(
      'element'  => '.better-menu-widget li:hover:before,.pagination span.current,.thememove_testimonials .author,.recent-posts__item .recent-posts__thumb a:before,.site-branding,.site-branding:before,.copyright .left,.copyright .left:before',
      'function' => 'css',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.better-menu-widget li:hover:after,.site-branding:after,.copyright .left:after',
      'function' => 'css',
      'property' => 'border-left-color',
    ),
    array(
      'element'  => '.better-menu-widget ul li:hover,input:focus, textarea:focus,.pagination span.current,.search-box input[type="search"],.services1 .vc_col-sm-6:hover .wpb_wrapper:before',
      'function' => 'css',
      'property' => 'border-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

Kirki::add_field('infinity', array(
  'type'      => 'color',
  'setting'   => 'site_color_secondary',
  'label'     => __('Secondary color', 'infinity'),
  'help'      => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci earum est, explicabo id illo quae!', 'infinity'),
  'section'   => $section,
  'priority'  => $priority++,
  'default'   => secondary_color,
  'transport' => 'postMessage',
  'output'    => array(
    array(
      'element'  => '.post-thumb .year,.post-thumb .month',
      'property' => 'color',
    ),
    array(
      'element'  => '.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active',
      'property' => 'background',
      'units'    => '!important',
    ),
    array(
      'element'  => '.pricing.style1 .wpb_wrapper .vc_custom_heading,.tp-caption.t2:before,.latest:before,.get-quote .wpb_column:nth-child(1):before,.home__about-us .wpb_column:nth-child(1):after,.home__about-us .wpb_column:nth-child(1) .wpb_wrapper:after,button:hover, input:hover[type="button"], input:hover[type="reset"], input:hover[type="submit"], .button:hover,.tm_bread_crumb,.request .wpb_column:nth-child(2) .wpb_wrapper:after,.testi:before,.request .wpb_column:nth-child(2):after',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.vc_bar',
      'property' => 'background-color',
      'units'    => '!important',
    ),
    array(
      'element'  => '.request .wpb_column:nth-child(2):before',
      'property' => 'border-right-color',
    ),
    array(
      'element'  => '.get-quote .wpb_column:nth-child(1):after,.home__about-us .wpb_column:nth-child(1):before',
      'property' => 'border-left-color',
    ),
    array(
      'element'  => '.tm_bread_crumb:before',
      'property' => 'border-left-color',
    ),
  ),
  'js_vars'   => array(
    array(
      'element'  => '.post-thumb .year,.post-thumb .month',
      'function' => 'css',
      'property' => 'color',
    ),
    array(
      'element'  => 'button:hover, input:hover[type="button"], input:hover[type="reset"], input:hover[type="submit"], .button:hover,.tm_bread_crumb,.request .wpb_column:nth-child(2) .wpb_wrapper:after,.testi:before,.request .wpb_column:nth-child(2):after',
      'function' => 'css',
      'property' => 'background-color',
    ),
    array(
      'element'  => '.request .wpb_column:nth-child(2):before',
      'function' => 'css',
      'property' => 'border-right-color',
    ),
    array(
      'element'  => '.tm_bread_crumb:before',
      'function' => 'css',
      'property' => 'border-left-color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_link',
  'label'       => __('Link setting', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => secondary_color,
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => 'a,a:visited',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => 'a,a:visited',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_link_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => primary_color,
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => 'a:hover',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => 'a:hover',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'     => 'custom',
  'setting'  => 'site_color_hr_' . $priority++,
  'section'  => $section,
  'priority' => $priority++,
  'default'  => '<hr />',
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_bread_crumb_link',
  'label'       => __('Breadcrumb Link Color', 'infinity'),
  'description' => __('Link color', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#A6A6AC',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.tm_bread_crumb a',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.tm_bread_crumb a',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));

Kirki::add_field('infinity', array(
  'type'        => 'color',
  'setting'     => 'site_color_bread_crumb_link_hover',
  'description' => __('Link color on hover', 'infinity'),
  'section'     => $section,
  'priority'    => $priority++,
  'default'     => '#ffffff',
  'transport'   => 'postMessage',
  'output'      => array(
    array(
      'element'  => '.tm_bread_crumb,.tm_bread_crumb a:hover',
      'property' => 'color',
    ),
  ),
  'js_vars'     => array(
    array(
      'element'  => '.tm_bread_crumb,.tm_bread_crumb a:hover',
      'function' => 'css',
      'property' => 'color',
    ),
  )
));
