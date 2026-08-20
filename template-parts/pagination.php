<?php
/**
 * Post navigation template part.
 *
 * @package easychic
 */

?>
<nav class="nav-post" aria-label="<?php esc_attr_e( 'Post navigation', 'easychic' ); ?>">
	<?php

	$previous_post = get_previous_post();
	if ( ! empty( $previous_post ) ) :
		?>

	<div class="left-column">
		<div class="previous-post-link-wrap">
			<div class="previous-post-link">

				<?php esc_html_e( 'Previous Post', 'easychic' ); ?><br />

				<?php previous_post_link( '%link' ); ?>

			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php
	$next_post = get_next_post();
	if ( ! empty( $next_post ) ) :
		?>

	<div class="right-column">
		<div class="next-post-link-wrap">
			<div class="next-post-link">

				<?php esc_html_e( 'Next Post', 'easychic' ); ?><br />

				<?php next_post_link( '%link' ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

</nav>