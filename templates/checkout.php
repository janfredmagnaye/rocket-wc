<?php
/**
 * Template Name: WC - Checkout Page
 *
 */
get_header(); ?>
	<div id="primary" class="woocommerce-checkout-template site-content">
		<div class="container">
			<div class="row justify-content-center" role="main">
				<div class="col-md-10">
					<?php 
						while (have_posts()){ 
							the_post(); 
							get_template_part( 'content', 'page' ); 
						} 
					?>					
				</div><!-- .col-md-12 -->
			</div><!--.row -->
		</div><!-- .container-fluid -->
	</div><!-- .primary -->
<?php get_footer(); ?>