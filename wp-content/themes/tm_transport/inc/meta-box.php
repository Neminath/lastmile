<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats($field)
{
  // Don't show this field if not in the cats category
  if (!has_tag('cats', $field->object_id)) {
    return false;
  }
  return true;
}

add_filter('cmb2_meta_boxes', 'infinity_metaboxes');
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function infinity_metaboxes(array $meta_boxes)
{

  // Start with an underscore to hide fields from custom fields list
  $prefix = 'infinity_';

  /**
   * Sample metabox to demonstrate each field type included
   */
  $meta_boxes['page_metabox'] = array(
    'id'           => 'page_metabox',
    'title'        => __('Page Settings', 'infinity'),
    'object_types' => array('page'), // Post type
    'context'      => 'normal',
    'priority'     => 'high',
    'show_names'   => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
    'fields'       => array(
      array(
        'name'    => __('Page Layout', 'infinity'),
        'desc'    => __('Choose a layout you want', 'infinity'),
        'id'      => $prefix . 'page_layout_private',
        'type'    => 'select',
        'options' => array(
          'default'         => __('Default', 'infinity'),
          'full-width'      => __('Full width', 'infinity'),
          'content-sidebar' => __('Content-Sidebar', 'infinity'),
          'sidebar-content' => __('Sidebar-Content', 'infinity'),
        ),
      ),
      array(
        'name' => 'Disable Title',
        'desc' => 'Check this box to disable the title of the page',
        'id' => $prefix . 'disable_title',
        'type' => 'checkbox'
      ),
      array(
        'name' => __( 'Title Background', 'infinity' ),
        'desc' => __( 'Upload an image or enter a URL for heading title', 'infinity' ),
        'id'   => $prefix . 'heading_image',
        'type' => 'file',
      ),
      array(
        'name' => 'Disable Comment',
        'desc' => 'Check this box to disable comment form of the page',
        'id' => $prefix . 'disable_comment',
        'type' => 'checkbox'
      ),
      array(
        'name'    => 'Custom Class',
        'desc'    => 'Enter custom class for this page',
        'id'      => $prefix . 'custom_class',
        'type'    => 'text'
      ),
    ),
  );

  return $meta_boxes;
}
