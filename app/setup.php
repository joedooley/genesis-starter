<?php

namespace DevDesigns\GenesisStarter;



/**
 * Enqueue Scripts and Styles.
 *
 * @since  1.0.0
 */
add_action( 'wp_enqueue_scripts', function (): void {
	wp_enqueue_style(
		'genesis-starter/sample-fonts',
		'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,700',
		[],
		CHILD_THEME_VERSION
	);

	wp_enqueue_style( 'dashicons' );

	wp_register_script(
		'genesis-starter/backstretch.js',
		CHILD_THEME_SCRIPTS_DIR . 'vendor/jquery.backstretch.min.js',
		[ 'jquery' ],
		'2.1.17',
		true
	);

	wp_enqueue_script(
		'genesis-starter/responsive-menus.js',
		CHILD_THEME_SCRIPTS_DIR . 'vendor/responsive-menus.js',
		[ 'jquery' ],
		'1.1.3',
		true
	);

	wp_localize_script(
		'genesis-starter/responsive-menus.js',
		'genesis_responsive_menu',
		responsiveMenuConfig()
	);

	wp_enqueue_script(
		'genesis-starter/main.js',
		CHILD_THEME_SCRIPTS_DIR . 'main.js',
		[ 'jquery' ],
		CHILD_THEME_VERSION,
		true
	);
}, 999999 );


/**
 * Set Localization (do not remove).
 *
 * @since  1.0.0
 */
add_action( 'after_setup_theme', function (): void {
	load_child_theme_textdomain(
		'genesis-starter',
		get_stylesheet_directory() . '/languages'
	);
} );


/**
 * Child theme setup.
 *
 * @since  1.0.0
 */
add_action( 'genesis_setup', function (): void {
	rootsSoilConfig();
	addThemeSupports();
	genesisUnregister();
	genesisRemoveSeo();
	addImageSizes();
}, 100 );
