<?php
/**
 * Filters the default archive titles.
 */
function custom_theme_get_the_archive_title() {
	if ( is_category() ) {
		$title = 'دسته' .' '. '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_tag() ) {
		$title = 'تگ' .' '. '<span class="page-description">' . single_term_title( '', false ) . '</span>';
	} elseif ( is_author() ) {
		$title = 'نویسنده'.' ' . '<span class="page-description">' . get_the_author_meta( 'display_name' ) . '</span>';
	} elseif ( is_year() ) {
		$title = 'سال' .' '. '<span class="page-description">' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentynineteen' ) ) . '</span>';
	} elseif ( is_month() ) {
		$title = 'ماه'.' ' . '<span class="page-description">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentynineteen' ) ) . '</span>';
	} elseif ( is_day() ) {
		$title = 'روز' .' '. '<span class="page-description">' . get_the_date() . '</span>';
	} elseif ( is_post_type_archive() ) {
		$title = '' . '<span class="page-description">' . post_type_archive_title( '', false ) . '</span>';
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: %s: Taxonomy singular name. */
		$title = sprintf( esc_html__( '%s :', 'twentynineteen' ), $tax->labels->singular_name );
	} else {
		$title = '';
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'custom_theme_get_the_archive_title' );