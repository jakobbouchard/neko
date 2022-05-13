<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neko
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container">
		<?php
		if (is_singular()) :
		?>
			<header>
				<?php the_title('<h1>', '</h1>');
				if ('post' === get_post_type()) :
				?>
					<div class="entry-meta">
						<?php neko_posted_on(); ?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header>

			<?php neko_post_thumbnail(); ?>

			<div class="flow">
				<?php
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'neko'),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post(get_the_title())
					)
				);
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'neko'),
						'after'  => '</div>',
					)
				);
				?>
			</div>

			<footer>
				<?php neko_entry_footer(); ?>
			</footer>

		<?php
		else :
		?>
			<header>
				<?php the_title('<h2><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
			</header>


			<?php if ('project' === get_post_type()) : ?>
				<?php neko_post_thumbnail(); ?>
			<?php else : ?>
				<div class="flow">
					<?php the_excerpt(); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
