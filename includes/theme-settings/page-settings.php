<?php
/**
	 * Get Rocket Navigation
	 */
	function getMenuNavigation(){
		$nav =  wp_nav_menu(
					array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 4,
						'container'         => 'div',
						'container_class'   => 'navbar-collapse desktop',
						'container_id'      => 'bs-navbar-collapse',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker()
					)
				);
		return $nav;
	}

	/* Header */
	function rocketHeaderLeft() {
		register_sidebar( array(
			'name' => __( 'Site Logo', 'rocket' ),
			'id' => 'site-logo',
			'description' => __( 'Display the Site Logo', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}
	function rocketHeaderRight() {
		register_sidebar( array(
			'name' => __( 'Site Info', 'rocket' ),
			'id' => 'site-info',
			'description' => __( 'Display the Site Information', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}

	/* Home Layer 1 */
	function rocketHomeLayer1() {
		register_sidebar( array(
			'name' => __( 'Home Layer 1', 'rocket' ),
			'id' => 'home-layer-1',
			'description' => __( 'Displays a 3 Column Widget(s)', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget col-md-4 %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}

	/* Home Layer 2 */
	function rocketHomeLayer2() {
		register_sidebar( array(
			'name' => __( 'Home Layer 2', 'rocket' ),
			'id' => 'home-layer-2-1',
			'description' => __( 'Displays a 2 Column Widget(s)', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget col-md-6 %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}

	/* Home Layer 3 */
	function rocketHomeLayer3_1() {
		register_sidebar( array(
			'name' => __( 'Home Layer 3-1', 'rocket' ),
			'id' => 'home-layer-3-1',
			'description' => __( 'Title for Home Layer 3', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget col-md-12 %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}
	function rocketHomeLayer3_2() {
		register_sidebar( array(
			'name' => __( 'Home Layer 3-2', 'rocket' ),
			'id' => 'home-layer-3-2',
			'description' => __( 'Displays a 2 Column Widget(s)', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget col-md-6 %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}

	/* Sidebar */
	function rocketSidebar() {
		register_sidebar( array(
			'name' => __( 'Primary Sidebar', 'rocket' ),
			'id' => 'primary-sidebar',
			'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}

	/* Footer */
	function rocketFooter() {
		register_sidebar( array(
			'name' => __( 'Footer Widget', 'rocket' ),
			'id' => 'footer-widget',
			'description' => __( 'Displays a 3 Column Widget(s)', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget col-md-4 %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}

	/* WC - Product Header */
	function rocketWCProductHeader() {
		register_sidebar( array(
			'name' => __( 'WC - Product Header', 'rocket' ),
			'id' => 'wc-product-header-widget',
			'description' => __( 'WC - Displays the Header for Product Pages. Shortcode for Product Name [page_title]', 'rocket' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}

	/* WC - Sidebar */
	function rocketWCSidebar() {
		register_sidebar( array(
			'name' => __( 'WC - Category Sidebar', 'rocket' ),
			'id' => 'wc-sidebar',
			'description' => __( 'Appears on category of product pages', 'rocket' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<span class="h4 widget-title">',
			'after_title' => '</span>',
		) );
	}
	

	/*
	* Pull Blogpost
	*/
	function pull_blog_posts($atts, $content = null){
	    extract(shortcode_atts(array(
		   'posts' => 1,
		   'cat' => 1,
		   'template'  => 'blogs'
	    ), $atts));

		$return = '';

		$args = array(
			'orderby' => 'date',
			'order' => 'DESC' ,
			'showposts' => $posts,
			'cat' => $cat
		);

		$query = new WP_Query($args);

		$return = array();

		if($query->have_posts()){
			while($query->have_posts()){
			$query->the_post();
				/*Pull news template*/
					$return['news'] .= '
						<a href="'.get_the_permalink().'">'.get_the_post_thumbnail(get_the_ID(), array(300,300)).'</a>
						<h4 class="title">'.get_the_title().'</h4>
						<p>'.rocket_excerpt(200).'</p>
						<a class="btn btn-primary" href="'.get_the_permalink().'">Learn More</a>
					';
				/*End Pull news template*/

			}
		}
		switch($template){
			case 'news' :
				$return = $return['news'];
			break;
		}
		wp_reset_query();
	    return $return;
	}

	/**
	 * Pagination
	 */

	function rocketPage() {
		global $wp_query;
		$big = 999999999; // need an unlikely integer

		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'prev_text'          => __('«'),
			'next_text'          => __('»'),
			'total' => $wp_query->max_num_pages
		) );
	}
