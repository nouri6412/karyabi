<?php

function ea_comment_textarea_placeholder( $args ) {
	$args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="نظر"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'ea_comment_textarea_placeholder' );

/**
 * Comment Form Fields Placeholder
 *
 */
function be_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="نام"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="ایمیل"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="نشانی سایت"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'be_comment_form_fields' );

add_filter( 'comment_form_default_fields', 'tu_comment_form_hide_cookies_consent' );
function tu_comment_form_hide_cookies_consent( $fields ) {
	unset( $fields['cookies'] );
	return $fields;
}

function custome_theme_comment_form($order)
{
    if (true === $order || strtolower($order) === strtolower(get_option('comment_order', 'asc'))) {

        comment_form(
            array(
                'logged_in_as' => null,
                'title_reply'  => null,
                'label_submit'  =>'ارسال نظر',
                'class_submit'=>'submit site-button'    
            )
        );
    }
}
