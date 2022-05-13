<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Neko
 */

get_header();
?>

<main id="content" class="flow">

	<?php if (have_posts()) : ?>

		<header>
			<div class="container">
				<h1>
					<?php
					/* translators: %s: search query. */
					printf(esc_html__('Search Results for: %s', 'neko'), '<span>' . get_search_query() . '</span>');
					?>
				</h1>
			</div>
		</header><!-- .page-header -->

	<?php
		/* Start the Loop */
		while (have_posts()) :
			the_post();

			/**
			 * Run the loop for the search to output the results.
			 * If you want to overload this in a child theme then include a file
			 * called content-search.php and that will be used instead.
			 */
			get_template_part('template-parts/content', 'search');

		endwhile;

		the_posts_navigation();

	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main><!-- #content -->

<?php
get_footer();
