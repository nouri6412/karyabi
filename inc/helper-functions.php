<?php

/**
 * Returns information about the current post's discussion, with cache support.
 */
function custom_theme_get_discussion_data()
{
	static $discussion, $post_id;

	$current_post_id = get_the_ID();
	if ($current_post_id === $post_id) {
		return $discussion; /* If we have discussion information for post ID, return cached object */
	} else {
		$post_id = $current_post_id;
	}

	$comments = get_comments(
		array(
			'post_id' => $current_post_id,
			'orderby' => 'comment_date_gmt',
			'order'   => get_option('comment_order', 'asc'), /* Respect comment order from Settings » Discussion. */
			'status'  => 'approve',
			'number'  => 20, /* Only retrieve the last 20 comments, as the end goal is just 6 unique authors */
		)
	);

	$authors = array();
	foreach ($comments as $comment) {
		$authors[] = ((int) $comment->user_id > 0) ? (int) $comment->user_id : $comment->comment_author_email;
	}

	$authors    = array_unique($authors);
	$discussion = (object) array(
		'authors'   => array_slice($authors, 0, 6),           /* Six unique authors commenting on the post. */
		'responses' => get_comments_number($current_post_id), /* Number of responses. */
	);

	return $discussion;
}

function custome_theme_get_avatar_size()
{
	return 60;
}

function get_the_job_status($active,$btn=false)
{
	$ret = "منتشر نشده";
	$type_btn="danger";
	if ($active == 1) {
		$ret = "منتشر شده";
		$type_btn="success";
	}
	if($btn)
	{
         $ret='<span class="btn btn-'.$type_btn.'">'.$ret.'</span>';
	}
	return $ret;
}
