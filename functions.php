<?php

/**
 * Neko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Neko
 */

if (!defined('NEKO_VERSION')) {
	// Replace the version number of the theme on each release.
	define('NEKO_VERSION', '1.0.0');
}

if (!function_exists('neko_setup')) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function neko_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Neko, use a find and replace
		 * to change 'neko' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('neko', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary-menu' => esc_html__('Primary', 'neko'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'neko_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
}
add_action('after_setup_theme', 'neko_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function neko_content_width()
{
	$GLOBALS['content_width'] = apply_filters('neko_content_width', 640);
}
add_action('after_setup_theme', 'neko_content_width', 0);

/**
 * Enqueue scripts and styles.
 */
function neko_scripts()
{
	// Remove dashicons in frontend for unauthenticated users.
	if (!is_user_logged_in()) {
		wp_deregister_style('dashicons');
	}
	// Remove the block library CSS
	wp_deregister_style('wp-block-library');
	wp_deregister_script('wp-embed');

	wp_enqueue_style('neko-style', get_stylesheet_uri(), array(), NEKO_VERSION);
}
add_action('wp_enqueue_scripts', 'neko_scripts');

function neko_umami_analytics()
{
	$umami_url     = 'https://umami.jakobbouchard.dev/umami.js';
	$umami_id      = '51fa3a05-a31c-4c89-bbc8-d219cb47294b';
	$umami_domains = 'jakobbouchard.dev';

	echo '<!-- Umami ??? own your website analytics -->';
	echo '<script async defer
	              src="' . $umami_url . '"
	              data-website-id="' . $umami_id . '"
	              data-domains="' . $umami_domains . '"
	              data-do-not-track="true"
	      ></script>';
}
add_action('wp_head', 'neko_umami_analytics');

function neko_schemas()
{
	ob_start(); ?>

	<script type="application/ld+json">
		{
			"@context": "http://schema.org",
			"@type": "BlogPosting",
			"image": "http://example.com/images/image.jpg",
			"url": "http://example.com/blog/post",
			"headline": "Title",
			"datePublished": "2019-02-11T11:11:11",
			"dateModified": "2019-02-11T11:11:11",
			"inLanguage": "en-CA",
			"author": {
				"@type": "Person",
				"name": "Jakob Bouchard",
				"url": "https://jakobbouchard.dev"
			},
			"mainEntityOfPage": "True",
			"keywords": [
				"keyword1",
				"keyword2",
				"keyword3",
				"keyword4"
			],
			"genre": ["Tag1", "Tag2"],
			"articleSection": "Main category",
			"articleBody": "Paste the body of your content in here in plaintext"
		}
	</script>

<?php echo ob_get_clean();
	ob_flush();
}
//add_action('wp_head', 'neko_schemas');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/**
 * Remove archive labels.
 */
function neko_archive_title($title)
{
	if (is_category()) {
		$title = single_cat_title('', false);
	} elseif (is_tag()) {
		$title = single_tag_title('', false);
	} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
	} elseif (is_tax()) {
		$title = single_term_title('', false);
	} elseif (is_home()) {
		$title = single_post_title('', false);
	}
	return $title;
}
add_filter('get_the_archive_title', 'neko_archive_title');

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
