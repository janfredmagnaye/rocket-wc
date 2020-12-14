<?php
    /**
     * FIXED: Morphing search
     */
	function overrideMorphing_Search_Plugin() {
		wp_dequeue_script( 'morphing-search' );
		wp_dequeue_style( 'morphing-search' );
		wp_enqueue_style( 'morphing-search', get_template_directory_uri() . '/assets/css/morphing-search/full-screen-morphing-search.css', array(), false);
		wp_enqueue_script( 'morphing-search', get_template_directory_uri() . '/assets/js/morphing-search/full-screen-morphing-search.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-autocomplete' ), '1.0', true );
	}
	add_action( 'wp_print_scripts', 'overrideMorphing_Search_Plugin' );
	
	// Enable Shortcodes in Widget
	add_filter( 'widget_text', 'do_shortcode' );

	/**
	 * Woocommerce Support
	 */
	function rocket_add_woocommerce_support() {
		add_theme_support( 'woocommerce', array(
			'product_grid'          => array(
				'default_rows'    => 4,
				'min_rows'        => 2,
				'max_rows'        => 8,
				'default_columns' => 3,
				'min_columns'     => 2,
				'max_columns'     => 6,
			),
		) );
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}
	add_action( 'after_setup_theme', 'rocket_add_woocommerce_support' ); 

	// /* Woocommerce - Before Main Content */
	// add_action( 'woocommerce_before_main_content', 'wc_container_wrap_start', 35);
	// function wc_container_wrap_start(){
	// 	echo '<div class="container">';
	// }

	// /* Woocommerce - After Main Content */
	// add_action( 'woocommerce_after_main_content', 'wc_container_wrap_end', 35);
	// function wc_container_wrap_end(){
	// 	echo '</div>';
	// }

	/* Woocommerce - Product Page Title Shortcode */
	function page_title_sc( ){
		return get_the_title();
	 }
	 add_shortcode( 'page_title', 'page_title_sc' );
	 //[page_title]

	 /* Woocommerce - Cart Page - Remove Sidebar */
	 add_action('woocommerce_before_main_content', 'remove_sidebar' );
	 function remove_sidebar()
	 {
		 if( is_checkout() || is_cart() || is_product()) { 
		  remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
		}
	 }

	// /* Woocommerce - Remove Coupon Code on Cart */
	// remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
	// add_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_coupon_form', 5 );

	/* Woocommerce - Cart Page - Add Customer Notes */

		/*Add the order_comments field to the cart*/	 
		add_action('woocommerce_cart_collaterals', 'order_comments_custom_cart_field');
		function order_comments_custom_cart_field() {
			echo '<div class="cart_order_notes">';
		?>
			<div class="customer_notes_on_cart">
			<label for="customer_notes_text"><?php _e('Add a note to your order:','woocommerce'); ?></label>
			<textarea id="customer_notes_text"></textarea>
			</div>
		<?php
		}
		/*  Process the checkout and overwriting the normal button */
		function woocommerce_button_proceed_to_checkout() {
			$checkout_url = wc_get_checkout_url();
			?>
				<form id="checkout_form" method="POST" action="<?php echo $checkout_url; ?>">
				<input type="hidden" name="customer_notes" id="customer_notes" value="">
				<a  href="#" onclick="document.getElementById('customer_notes').value=document.getElementById('customer_notes_text').value;document.getElementById('checkout_form').submit()" class="checkout-button button alt wc-forward">
				<?php _e( 'Proceed to checkout', 'woocommerce' ); ?></a>
				</form>
			<?php
			}
			// getting the values in checkout again
			add_action('woocommerce_checkout_before_customer_details',function(){
			?>
			<script>
				jQuery( document ).ready(function() {
					jQuery('#order_comments' ).val("<?php echo sanitize_text_field($_POST['customer_notes']); ?>");
				});
			</script>
			<?php 
			});

	/* Remove Apply Coupon on Cart Page */
	function disable_coupon_field_on_cart( $enabled ) {
		if ( is_cart() ) {
			$enabled = false;
		}
		return $enabled;
	}
	add_filter( 'woocommerce_coupons_enabled', 'disable_coupon_field_on_cart' );

	/* Get Active My Account Item */
	function get_active_account_menu_item() {
		global $wp;
		$items = wc_get_account_menu_items();
		$current = false;
		foreach ($items as $endpoint => $label) {
			// Set current item class.
			$current = isset( $wp->query_vars[ $endpoint ] );
			if ( 'dashboard' === $endpoint && ( isset( $wp->query_vars['page'] ) || empty( $wp->query_vars ) ) ) {
				$current = true; // Dashboard is not an endpoint, so needs a custom check.
			}

			if($current) {
				$current = $endpoint;
				break;
			}
		}
		/* Remove Hypen and Capitalize on Menu item Names */
		if($current=='dashboard') {
			$current = 'My Account';
		}
		if($current=='orders') {
			$current = 'Your Orders';
		}
		if($current=='downloads') {
			$current = 'Your Downloads';
		}
		if($current=='edit-address') {
			$current = 'Edit Address';
		}
		if($current=='edit-account') {
			$current = 'Edit Account Information';
		}
		if($current=='customer-logout') {
			$current = 'Logout';
		}
		if($current=='view-order') {
			$current = 'Order Details';
		}
		return $current;
	}

	/* Remove Dashboard */
	// add_filter( 'woocommerce_account_menu_items', 'rocket_remove_my_account_dashboard' );
	function rocket_remove_my_account_dashboard( $menu_links ){
	 
		unset( $menu_links['dashboard'] );
		return $menu_links;
	 
	}
	// add_action('template_redirect', 'rocket_redirect_to_orders_from_dashboard' );
	function rocket_redirect_to_orders_from_dashboard(){
	
		if( is_account_page() && empty( WC()->query->get_current_endpoint() ) ){
			wp_safe_redirect( wc_get_account_endpoint_url( 'orders' ) );
			exit;
		}
	
	}

	/* Custom Customer Dashboard Info */
	function rocket_custom_dashboard_total_spent(){
		$customer_dashboard_id = get_current_user_id();
		$customer_dashboard_total_spent = wc_get_customer_total_spent( $customer_dashboard_id );
		echo $customer_dashboard_total_spent;
	}
	function rocket_custom_dashboard_total_orders() {
		$customer_dashboard_id = get_current_user_id();
		return wc_get_customer_order_count( $customer_dashboard_id );
	}
	function rocket_custom_dashboard_count_processing(){
		$customer_dashboard_id = get_current_user_id();
		$processing_orders_count = count(wc_get_orders( array(
			'customer_id' => $customer_order,
			'status' => 'processing',
			'return' => 'ids',
			'limit' => -1,
		)));
		echo $processing_orders_count;
	}
	
	// Change "Default Sorting" to "Custom sorting" on shop page and in WC Product Settings
	function rocket_change_default_sorting_name( $catalog_orderby ) {
		$catalog_orderby = str_replace("Default sorting", "Sort by", $catalog_orderby);
		return $catalog_orderby;
	}
	add_filter( 'woocommerce_catalog_orderby', 'rocket_change_default_sorting_name' );
	add_filter( 'woocommerce_default_catalog_orderby_options', 'rocket_change_default_sorting_name' );

	//Get Cart Items count shortcode 
	function rocket_get_cart_items(){
		return WC()->cart->get_cart_contents_count();
	}
	add_shortcode( 'cart_item_count', 'rocket_get_cart_items' );
	//[cart_item_count] 