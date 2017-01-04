<div class="about-one">
	<p><?php echo get_the_category()[0]->name; ?></p>
	<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
</div>

<div class="about-two" style="margin-bottom: 25px;">
	<a href="<?php the_permalink(); ?>">
		<?php the_post_thumbnail('thumb_700_400'); ?>
	</a>

	<div class="entry-meta" style="margin-top: 15px;">
		<?php _s_posted_on(); ?>
	</div><!-- .entry-meta -->

	<p><?php echo get_coffeebreak_excerpt(); ?></p>
	<div class="about-btn">
		<a href="<?php the_permalink(); ?>">Read More</a>
	</div>
<!-- 	<ul>
		<li><p>Share : </p></li>
		<li><a href="#"><span class="fb"> </span></a></li>
		<li><a href="#"><span class="twit"> </span></a></li>
		<li><a href="#"><span class="pin"> </span></a></li>
		<li><a href="#"><span class="rss"> </span></a></li>
		<li><a href="#"><span class="drbl"> </span></a></li>
	</ul> -->
</div>