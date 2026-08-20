<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package EasyChic
 */

?>

<?php get_header(); ?>

<div id="content" class="site-content">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<?php easychic_breadcrumb(); ?>
			<section class="content-area">
				<?php if ( have_posts() ) : ?>
					<?php
					global $wp_query;
					$total_results = $wp_query->found_posts;
					?>
				<div class="page-header">
					<h1 class="page-title">
						<?php
							printf(
								/* translators: 1: Search query, 2: Number of results */
								esc_html__( 'Search Results for: %1$s (%2$s count)', 'easychic' ),
								'<span>' . esc_html( get_search_query() ) . '</span>',
								absint( $total_results )
							);
						?>
					</h1>
				</div><!-- .page-header -->

					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content' );
					endwhile;

					the_posts_navigation();

				else :
					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</section>
		</div>
	</main>
	<?php get_sidebar(); ?>
</div><!-- #content -->

<?php get_footer(); ?>