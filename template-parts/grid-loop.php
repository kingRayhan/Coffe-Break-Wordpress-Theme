<div class="col-md-6 abt-left">

	<?php if(has_post_thumbnail('')) : ?>
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('grid_loop_thumb'); ?>
		</a>
	<?php endif; ?>
	<h6><?php the_title(); ?></h6>
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p><?php echo get_coffeebreak_excerpt(); ?></p>
	<label><?php coffeebreak_posted_date(); ?></label>
</div>