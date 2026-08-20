<?php
/**
 * The template for displaying the Comments
 *
 * This file comments pages.
 *
 * @package WordPress
 * @subpackage EasyChic
 * @since EasyChic 1.0
 */

?>

<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
	<h2 class="comments-title">
		<?php
			printf(
				esc_html(
					/* translators: 1: number of comments, 2: post title */
					_nx(
						'One thought on "%2$s"', // phpcs:ignore WordPress.WP.I18n.MissingSingularPlaceholder
						'%1$s thoughts on "%2$s"',
						get_comments_number(),
						'comments title',
						'easychic'
					)
				),
				esc_html( number_format_i18n( get_comments_number() ) ),
				'<span>' . esc_html( get_the_title() ) . '</span>'
			);
		?>
	</h2>

	<ol class="comment-list">
		<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 50,
				)
			);
		?>
	</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav class="navigation comment-navigation" role="navigation">

		<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'easychic' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'easychic' ) ); ?>
		</div>
		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'easychic' ) ); ?></div>
	</nav><!-- .comment-navigation -->
			<?php
	endif;
		?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'easychic' ); ?></p>
	<?php endif; ?>

	<?php endif; ?>

	<?php comment_form(); ?>

</div><!-- #comments -->