<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<?php if ( ! is_front_page() ) : ?>
		<header>
			<?php the_title( '<h1>', '</h1>' ); ?>
		</header>
		<?php endif; ?>

		<?php neko_post_thumbnail(); ?>

		<div class="flow">
			<?php
			the_content();
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'neko' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
