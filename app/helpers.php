<?php

namespace DevDesigns\GenesisStarter;

use Roots\Soil\Options;



/**
 * Enable features from Soil when plugin is activated
 *
 * @since  1.0.0
 *
 * @link https://roots.io/plugins/soil
 */
function rootsSoilConfig (): void {
	if ( class_exists( Options::class ) ) {
		add_theme_support( 'soil-clean-up' );
		add_theme_support( 'soil-disable-asset-versioning' );
		add_theme_support( 'soil-disable-trackbacks' );
		add_theme_support( 'soil-nav-walker' );
		add_theme_support( 'soil-nice-search' );
		add_theme_support( 'soil-relative-urls' );
		// add_theme_support( 'soil-jquery-cdn' );
		// add_theme_support( 'soil-disable-rest-api' );
		// add_theme_support( 'soil-js-to-footer' );
		// add_theme_support( 'soil-google-analytics', 'UA-XXXXX-Y' );
	}
}


/**
 * Defines responsive menu settings.
 *
 * @since 1.0.0
 */
function responsiveMenuConfig (): array {
	return [
		'mainMenu'         => __( 'Menu', 'genesis-starter' ),
		'menuIconClass'    => 'dashicons-before dashicons-menu',
		'subMenu'          => __( 'Submenu', 'genesis-starter' ),
		'subMenuIconClass' => 'dashicons-before dashicons-arrow-down-alt2',
		'menuClasses'      => [
			'combine' => [ '.nav-primary' ],
			'others'  => [],
		],
	];
}


function addImageSizes (): void {
	add_image_size( 'hero-image', 1280, 720, true );
}


function genesisUnregister(): void {
	unregister_sidebar( 'header-right' );
	unregister_sidebar( 'sidebar-alt' );

	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );
}


/**
 * Remove Genesis SEO theme settings in favor of Yoast SEO.
 *
 * @since 1.0.0
 */
function genesisRemoveSeo(): void {
	remove_theme_support( 'genesis-seo-settings-menu' );
	remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
	remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
}


function addThemeSupports (): void {
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'genesis-after-entry-widget-area' );
	add_theme_support( 'genesis-footer-widgets', 3 );
	add_theme_support( 'genesis-menus', [ 'primary'   => __( 'Header Menu', 'mn-grown' ), 'secondary' => __( 'Footer Menu', 'mn-grown' )] );
	add_theme_support( 'html5', [ 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ] );
	add_theme_support( 'genesis-accessibility', [ '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ] );
	add_theme_support( 'custom-logo', ['height' => 120, 'width' => 700, 'flex-height' => true, 'flex-width' => true, ]);
	add_theme_support( 'genesis-structural-wraps', ['header', 'menu-primary', 'menu-secondary', 'site-inner', 'footer-widgets', 'footer', ] );
}
