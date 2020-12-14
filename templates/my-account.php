<?php
/**
 * Template Name: WC - Account Page
 *
 */
get_header(); ?>
	<div id="primary" class="woocommerce-account-template site-content">
		<header class="woocommerce-My-Account-title">
            <div class="container">
                <h1><?php echo get_active_account_menu_item(); ?></h1>
            </div>
		</header>
		<div class="container">
			<div class="row" role="main">
				<div class="col-md-12">
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