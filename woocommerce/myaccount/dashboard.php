<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>
<h2 class="welcome-text">Welcome! <?php echo $current_user->display_name; ?></h2>
<div class="custom-wc-dashboard-info">
	<div class="row">
		<div class="col-md-4 custom-info">
			<p><strong>Total Order(s):</strong></p>
			<p class="count"><?php echo rocket_custom_dashboard_total_orders(); ?></p>
		</div>
		<div class="col-md-4 custom-info">
		<p><strong>Total Order(s) Amount:</strong></p>
			<p class="count"><span class="currency"><?php echo get_woocommerce_currency_symbol(); ?></span><?php rocket_custom_dashboard_total_spent(); ?></p>
		</div>
		<div class="col-md-4 custom-info">
		<p><strong>Processing Order(s):</strong></p>
			<p class="count"><?php rocket_custom_dashboard_count_processing(); ?></p>
		</div>
	</div>
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
