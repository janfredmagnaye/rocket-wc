<?php
	/**
	 * Register Theme Options
	 */
	function rocketThemeOptions(){
		  add_theme_page(
			  'Rocket Theme Options', 	//Page Title
			  'Rocket Theme Options',   //Menu Title
			  'manage_options', 			//Capability
			  'theme-options', 				//Page ID
			  'rocketThemeOptionsPage',		//Functions
			  null, 						//Favicon
			  99							//Position
		  );
	}
	/**
	 * Theme Options Page
	 */
	function rocketThemeOptionsPage() {
		echo '<div class="wrap">';
			echo '<h1>Primeview Rocket Theme Options</h1>';

			$tab_option = array ('Home','Social Media','Website Settings','Frontend Settings', 'Page Settings', 'Copyright Section', 'Add ons','Third Party Scripts');
			$x = 0;
			echo '<div class="tab">';
			foreach ($tab_option as $option_setting) {
				echo '<button id="tab-'.$x.'" class="tablinks" onclick="openTabRocket(event, '.$x.')">'.$option_setting.'</button>';
				$x++;
			}
			echo '</div>';
			?>
			<!-- Home -->
			<div id="0" class="tabcontent active">
					<div class="rckt-home">
						<img class="rckt-image-center" src='<?= get_template_directory_uri() ?>/assets/images/banner.png'>
						<h2>Social Media Shortcode</h2>
						<p><b>Shortcode :</b> [social-media]</p>
						<p><b>Parameters : </b> mode = facebook , twitter , google_plus , linkedin , youtube , instagram , pinterest </p>
						<p><b>Example : </b> [social-media mode="facebook"]</p>
						<h2>Other Shortcodes</h2>
						<p><b>Get Developer Part : </b> [developer] </p>
						<p><b>Get Copyright Part : </b> [copyright] </p>
						<p><b>Get Year Part : </b>[year]</p>
					</div>
				</div>
			<form method="post" enctype="multipart/form-data" action="options.php">
			<?php
				settings_fields( 'option-group' );
				do_settings_sections( 'option-group' );
			?>
				<!-- Social Media settings -->
				<div id="1" class="tabcontent">
					<h3> Social Media settings</h3>
					<p><b>Shortcode :</b> [social-media]</p>
					<p><b>Parameters : </b> mode = facebook , twitter , google_plus , linkedin , youtube , instagram , pinterest </p>
					<p><b>Example : </b> [social-media mode="facebook"]</p>
					<table class="rckt-table">
						<tr>
							<td>Facebook: </td>
							<td><input placeholder="Facebook" type="text" name="facebook" value="<?= esc_attr( get_option('facebook') ) ?>" /> </td>
						</tr>
						<tr>
							<td>Twitter: </td>
							<td><input placeholder="Twitter" type="text" name="twitter" value="<?= esc_attr( get_option('twitter') )?>" /></td>
						</tr>
						<tr>
							<td>Google Plus: </td>
							<td><input placeholder="Google Plus" type="text" name="google_plus" value="<?= esc_attr( get_option('google_plus') )?>" /></td>
						</tr>
						<tr>
							<td>LinkedIn: </td>
							<td><input placeholder="LinkedIN" type="text" name="linkedin" value="<?= esc_attr( get_option('linkedin') )?>" /></td>
						</tr>
						<tr>
							<td>Youtube: </td>
							<td><input placeholder="Youtube" type="text" name="youtube" value="<?= esc_attr( get_option('youtube') )?>" /></td>
						</tr>
						<tr>
							<td>Instagram: </td>
							<td><input placeholder="Instagram" type="text" name="instagram" value="<?= esc_attr( get_option('instagram') )?>" /></td>
						</tr>
						<tr>
							<td>Pinterest: </td>
							<td><input placeholder="Pinterest" type="text" name="pinterest" value="<?= esc_attr( get_option('pinterest') )?>" /></td>
						</tr>
					</table>
					<hr>
					<h3> Contacts </h3>
					<p><b>Shortcode :</b> [phonenumber]</p>
					<table class="rckt-table">
						<tr>
							<td>Phone Number: </td>
							<td><input placeholder="(000)-000-xxxx" type="text" name="phonenumber" value="<?= esc_attr( get_option('phonenumber') ) ?>" /> </td>
						</tr>
					</table>
				</div>
			
				<!-- Website settings -->
				<div id="2" class="tabcontent">
					<h3> Website Settings</h3>
					<table class="rckt-table">
						<tr>
							<td>Frontend Favicon: </td>
							<td><input placeholder="Frontend Favicon" type="text" name="favicon" value="<?= esc_attr( get_option('favicon') )?>" /></td>
						</tr>
						<tr>
							<td>Backend Favicon: </td>
							<td><input placeholder="Admin Backend Favicon" type="text" name="admin_favicon" value="<?= esc_attr( get_option('admin_favicon') )?>" /></td>
						</tr>
					</table>
				</div>
			
			
				<!-- Frontend settings  -->
				<div id="3" class="tabcontent">
					<h3> Frontend Settings</h3>
					<table class="rckt-table">
						<tr>
							<td>Header Background Color </td>
							<td><input type="text" name="header-bgcolor" class="color-field" value="<?= esc_attr( get_option('header-bgcolor') )?>" /></td>
						</tr>
						<tr>
							<td>Page Background Color </td>
							<td><input type="text" name="page-bgcolor" class="color-field" value="<?= esc_attr( get_option('page-bgcolor') )?>" /></td>
						</tr>
						<tr>
							<td>Footer Background Color </td>
							<td><input type="text" name="footer-bgcolor" class="color-field" value="<?= esc_attr( get_option('footer-bgcolor') )?>" /></td>
						</tr>
					</table>
				</div>
			
				<!-- Copyright settings -->
				<div id="4" class="tabcontent">
					<h3> Page Settings</h3>
					<table class="rckt-table">
						<tr>
							<td class="w-25">Header Template</td>
							<td class="w-25"><input type="radio" name="header-template" value="left"<?= ((get_option('header-template') === 'left') ? "checked='checked'" : '') ?>>Default</td>
							<td class="w-25"><input type="radio" name="header-template" value="center"<?= ((get_option('header-template') === 'center') ? "checked='checked'" : '') ?>>Center Logo</td>
							<td class="w-25"><input type="radio" name="header-template" value="right"<?= ((get_option('header-template') === 'right') ? "checked='checked'" : '') ?>>Right Logo</td>
						</tr>
						<tr>
							<td>Scroll to Top </td>
							<td class="w-25"><input type="checkbox" name="scroll-to-top" value="true" <?php if(get_option('scroll-to-top') == "true") echo "checked"; ?> />
						<tr>
					</table>
				</div>
					
				<div id="5" class="tabcontent">
					<p><b>Get Developer Part : </b> [developer] </p>
					<p><b>Get Copyright Part : </b> [copyright] </p>
					<p><b>Get Year Part : </b>[year]</p>
					<table class="rckt-table">
						<tr>
							<td>Copyright : </td>
							<td><textarea rows="6" type="text" name="copyright" value="<?= esc_attr( get_option('copyright') )?>" ><?= esc_attr( get_option('copyright') )?></textarea></td>
						</tr>
						<tr>
							<td>Developer : </td>
							<td><textarea rows="6" type="text" name="developer" value="<?= esc_attr( get_option('developer') )?>" ><?= esc_attr( get_option('developer') )?></textarea></td>
						</tr>
					</table>
				</div>

				<!-- Theme Features settings -->
				<div id="6" class="tabcontent">
					<h3> Enable Theme Features - Add Ons</h3>
					<table class="rckt-table">
						<tr>
							<td>FontAwesome v4.4.0 : </td>
							<td><input type="checkbox" name="font_awesome" value="true" <?php if(get_option('font_awesome') == "true") echo "checked"; ?> /> <a target="_blank" href="https://fortawesome.github.io/Font-Awesome/icons/">Read Documentation</a></td>
						</tr>
						<tr>
							<td>Scroll Reveal : </td>
							<td><input type="checkbox" name="scroll_reveal" value="true" <?php if(get_option('scroll_reveal') == "true") echo "checked"; ?> /><a target="_blank" href="https://github.com/jlmakes/scrollreveal.js">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>Owl Carousel v2.3.3: </td>
							<td><input type="checkbox" name="owl" value="true" <?php if(get_option('owl') == "true") echo "checked"; ?> /> <a target="_blank" href="https://owlcarousel2.github.io/OwlCarousel2/demos/basic.html">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>JS Parallax Scrolling : </td>
							<td><input type="checkbox" name="parallax" value="true" <?php if(get_option('parallax') == "true") echo "checked"; ?> /> <a target="_blank" href="https://pixelcog.github.io/parallax.js/">Read Documentation</a> </td>
						</tr>
						<tr>
							<td>Dark Mode Widget: </td>
							<td><input type="checkbox" name="dark_mode" value="true" <?php if(get_option('dark_mode') == "true") echo "checked"; ?> /> <a target="_blank" href="https://darkmodejs.learn.uno/">Read Documentation</a> </td>
						</tr>
					</table>
				</div>
			
				<div id="7" class="tabcontent">
					<h3> Third Party Scripts</h3>
					<table class="rckt-table">
						<tr>
							<td>Third Party Scripts : </td>
							<td><textarea rows="10" type="text" name="rocket_scripts" value="<?= esc_attr( get_option('rocket_scripts') )?>" ><?= esc_attr( get_option('rocket_scripts') )?></textarea></td>
						</tr>
					</table>
				</div>
				<div class="copyright"><p>© copyright 2020<a href="https://primeview.com" target="_blank">  Primeview</a></p></div>
				<?= submit_button(); ?>
			</form>

		</div>

		<script type="text/javascript">
			
			function openTabRocket(evt, cityName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(cityName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			// Get the element with id="defaultOpen" and click on it
			document.getElementById("tab-0").click();
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function(e) {
					$('#output_banner').attr('src', e.target.result);
					}
					reader.readAsDataURL(input.files[0]);
				}
			}
		</script>	
<?php
	}

	/**
	 * Register Theme Settings
	 */
	function rocketThemeSettings() {

		add_option( 'header-bgcolor', '#1e73be' );
		add_option( 'page-bgcolor', '#FFFFFF' );
		add_option( 'footer-bgcolor', '#8E8A89' );
		add_option( 'header-template', 'left' );

		register_setting( 'option-group', 'facebook' );
		register_setting( 'option-group', 'twitter' );
		register_setting( 'option-group', 'google_plus' );
		register_setting( 'option-group', 'linkedin' );
		register_setting( 'option-group', 'youtube' );
		register_setting( 'option-group', 'instagram' );
		register_setting( 'option-group', 'pinterest' );
		register_setting( 'option-group', 'phonenumber' );
		register_setting( 'option-group', 'favicon' );
		register_setting( 'option-group', 'admin_favicon' );
		register_setting( 'option-group', 'font_awesome' );
		register_setting( 'option-group', 'scroll_reveal' );
		register_setting( 'option-group', 'owl' );
		register_setting( 'option-group', 'parallax' );
		register_setting( 'option-group', 'dark_mode' );
		register_setting( 'option-group', 'loader' );
		register_setting( 'option-group', 'copyright' );
		register_setting( 'option-group', 'developer' );
		register_setting( 'option-group', 'rocket_scripts' );

		register_setting( 'option-group', 'header-bgcolor' );
		register_setting( 'option-group', 'page-bgcolor' );
		register_setting( 'option-group', 'footer-bgcolor' );
		register_setting( 'option-group', 'header-template' );
		register_setting( 'option-group', 'scroll-to-top' );

	}

	function dynamicCSS() {
		$header = get_option('header-bgcolor');
		$footer = get_option('footer-bgcolor');
		$page   = get_option('page-bgcolor');
	?>
		<style type="text/css">
			.site-header, nav.navbar {
				background-color:<?php echo $header; ?> !important;
			}
			footer, .site_main_footer, .site_copyright {
				background-color:<?php echo $footer; ?> !important;
			}
			.site{
				background-color:<?php echo $page; ?> !important;
			}
		</style>
	<?php

	}


	function dynamicJS() {
		$optionJS = get_option('header-template');
	?>
		<script async>
			$ = jQuery.noConflict();
			function mobyMobileMenu(){
			var 	template  = '<div id="main-mobile-menu" class="moby-inner">';
					template +=     '<div class="moby-close">x</div>';
					template +=     '<div class="moby-wrap">';
					template +=             '<div class="moby-menu"></div>';
					template +=     '</div>';
					template += '</div>';

			var mobyMenu = new Moby({
				menu       		: $('nav#nav-menu'), // The menu that will be cloned

		<?php if ($optionJS == 'right') { ?>
				menuClass  :  'left-side' ,
		<?php } else if ($optionJS == 'center') { ?>
				menuClass  :  'top-full' ,
		<?php } else if ($optionJS == 'left') { ?>
				menuClass  :  'right-side' ,
		<?php } ?>

				mobyTrigger		: $('#moby-button'), // Button that will trigger the Moby menu to open
				template 		: template

			});

			}

		</script>

	<?php
	}
	?>
