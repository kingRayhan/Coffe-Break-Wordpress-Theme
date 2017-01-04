<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coffe_Break
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>


<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
</script>
<!--start-smoth-scrolling-->
</head>
<body <?php body_class(); ?>>
	<!--header-top-starts-->
	<div class="header-top">
		<div class="container">
			<div class="head-main">
				<a href="<?php bloginfo('home'); ?>">
				<?php 
				$logo_url = get_template_directory_uri().'/images/logo-1.png';
				if ( !empty(get_theme_mod('coffee_website_logo')) ) {
					$logo_url = get_theme_mod('coffee_website_logo');
				} 
				?>

				<img src="<?php echo $logo_url; ?>" alt="" />

				</a>
			</div>
		</div>
	</div>
	<!--header-top-end-->
	<!--start-header-->
	<div class="header">
		<div class="container">
			<div class="head">
			<div class="navigation">
				 <span class="menu"></span> 
					<?php  
						wp_nav_menu(array(
							'theme_location' => 'menu-1',
							'menu_class' => 'navig',
							'container' => 'ul'
						));
					?>
			</div>

			<div class="header-right">
				<div class="search-bar">
					<form action="<?php bloginfo('home'); ?>">
						<input type="text" value="<?php echo get_search_query(); ?>" placeholder="Search" name="s">
						<input type="submit" value="">
					</form>
				</div>
				<div class="social-icons">
					<?php social_icons(); ?>
				</div>
			</div>
				<div class="clearfix"></div>
			</div>
			</div>
		</div>	
	<!-- script-for-menu -->

	

	<!-- script-for-menu -->
		<script>
			jQuery(document).ready(function($) {
				$("span.menu").click(function(){
					$(" ul.navig").slideToggle("slow" , function(){
					});
				});
			});
		</script>
	<!-- script-for-menu -->
