
<div class="container">
	<div class="row align-items-center">
		<div class="col-md-12">
			<div class="base-1 align-left">
				<span id="moby-button">
					<button class="hamburger" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>
			</div>
			<div class="base-2 align-right">
				<?php dynamic_sidebar('site-logo'); ?>
			</div>
		</div>
		<div class="col-md-12">
			<nav id="nav-menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
				<?php echo do_shortcode('[rocketmenu]'); ?>
			</nav>
		</div>
	</div>
</div>
