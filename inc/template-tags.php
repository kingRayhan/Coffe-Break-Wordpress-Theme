<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Coffe_Break
 */

if ( ! function_exists( 'coffeebreak_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function coffeebreak_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'coffeebreak' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	?>
			<ul class="blog-ic">
				<li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><span> <i class="glyphicon glyphicon-user"> </i><?php echo get_the_author(); ?></span> </a> </li>
				 <li><span><i class="glyphicon glyphicon-time"> </i><?php echo $posted_on; ?></span></li>
			</ul>
	<?php

}
endif;



if ( ! function_exists( '_s_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function _s_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', '_s' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);
	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', '_s' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}
endif;




if ( ! function_exists( 'coffeebreak_posted_date' ) ) :
function coffeebreak_posted_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'coffeebreak' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo $posted_on;


}
endif;




if ( ! function_exists( 'coffeebreak_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function coffeebreak_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'coffeebreak' ) );
		if ( $categories_list && coffeebreak_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'coffeebreak' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'coffeebreak' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'coffeebreak' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'coffeebreak' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'coffeebreak' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function coffeebreak_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'coffeebreak_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'coffeebreak_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so coffeebreak_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so coffeebreak_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in coffeebreak_categorized_blog.
 */
function coffeebreak_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'coffeebreak_categories' );
}
add_action( 'edit_category', 'coffeebreak_category_transient_flusher' );
add_action( 'save_post',     'coffeebreak_category_transient_flusher' );


function get_coffeebreak_excerpt($words = 200){
	$content = get_the_excerpt();

	$content_array = explode(" ", $content);
	$slice = array_slice($content_array, 0 , $words);
	$excerpt = implode(" ", $slice);

	return $excerpt;
}


function social_icons(){ 


?>
	
	<ul>

		<?php if(!empty(get_theme_mod('coffee_break_social_twitter'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_twitter')."'><i class='fa fa-twitter'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_facebook'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_facebook')."'><i class='fa fa-facebook'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_google'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_google')."'><i class='fa fa-google-plus'></i></a></li>"; } ?>
		
		<?php if(!empty(get_theme_mod('coffee_break_social_pinterest'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_pinterest')."'><i class='fa fa-pinterest'></i></a></li>"; } ?>
		
		<?php if(!empty(get_theme_mod('coffee_break_social_linkedin'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_linkedin')."'><i class='fa fa-linkedin'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_github'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_github')."'><i class='fa fa-github'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_vine'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_vine')."'><i class='fa fa-vine'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_instagram'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_instagram')."'><i class='fa fa-instagram'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_medium'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_medium')."'><i class='fa fa-medium'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_tumblr'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_tumblr')."'><i class='fa fa-tumblr'></i></a></li>"; } ?>

		<?php if(!empty(get_theme_mod('coffee_break_social_youtube'))) { echo "<li><a href='".get_theme_mod('coffee_break_social_youtube')."'><i class='fa fa-youtube'></i></a></li>"; } ?>

	</ul>

<?php }