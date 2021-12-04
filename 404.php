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
			<div class="container">
				<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'neko' ); ?></h1>
			</div>
		</header>

		<div class="page-content">
			<div class="container">
				<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'neko' ); ?></p>
			</div>
		</div><!-- .page-content -->
	</main><!-- #content -->

<?php
get_footer();
