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

?>
	<?php echo get_template_part('template-parts/carousel'); ?>

	<div class="footer">
		<div class="container">
			<div class="footer-text">
				<p>© <?php date('Y') ?> Coffee Break. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
			</div>
		</div>
	</div>
	<!--footer-end-->
	<?php wp_footer(); ?>
</body>
</html>