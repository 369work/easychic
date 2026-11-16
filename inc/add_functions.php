<?php
/**
 * Custom functions for the Easychic theme.
 *
 * @package Easychic
 */

/**
 * Add Easychic menu to admin.
 */
function easychic_add_admin_menu() {
	add_menu_page(
		'Easychic Theme Description', // Page title.
		'Easychic', // Menu title.
		'manage_options', // Capability.
		'easychic-theme-description', // Menu slug.
		'easychic_theme_description_page', // Function to display the page.
		'dashicons-pets', // Icon URL.
		59 // Position (just above Appearance menu which is at 60).
	);
}
add_action( 'admin_menu', 'easychic_add_admin_menu' );

/**
 * Display the theme options page.
 */
function easychic_theme_description_page() {
	?>
<style>
#wpwrap .admin-title {
	font-size: 1.5rem;
	margin-bottom: 1rem;
}

#wpwrap .admin-sub-title {
	font-size: 1.25rem;
	margin-bottom: 1rem;
	padding-bottom: .5rem;
	border-bottom: 1px solid #5e96ff;
}

#wpwrap p {
	margin-bottom: 1rem;
	font-size: 1rem;
}

#wpwrap .content {
	box-sizing: border-box;
	width: 100%;
	margin-top: 1rem;
	padding: 1rem;
	border: 1px solid #ddd;
	border-radius: 5px;
	background-color: #fff;
}

.content .border {
	border: 1px solid #5e96ff;
}

.content .bold {
	font-weight: bold;
}

.content a {
	color: #fff;
	font-size: 1rem;
}

.content .easychic-support-links {
	display: flex;
	flex-wrap: wrap;
	gap: 0 1rem;
}

.content .easychic-button {
	display: inline-block;
	margin: 1rem 0;
	padding: 10px 20px;
	border-radius: 5px;
	background-color: #0073aa;
	color: #fff;
	text-align: center;
	text-decoration: none;
}
</style>
<div class="wrap">
	<h1 class="admin-title"><?php esc_html_e( 'Easychic Theme Options', 'easychic' ); ?></h1>
	<div class="notice notice-success is-dismissible">
		<h3 class="admin-sub-title"><?php esc_html_e( 'Thank you for using the Easychic theme!', 'easychic' ); ?></h3>
		<p><?php esc_html_e( 'Here you can customize the Easychic theme.', 'easychic' ); ?></p>
	</div>

	<div class="content">
		<h2 class="admin-sub-title"><?php esc_html_e( 'Getting Started', 'easychic' ); ?></h2>
		<p><?php esc_html_e( 'To get started with the Easychic theme, you can customize the theme using the Customizer.', 'easychic' ); ?>
		</p>
		<a href="<?php echo esc_url( admin_url( 'customize.php?easychic-theme-options' ) ); ?>"
			style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;"><?php esc_html_e( 'Customize', 'easychic' ); ?></a>

	</div>

	<div class="content">
		<h3 class="admin-sub-title"><?php esc_html_e( 'Basic usage of Easychic theme', 'easychic' ); ?></h3>
		<p><?php esc_html_e( 'The Customizer allows you to easily customize the look of your site. You can customize the following elements:', 'easychic' ); ?>
		</p>
		<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">

			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Font selection', 'easychic' ); ?></p>
			</div>
			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Site style', 'easychic' ); ?></p>
			</div>
			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Custom logo', 'easychic' ); ?></p>
			</div>
			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Custom background Color', 'easychic' ); ?></p>
			</div>
			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Custom background', 'easychic' ); ?></p>
			</div>
			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Menu placement', 'easychic' ); ?></p>
			</div>
			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Sidebar and layout', 'easychic' ); ?></p>
			</div>
			<div
				style="border: 1px solid #94a3b8; padding: 10px; margin-bottom: 10px; border-radius: 5px; background-color: #f0f9ff;">
				<p class="bold"><?php esc_html_e( 'Sidebar Widget', 'easychic' ); ?></p>
			</div>

		</div>
		<a href="<?php echo esc_url( admin_url( 'customize.php?easychic-theme-options' ) ); ?>"
			style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;">
			<?php esc_html_e( 'Customize', 'easychic' ); ?>
		</a>

	</div>

	<div class="content">
		<h2 class="admin-sub-title"><?php esc_html_e( 'Review the Easychic Theme', 'easychic' ); ?></h2>
		<p><?php esc_html_e( 'Thank you for using the Easychic theme!', 'easychic' ); ?></p>
		<p><?php esc_html_e( 'We would love to hear your feedback on the Easychic theme. Please take a moment to leave a review.', 'easychic' ); ?>
		</p>
		<a href="https://wordpress.org/support/theme/easychic/reviews/" target="_blank"
			style="display: inline-block; margin: 1rem 0; padding: 10px 20px; background-color: #0073aa; color: #fff; text-decoration: none; border-radius: 5px; text-align: center;">
			<?php esc_html_e( 'Leave a Review', 'easychic' ); ?>
		</a>
	</div>

	<div class="content">
		<h2 class="admin-sub-title"><?php esc_html_e( 'Theme Support', 'easychic' ); ?></h2>
		<p><?php esc_html_e( 'Free support for the Easychic theme is provided on the WordPress.org support forum.', 'easychic' ); ?></p>
		<a class="easychic-button" href="https://wordpress.org/support/theme/easychic/" target="_blank" rel="noopener noreferrer">
			<?php esc_html_e( 'Support Forum', 'easychic' ); ?>
			<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'easychic' ); ?></span>
		</a>
		<p><?php esc_html_e( 'Paid customization and paid email support are also available. For details, please contact 369Theme.', 'easychic' ); ?></p>
		<div class="easychic-support-links">
			<a class="easychic-button" href="https://369theme.com/order" target="_blank" rel="noopener noreferrer">
				<?php esc_html_e( 'Request Customization', 'easychic' ); ?>
				<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'easychic' ); ?></span>
			</a>
			<a class="easychic-button" href="https://369theme.com/contact?product=easychic" target="_blank" rel="noopener noreferrer">
				<?php esc_html_e( 'Contact 369Theme', 'easychic' ); ?>
				<span class="screen-reader-text"><?php esc_html_e( '(opens in a new tab)', 'easychic' ); ?></span>
			</a>
		</div>
	</div>

</div>
	<?php
}

/**
 * Title tag separator.
 */
function easychic_title_separator() {
	return '|';
}
add_filter( 'document_title_separator', 'easychic_title_separator' );

/**
 * Determine the layout within the template.
 */
function easychic_get_current_layout() {
	return get_theme_mod( 'easychic_page_layout', 'two-columns' );
}

/**
 * Check if the sidebar is enabled for the current template.
 */
function easychic_is_sidebar_enabled() {
	if ( is_front_page() ) {
		return false;
	}

	$layout = easychic_get_current_layout();
	return 'one-column-none' !== $layout;
}