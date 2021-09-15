<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Neko
 */

?>

	<footer>
		<div class="info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'neko' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'neko' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'neko' ), 'Neko', '<a href="https://jakobbouchard.dev/">Jakob Bouchard</a>' );
				?>
		</div><!-- .info -->
	</footer>

<?php wp_footer(); ?>

</body>
</html>
