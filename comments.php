<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if (post_password_required()) {
	return;
}

$discussion = custom_theme_get_discussion_data();
?>

<div id="comments" class="<?php echo comments_open() ? 'comments-area' : 'comments-area comments-closed'; ?>">
	<div class="<?php echo $discussion->responses > 0 ? 'comments-title-wrap' : 'comments-title-wrap no-responses'; ?>">
		<h2 class="comments-title">
			<?php
			if (comments_open()) {

				if ('1' == $discussion->responses) {
					/* translators: %s: Post title. */
					//printf( _x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'twentynineteen' ), get_the_title() );
					echo '<p>' . 'یک نظر' . '<p>';
				} else {
					// printf(
					// 	/* translators: 1: Number of comments, 2: Post title. */
					// 	_nx(
					// 		'%1$s reply on &ldquo;%2$s&rdquo;',
					// 		'%1$s replies on &ldquo;%2$s&rdquo;',
					// 		$discussion->responses,
					// 		'comments title',
					// 		'twentynineteen'
					// 	),
					// 	number_format_i18n( $discussion->responses ),
					// 	get_the_title()
					// );
					echo '<p>' . number_format_i18n($discussion->responses) . ' ' . ' نظر' . '<p>';
				}
			}
			?>
		</h2><!-- .comments-title -->
	</div><!-- .comments-title-flex -->
	<?php
	if (have_comments()) :

		// Show comment form at top if showing newest comments at the top.


	?>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new CustomTheme_Walker_Comment(),
					'avatar_size' => custome_theme_get_avatar_size(),
					'short_ping'  => true,
					'style'       => 'ol',
				)
			);
			?>
		</ol><!-- .comment-list -->
		<?php
		if (comments_open()) {
			echo '<h4>'.'ارسال نظر جدید'.'</h4>';
			custome_theme_comment_form('desc');
		}
		// Show comment navigation.
		if (have_comments()) :
			$prev_icon     = custom_theme_get_icon_svg('chevron_left', 22);
			$next_icon     = custom_theme_get_icon_svg('chevron_right', 22);
			$comments_text = 'نظرات';
			the_comments_navigation(
				array(
					'prev_text' => sprintf('%s <span class="nav-prev-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span>', $prev_icon, 'قبلی', 'نظرات'),
					'next_text' => sprintf('<span class="nav-next-text"><span class="primary-text">%s</span> <span class="secondary-text">%s</span></span> %s', 'بعدی', 'نظرات', $next_icon),
				)
			);
		endif;

		// Show comment form at bottom if showing newest comments at the bottom.
		if (comments_open() && 'asc' === strtolower(get_option('comment_order', 'asc'))) :
		?>
			<div class="comment-form-flex">
				<span class="screen-reader-text"><?php 'نظر بدهید'; ?></span>
				<?php custome_theme_comment_form('asc'); ?>
			
			</div>
		<?php
		endif;

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
			<p class="no-comments">
				<?php echo 'ارسال نظر محدود شده است'; ?>
			</p>
	<?php
		endif;

	else :

		// Show comment form.
		custome_theme_comment_form(true);

	endif; // if have_comments();
	?>
</div><!-- #comments -->