<?php
/**
 * The template to display single post
 *
 * @package WordPress
 * @subpackage JUSTITIA
 * @since JUSTITIA 1.0
 */

get_header();

while ( have_posts() ) {
	the_post();

	get_template_part( apply_filters( 'justitia_filter_get_template_part', 'content', get_post_format() ), get_post_format() );


	// Related posts
	if ( justitia_get_theme_option( 'related_position' ) == 'below_content' ) {
		do_action( 'justitia_action_related_posts' );
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
}

get_footer();
