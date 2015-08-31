<header <?php header_class(); ?>>
  <div class="site-top hidden-xs hidden-sm">
    <div class="container">
      <?php if ((has_nav_menu('top') || has_nav_menu('social')) && Kirki::get_option('infinity', 'top_layout_enable') == 1) { ?>
        <div class="row middle">
          <div class="col-md-7">
            <?php wp_nav_menu(array('theme_location' => 'top', 'menu_id' => 'top-menu', 'container_class' => 'top-menu', 'fallback_cb' => false)); ?>
          </div>
          <div class="col-md-5 end-md end-lg">
            <?php wp_nav_menu(array('theme_location' => 'social', 'menu_id' => 'social-menu-top', 'container_class' => 'social-menu', 'fallback_cb' => false)); ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="header">
    <div class="container">
      <div class="row middle-xs middle-sm">
        <div class="col-md-2 col-xs-10 site-branding">
          <?php if ($logo = Kirki::get_option('infinity', 'site_logo')) { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo('name'); ?>"/></a>
          <?php } else { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
          <?php } ?>
        </div>
        <div class="col-xs-2 hidden-md hidden-lg end">
          <i id="open-left" class="fa fa-navicon"></i>
        </div>
        <div class="col-md-10 hidden-xs hidden-sm">
          <nav id="site-navigation" class="main-navigation hidden-xs hidden-sm" >
            <div class="row middle">
              <?php if (class_exists('WooCommerce') && Kirki::get_option('infinity', 'header_layout_mini_cart_enable') == 1&&Kirki::get_option('infinity', 'header_layout_search_enable') == 1) { ?>
                <?php $class = 'col-md-10'; ?>
              <?php }elseif(class_exists('WooCommerce') && (Kirki::get_option('infinity', 'header_layout_mini_cart_enable') == 1 || Kirki::get_option('infinity', 'header_layout_search_enable') == 1)) { ?>
                <?php $class = 'col-md-11'; ?>
              <?php } else { ?>
                <?php $class = 'col-md-12'; ?>
              <?php } ?>
              <div class="<?php echo esc_attr($class); ?>">
                <?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu', 'container_class' => 'primary-menu')); ?>
              </div>
              <?php if (Kirki::get_option('infinity', 'header_layout_search_enable') == 1) { ?>
                <div class="col-md-1 hidden-xs hidden-sm hidden-md end">
                  <div class="search-box">
                    <?php get_search_form(); ?>
                    <i class="fa fa-search"></i>
                  </div>
                </div>
              <?php } ?>
              <?php if (class_exists('WooCommerce') && Kirki::get_option('infinity', 'header_layout_mini_cart_enable') == 1) { ?>
                <div class="col-md-1">
                  <div class="mini-cart">
                    <?php echo thememove__minicart(); ?>
                    <div class="widget_shopping_cart_content"></div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </nav><!-- #site-navigation -->
        </div>
      </div>
    </div>
  </div>
</header><!-- #masthead -->
