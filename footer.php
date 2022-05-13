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

<footer class="site-footer">
	<div class="container flow">
		<div class="info">
			<a href="<?php the_permalink(get_page_by_path('privacy')); ?>"><?php _e('Privacy', 'neko'); ?></a>
			<span class="sep"> | </span>
			<a href="/feed"><?php _e('RSS Feed', 'neko'); ?></a>
		</div><!-- .info -->
		<div class="kb-club">
			<a target="blank" href="https://512kb.club"><span class="kb-club-no-bg">512KB Club</span><span class="kb-club-bg">Green Team</span></a>
		</div><!-- .kb-club -->
	</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
