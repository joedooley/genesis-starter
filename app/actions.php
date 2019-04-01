<?php

namespace DevDesigns\GenesisStarter;


/**
 * Repositions primary navigation menu.
 *
 * @since 1.0.0
 */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );


/**
 * Reposition the secondary navigation menu.
 *
 * @since 1.0.0
 */
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 10 );


/**
 * Displays custom logo.
 *
 * @since 1.0.0
 */
add_action( 'genesis_site_title', 'the_custom_logo', 0 );


/**
 * Removes output of unused admin settings metaboxes.
 *
 * @since 2.6.0
 *
 * @param string $_genesis_admin_settings The admin screen to remove meta boxes from.
 */
add_action( 'genesis_theme_settings_metaboxes', function ( $_genesis_admin_settings ) {
	remove_meta_box( 'genesis-theme-settings-header', $_genesis_admin_settings, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav', $_genesis_admin_settings, 'main' );
} );


