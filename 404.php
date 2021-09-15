<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Neko
 */

get_header();
?>

	<main id="content">
		<header>
			<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'neko' ); ?></h1>
		</header>

		<div class="page-content">
			<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'neko' ); ?></p>
		</div><!-- .page-content -->
	</main><!-- #content -->

<?php
get_footer();
