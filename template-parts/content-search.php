<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<header>
			<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php neko_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header>

		<?php neko_post_thumbnail(); ?>

		<div class="flow">
			<?php the_excerpt(); ?>
		</div>

		<footer>
			<?php neko_entry_footer(); ?>
		</footer>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
