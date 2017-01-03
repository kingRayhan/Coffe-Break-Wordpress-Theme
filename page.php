<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Coffe_Break
 */

get_header(); ?>
	<!--about-starts-->
	<div class="about">
		<div class="container">
			<div class="about-main">
				<div class="col-md-8 about-left">

					<div class="about-tre">
						<?php
						if ( have_posts() ) :

							if ( is_home() && ! is_front_page() ) : ?>

							<?php
							endif;

							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content',get_post_format());

							endwhile;

							//the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div><!-- .about-tre -->
				</div>
				<?php get_sidebar(); ?>
				<div class="clearfix"></div>			
			</div>		
		</div>
	</div>
	<!--about-end-->
<?php get_footer(); ?>