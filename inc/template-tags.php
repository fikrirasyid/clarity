<?php
if( ! function_exists( 'clarity_sub_title' ) ) :
/**
 * Display sub-title part: actual sub title (plugin support) or category info
 */
function clarity_sub_title(){
	global $post;

	$categories 		= get_the_category( $post->ID );
	$categories_count	= count( $categories );
	$index_for_and 		= $categories_count - 1;

	// Loop the categories
	$index = 1;

	_e( 'In ', 'clarity' );

	foreach ( $categories as $category ) {
		/**
		 * Separating category
		 */
		if( $categories_count > 2 && $index > 1 ){
			echo ", ";
		}

		/**
		 * Correct place for preposition
		 */
		if( $categories_count > 2 && $index == $index_for_and ){
			_e( ' and ', 'clarity' );
		}

		printf( '<a href="%s" rel="category">%s</a>', esc_url( get_category_link( $category->term_id ) ), esc_attr( $category->cat_name ) );

		/**
		 * Correct place for preposition
		 */
		if( $categories_count == 2 && $index == $index_for_and ){
			_e( ' and ', 'clarity' );
		}

		$index++;
	}
}
endif;

if( ! function_exists( 'clarity_excerpt_mod' ) ) :
/**
 * Excerpt without the ugly [...]
 */
function clarity_excerpt_mod( $output ){

	$read_more = sprintf( '...</p><p class="read-more-wrap"><a href="%s" class="read-more">%s</a>', get_permalink( get_the_ID() ), __( 'Continue Reading', 'clarity' ) );

	$output = str_replace( '[&hellip;]', $read_more, $output );

	return $output;
}
endif;
add_filter( 'get_the_excerpt', 'clarity_excerpt_mod', 100 );

/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Clarity
 */

if ( ! function_exists( 'clarity_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function clarity_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'clarity' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'clarity' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'clarity' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'clarity_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function clarity_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'clarity' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'clarity' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'clarity' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'clarity_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function clarity_posted_on() {
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

	$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

	$byline = sprintf(
		_x( 'by %s', 'post author', 'clarity' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function clarity_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'clarity_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'clarity_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so clarity_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so clarity_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in clarity_categorized_blog.
 */
function clarity_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'clarity_categories' );
}
add_action( 'edit_category', 'clarity_category_transient_flusher' );
add_action( 'save_post',     'clarity_category_transient_flusher' );
