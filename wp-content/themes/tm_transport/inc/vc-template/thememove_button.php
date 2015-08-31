<?php
extract(shortcode_atts(array(
  'text'     => '',
  'url'      => '',
  'icon'     => '',
  'el_class' => '',
), $atts));
$el_class = $this->getExtraClass($el_class);
?>
<a <?php echo 'class="btn' . esc_attr( $el_class ) . '"'; ?> href="<?php echo esc_url( $url ); ?>" data-hover="<?php echo esc_attr( $text ); ?>"><span><?php echo $text; ?> <?php if($icon) { ?><i class="fa <?php echo $icon; ?>"></i><?php } ?></span></a>