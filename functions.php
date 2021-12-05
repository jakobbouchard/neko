<?php
/**
 * Neko functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Neko
 * @since Neko 1.0.0
 */


if ( ! defined( 'NEKO_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'NEKO_VERSION', '1.0.0' );
}

if ( ! function_exists( 'neko_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Neko 2.0.0
	 *
	 * @return void
	 */
	function neko_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'neko_support' );

if ( ! function_exists( 'neko_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Neko 1.0.0
	 *
	 * @return void
	 */
	function neko_styles() {

		// Remove dashicons in frontend for unauthenticated users.
		if ( ! is_user_logged_in() ) {
			wp_deregister_style( 'dashicons' );
		}

		// Register theme stylesheet.
		wp_register_style(
			'neko-style',
			get_template_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Add styles inline.
		wp_add_inline_style( 'neko-style', neko_get_font_face_styles() );

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'neko-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'neko_styles' );

if ( ! function_exists( 'neko_umami_analytics' ) ) :

	/**
	 * Adds umami analytics script.
	 *
	 * @since Neko 1.0.0
	 *
	 * @return void
	 */
	function neko_umami_analytics() {
		?>
		<!-- Umami – own your website analytics -->
		<script async defer
		        src="https://umami.jakobbouchard.dev/umami.js"
		        data-website-id="51fa3a05-a31c-4c89-bbc8-d219cb47294b"
		        data-domains="jakobbouchard.dev"
		        data-do-not-track="true"
		></script>
		<?php
	}

endif;

add_action( 'wp_head', 'neko_umami_analytics' );

// Is this still needed?
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

if ( ! function_exists( 'neko_editor_styles' ) ) :

	/**
	 * Enqueue editor styles.
	 *
	 * @since Neko 1.0.0
	 *
	 * @return void
	 */
	function neko_editor_styles() {

		// Add styles inline.
		wp_add_inline_style( 'wp-block-library', neko_get_font_face_styles() );

	}

endif;

add_action( 'admin_init', 'neko_editor_styles' );


if ( ! function_exists( 'neko_get_font_face_styles' ) ) :

	/**
	 * Get font face styles.
	 * Called by functions neko_styles() and neko_editor_styles() above.
	 *
	 * @since Neko 2.0.0
	 *
	 * @return string
	 */
	function neko_get_font_face_styles() {

		return "
		@font-face {
			font-family: 'Atkinson';
			font-weight: 400;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF2/Atkinson-Hyperlegible-Regular-102a.woff2' ) . "')
					format('woff2'),
				url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF/Atkinson-Hyperlegible-Regular-102a.woff' ) . "')
					format('woff');
		}

		@font-face {
			font-family: 'Atkinson';
			font-weight: 400;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF2/Atkinson-Hyperlegible-Italic-102a.woff2' ) . "')
					format('woff2'),
				url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF/Atkinson-Hyperlegible-Italic-102a.woff' ) . "')
					format('woff');
		}

		@font-face {
			font-family: 'Atkinson';
			font-weight: 700;
			font-style: normal;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF2/Atkinson-Hyperlegible-Bold-102a.woff2' ) . "')
					format('woff2'),
				url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF/Atkinson-Hyperlegible-Bold-102a.woff' ) . "')
					format('woff');
		}

		@font-face {
			font-family: 'Atkinson';
			font-weight: 700;
			font-style: italic;
			font-stretch: normal;
			font-display: swap;
			src: url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF2/Atkinson-Hyperlegible-BoldItalic-102a.woff2' ) . "')
					format('woff2'),
				url('" . get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF/Atkinson-Hyperlegible-BoldItalic-102a.woff' ) . "')
					format('woff');
		}
		";

	}

endif;

if ( ! function_exists( 'neko_preload_webfonts' ) ) :

	/**
	 * Preloads the main web font to improve performance.
	 *
	 * Only the main web font (font-style: normal) is preloaded here since that font is always relevant (e.g. it used
	 * on every heading). The other font is only needed if there is any applicable content in italic style, and
	 * therefore preloading it would in most cases regress performance when that font would otherwise not be loaded at
	 * all.
	 *
	 * @since Neko 2.0.0
	 *
	 * @return void
	 */
	function neko_preload_webfonts() {
		?>
		<link rel="preload" href="<?php echo esc_url( get_theme_file_uri( 'assets/fonts/fonts/Atkinson_Hyperlegible/WOFF2/Atkinson-Hyperlegible-Regular-102a.woff2' ) ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	}

endif;

add_action( 'wp_head', 'neko_preload_webfonts' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';
