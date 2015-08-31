<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Infinity
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
  return;
}
?>

<div class="col-md-4">
  <aside class="sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
  </aside>
</div>
