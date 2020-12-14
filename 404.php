<?php
/**
 * The template for displaying all 404 Pages
 **/
get_header(); ?>
	<!-- <div id="primary" class="404 innerpage site-content">
		<header class="innerpage-header">
			<h1 class="text-center innerpage-title">404 : Page not found</h1>
		</header>
		<div class="container main_content">
			<div class="row" role="main">
				<div class="col-md-8">
					<dl>
						<dt>The page you requested was not found, and we have a fine guess why.</dt>
						<dd>
							<ul class="disc">
								<li>If you typed the URL directly, please make sure the spelling is correct.</li>
								<li>If you clicked on a link to get here, the link is outdated.</li>
							</ul>
						</dd>
					</dl>
					<dl>
						<dt>What can you do?</dt>
						<dd>Have no fear, help is near! There are many ways you can get back on track with this site.</dd>
						<dd>
							<ul class="disc">
								<li><a href="#" onclick="history.go(-1); return false;">Go back</a> to the previous page.</li>
								<li>Use the search bar at the top of the page to search.</li>
								<li>Follow these links to get you back on track! <a href="<?php //echo get_site_url(); ?>">Home</a> 
							</ul>
						</dd>
					</dl>
				</div>
				<div class="col-md-4">
					<?php //get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div> -->
	<div class="text-center glitch-main">
		<a href="#" class="glitch" data-glitch="404">404</a>
	</div>
	<div class="container main_content text-center">
			<div class="row" role="main">
				<div class="col-md-12">
					<dl>
						<dt>The page you requested was not found, and we have a fine guess why.</dt>
					</dl>
					<dl>
						<dt>What can you do?</dt>
						<dd>Have no fear, help is near! There are many ways you can get back on track with this site.</dd>
						<dd>
								<p>Go back to the <a href="#" onclick="history.go(-1); return false;">previous page</a>.</p>
								<p>Go back <a href="<?php echo get_site_url(); ?>">Homepage</a> </p>
						</dd>
					</dl>
				</div>
			</div>
		</div>

<?php get_footer(); ?>

