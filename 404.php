<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Coffe_Break
 */

get_header(); ?>


<?php //echo get_template_part('template_part/banner'); ?>

	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-12 about-left">

					<div class="about-tre">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'coffeebreak' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'coffeebreak' ); ?></p>

					<?php
						get_search_form();
					?>



				</div><!-- .page-content -->
					</div><!-- .about-tre -->
				</div>		
			</div>		
		</div>
	</div>
	<!--about-end-->
<?php get_footer(); ?>