<?php
/**
 * Template Name: Front Page Template
 **/
get_header(); ?>

	<div id="primary" class="homepage site-content">
		<div class="layer layer_1">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('home-layer-1'); ?>
				</div>
			</div>
		</div>
		<div class="layer layer_2">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar('home-layer-2'); ?>
				</div>
			</div>
		</div>
		<div class="layer layer_3">
			<div class="container title_container">
				<div class="row">
					<?php dynamic_sidebar('home-layer-3-1'); ?>
				</div>
			</div>
			<div class="container content_container">
				<div class="row">
					<?php dynamic_sidebar('home-layer-3-2'); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
