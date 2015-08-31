<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Infinity
 */

/**
 * ============================================================================
 * Header Class
 * ============================================================================
 *
 */
function header_class( $class = '' ) {
  echo 'class="' . join( ' ', get_header_class( $class ) ) . '"';
}
function get_header_class( $class = '' ) {
  $classes = array();
  $classes[] = 'site-header';
  $classes = array_map( 'esc_attr', $classes );
  $classes = apply_filters( 'header_class', $classes, $class );
  return array_unique( $classes );
}

/**
 * ============================================================================
 * Footer Class
 * ============================================================================
 *
 */
function footer_class( $class = '' ) {
  echo 'class="' . join( ' ', get_footer_class( $class ) ) . '"';
}
function get_footer_class( $class = '' ) {
  $classes = array();

  $classes[] = 'site-footer';

  $classes = array_map( 'esc_attr', $classes );

  $classes = apply_filters( 'footer_class', $classes, $class );

  return array_unique( $classes );
}

/**
 * Adds custom classes to the array of body classes.
 * ================================================
 * @param array $classes Classes for the body element.
 * @return array
 */
function infinity_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

  global $infinity_custom_class;
  if ($infinity_custom_class) {
    $classes[] = $infinity_custom_class;
  }

  if(Kirki::get_option( 'infinity', 'site_general_boxed' ) == 1){
    $classes[] = 'boxed';
  }

  $classes[] = Kirki::get_option( 'infinity', 'header_type' );

  global $infinity_page_layout_private;
  if( $infinity_page_layout_private != 'default' && class_exists('cmb2_bootstrap_205')){
    $layout = get_post_meta(get_the_ID(), "infinity_page_layout_private", true);
  }else{
    $layout = Kirki::get_option( 'infinity', 'page_layout' );
  }

  $classes[] = $layout;

  return $classes;
}
add_filter( 'body_class', 'infinity_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 * ==========================================================================
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function infinity_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name.
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary.
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'infinity' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'infinity_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function infinity_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'infinity_render_title' );
endif;

/***
 * is_tree conditional
 * ===================
 */
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
  global $post;         // load details about this page
  if(is_page()&&($post->post_parent==$pid||is_page($pid)))
    return true;   // we're at the page or at a sub page
  else
    return false;  // we're elsewhere
};

/***
 * Get mini cart HTML
 * ==================
 * @return string
 */
if (class_exists('WooCommerce')) {
  function thememove__minicart() {
    $cart_html  = '';
    $qty        = WC()->cart->get_cart_contents_count();
    $cart_html .= '<div class="mini-cart__button" title="' . __('View your shopping cart', 'infinity') . '">';
    $cart_html .= '<span class="mini-cart-icon"' . ' data-count="' . $qty . '"></span>';
    $cart_html .= '</div>';
    return $cart_html;
  }
  add_filter('woocommerce_add_to_cart_fragments', 'thememove_header_add_to_cart_fragment');
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 * ========================================================================
 * @param $fragments
 * @return mixed
 */
if (class_exists('WooCommerce')) {
  function thememove_header_add_to_cart_fragment($fragments) {
    ob_start();
    $cart_html = thememove__minicart();
    echo $cart_html;
    $fragments['.mini-cart__button'] = ob_get_clean();
    return $fragments;
  }
}

/**
 * Custom Comment Form
 * ========================================================================
 */
function infinity_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
  <div id="comment-<?php comment_ID(); ?>">
    <div class="comment-author vcard">
      <?php echo get_avatar($comment,$size='100'); ?>
    </div>
    <div class="comment-content">
      <?php if ($comment->comment_approved == '0') : ?>
        <em><?php _e('Your comment is awaiting moderation.','infinity') ?></em>
        <br />
      <?php endif; ?>
      <div class="metadata">
        <?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?> <br/>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
          <?php printf(__('%1$s','infinity'), get_comment_date(),  get_comment_time()) ?></a>
        <?php edit_comment_link(__('(Edit)','infinity'),'  ','') ?>
      </div>
      <?php comment_text() ?>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
  </div>
  <?php
}

function custom_excerpt_length( $length ) {
  return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );