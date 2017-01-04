<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coffe_Break
 */

$copyright_text = '© Coffee Break. All Rights Reserved | Theme by  <a href="http://rayhan.info/" target="_blank" class="customize-unpreviewable">@KingRayhan</a>';
if ( !empty(get_theme_mod('footer_copyright')) ) {
	$copyright_text = get_theme_mod('footer_copyright');
} 

?>
	<?php echo get_template_part('template-parts/carousel'); ?>

	<div class="footer">
		<div class="container">
			<div class="footer-text">
				<p><?php echo $copyright_text; ?></p>
			</div>
		</div>
	</div>
	<!--footer-end-->
	<?php wp_footer(); ?>
</body>
</html>