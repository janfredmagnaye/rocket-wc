<?php

/**
 * Rocket CSS : PUT CSS HERE
 */
function rocketStyle(){

		//Font awesome
		if(get_option('font_awesome') == "true") { 
			wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/css/fontawesome/all.css' );
		}	
		//Owl
		if(get_option('owl') == "true") { 		
			wp_enqueue_style( 'owl-css', get_template_directory_uri().'/assets/css/owl.carousel.min.css');
		}
		//Rocket CSS
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap/bootstrap.min.css');
		wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css');	
		wp_enqueue_style( 'styles', get_template_directory_uri() . '/assets/css/styles.css');
		wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css');
		wp_enqueue_style( 'moby-css', get_template_directory_uri() . '/assets/css/moby/moby.min.css');
		wp_enqueue_style( 'hamburger', get_template_directory_uri() . '/assets/css/hamburger/hamburgers.min.css');
		wp_enqueue_style( 'font-awesome-5', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
		
		//Rocket Woocommerce CSS
		wp_enqueue_style( 'rocket-wc-widget', get_template_directory_uri().'/assets/css/woocommerce/widget/style.css');
		wp_enqueue_style( 'rocket-wc-widget-responsive', get_template_directory_uri().'/assets/css/woocommerce/widget/responsive.css');

		




						
}

function importAdminAssets(){
	/**
	 * Theme Options
	 */
	add_action( 'admin_menu', 'rocketThemeOptions' );
	add_action( 'admin_init', 'rocketThemeSettings');
	/** 
	 * Admin Favicon
	 */
	 add_action('admin_head', 'adminFavicon');
	/**
	 * Theme Features
	 */
	 add_theme_support( 'post-thumbnails' ); 
}


/**
 * Rocket JS : PUT JS HERE
 */
function rocketScript(){
	//Scroll Reveal
	if(get_option('scroll_reveal')) { 
		wp_enqueue_script( 'scroll-reveal',  get_template_directory_uri().'/assets/js/scrollreveal/scrollreveal.min.js',array('jquery'));
	}
	//Font awesome
	if(get_option('font_awesome')) { 
		wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/js/fontawesome/all.js',array('jquery'));
	}
	if(get_option('owl')) { 
		wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/js/owlcarousel/owl.carousel.js',array('jquery'));
	}	
	if(get_option('parallax')) { 
		wp_enqueue_script( 'parallax', get_template_directory_uri() . '/assets/js/parallax/parallax.min.js',array('jquery'));
	}
	//Dark Mode
	if(get_option('dark_mode')) {
		wp_enqueue_script( 'rocket-dark-mode', get_template_directory_uri() . '/assets/js/darkmode/darkmode-js.min.js',array());
		wp_enqueue_script( 'rocket-dark-mode-custom', get_template_directory_uri() . '/assets/js/dark-mode-custom.js',array());
	}

	$css = '';
	if(get_option('scroll-to-top')) {
		$css .= "<style type='text/css'>#scroll-to-top {display: block;}</style>";
	} else {
		$css .= "<style type='text/css'>#scroll-to-top {display: none;}</style>";
	}
	echo $css;
	
	//Rocket JS
	wp_enqueue_script( 'rocket-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js', array('jquery'));	
	wp_enqueue_script( 'rocket-script', get_template_directory_uri() . '/assets/js/script.js',array('jquery'));
	wp_enqueue_script( 'moby-js', get_template_directory_uri() . '/assets/js/moby/moby.min.js',array());
	//Wordpress AJAX
	wp_localize_script( 'wp_ajax', 'wp_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));
	wp_enqueue_script( 'wp_ajax' );
	
	//Transfer Scripts to footer
	// remove_action('wp_head', 'wp_print_scripts'); 
    // remove_action('wp_head', 'wp_print_head_scripts', 9); 
    // remove_action('wp_head', 'wp_enqueue_scripts', 1);

    // add_action('wp_footer', 'wp_print_scripts', 5);
    // add_action('wp_footer', 'wp_enqueue_scripts', 5);
    // add_action('wp_footer', 'wp_print_head_scripts', 5); 
}


function wsds_detect_enqueued_scripts() {
	global $wp_scripts;
	foreach( $wp_scripts->queue as $handle ) :
		echo $handle . ' | ';
	endforeach;
}

function wsds_defer_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to defer
	$defer_scripts = array( 
		'main-script'
	);
    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" defer="defer"></script>' . "\n";
    }
    return $tag;
}
/**
 * Remove script version
 */
function removeScriptVersion( $src ){
	$parts = explode( '?ver', $src ); 
	return $parts[0];
}
/**
 * Async All JS
 */
function asyncJS ( $url ) {
	if ( FALSE === strpos( $url, '.js' ) ) return $url;
	if ( strpos( $url, 'jquery.js' ) ) return $url;
	return "$url'  async='async"; 
}
function wsds_async_scripts( $tag, $handle, $src ) {
	// The handles of the enqueued scripts we want to async
	$async_scripts = array( 
		'contact-form-7',
		'bootstrap-js',
		'main-tether-js',
		'main-bootstrap-js',
		'parallax',
		'owl-js',
	);
    if ( in_array( $handle, $async_scripts ) ) {
        return '<script type="text/javascript" src="' . $src . '" async="async"></script>' . "\n";
    }
    return $tag;
}
function zn_upload_mimes($mimes) {
	$mimes['csv'] = "text/csv";
	return $mimes;
}
add_filter('upload_mimes', 'zn_upload_mimes');

