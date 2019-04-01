<?php

/**
 * Require composer autoloader.
 *
 * @since 1.0.0
 */
require_once __DIR__ . '/vendor/autoload.php';


/**
 * Start the engine.
 *
 * @since 1.0.0
 */
include_once get_template_directory() . '/lib/init.php';


/**
 * Setup child theme constants.
 *
 * @since 1.0.0
 */
define( 'CHILD_THEME_NAME', wp_get_theme()->get( 'Name' ) );
define( 'CHILD_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'CHILD_THEME_SCRIPTS_DIR', get_stylesheet_directory_uri() . '/dist/scripts/' );
define( 'CHILD_THEME_STYLES_DIR', get_stylesheet_directory_uri() . '/dist/styles/' );
define( 'CHILD_THEME_IMAGES_DIR', get_stylesheet_directory_uri() . '/dist/images/' );
