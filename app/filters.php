<?php

namespace DevDesigns\GenesisStarter;



/**
 * Removes output of primary navigation right extras.
 *
 * @since 1.0.0
 */
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10 );


/**
 * Removes the link from the hidden site title if a custom logo is in use.
 *
 * Without this filter, the site title is hidden with CSS when a custom logo
 * is in use, but the link it contains is still accessible by keyboard.
 *
 * @since 1.0.0
 *
 * @param string $title  The full title.
 * @param string $inside The content inside the title element.
 * @param string $wrap   The wrapping element name, such as h1.
 */
add_filter( 'genesis_seo_title', function ( $title, $inside, $wrap ): string {
	if ( has_custom_logo() ) {
		$inside = get_bloginfo( 'name' );
	}

	return sprintf( '<%1$s class="site-title">%2$s</%1$s>', $wrap, $inside );
}, 10, 3 );


/**
 * Removes output of header and front page breadcrumb settings in the Customizer.
 *
 * @since 1.0.0
 *
 * @param array $config Original Customizer items.
 */
add_filter( 'genesis_customizer_theme_settings_config', function ( $config ): array {
	unset( $config['genesis']['sections']['genesis_header'], $config['genesis']['sections']['genesis_breadcrumbs']['controls']['breadcrumb_front_page'] );

	return $config;
} );


/**
 * Reduces secondary navigation menu to one level depth.
 *
 * @since 1.0.0
 *
 * @param array $args Original menu options.
 */
add_filter( 'wp_nav_menu_args', function ( $args ): array {
	if ( 'secondary' !== $args['theme_location'] ) {
		return $args;
	}
	$args['depth'] = 1;

	return $args;
} );


/**
 * Modifies size of the Gravatar in the author box.
 *
 * @since 1.0.0
 *
 * @param int $size Original icon size.
 */
add_filter( 'genesis_author_box_gravatar_size', function ( $size ): int {
	return 90;
} );


/**
 * Modifies size of the Gravatar in the entry comments.
 *
 * @since 2.2.3
 *
 * @param array $args Gravatar settings.
 */
add_filter( 'genesis_comment_list_args', function ( $args ): array {
	$args['avatar_size'] = 60;

	return $args;
} );
