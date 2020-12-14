			<footer>
				<div class="site_main_footer">
					<div class="container">
						<div class="row">
							<?php dynamic_sidebar('footer-widget'); ?>
						</div>
					</div>
				</div>
				<div class="site_copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<?php echo do_shortcode('[copyright]'); ?>
							</div>
							<div class="col-md-6">
								<?php echo do_shortcode('[developer]'); ?>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<?php if(get_option('scroll-to-top')):?>
			<div id="scroll-to-top" title="Scroll to top"><i class="fa fa-arrow-up"></i></div>
			<?php endif; ?>
			<?php if(get_option('dark_mode')): ?>
				<script async>
					var options = {
						bottom: '32px', // default: '32px'
						right: 'unset', // default: '32px'
						left: '32px', // default: 'unset'
						time: '0.5s', // default: '0.3s'
						mixColor: '#fff', // default: '#fff'
						backgroundColor: '#fff',  // default: '#fff'
						buttonColorDark: '#100f2c',  // default: '#100f2c'
						buttonColorLight: '#fff', // default: '#fff'
						saveInCookies: false, // default: true,
						label: '🌓', // default: ''
						autoMatchOsTheme: true // default: true
					}
					const darkmode = new Darkmode(options);
					darkmode.showWidget();
				</script>
			<?php endif; ?>
		</div>
		<?php wp_footer(); ?>
		<?php
			if(get_option('rocket_scripts')!=null){
				echo get_option("rocket_scripts");		
			}
		?>
	</body>
</html>