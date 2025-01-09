<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package EasyChic
 */
?>

<?php
get_header(); ?>

<div id="content" class="site-content">
    <main id="main" class="site-main" role="main">
        <div class="container">
            <section class="content-area">
                <?php if (have_posts()) : ?>
                    <?php
                    $total_results = $wp_query->found_posts;
                    ?>
                    <div class="page-header">
                        <h1 class="page-title">
                            <?php printf(esc_html__('Search Results for: %s (%s count)', 'easychic'), '<span>' . get_search_query() . '</span>', $total_results); ?>
                        </h1>
                    </div><!-- .page-header -->

                <?php
                    // Start the loop.
                    while (have_posts()) :
                        the_post();
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part('template-parts/content', 'search');

                    // End the loop.
                    endwhile;

                    // Previous/next page navigation.
                    the_posts_navigation();

                // If no content, include the "No posts found" template.
                else :
                    get_template_part('template-parts/content', 'none');

                endif;
                ?>
            </section>
        </div> <!-- .container -->
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>