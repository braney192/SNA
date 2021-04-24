<?php
/**
 * Add required and recommended plugins.
 *
 * @package thefour-lite
 */

add_action( 'tgmpa_register', 'thefour_lite_register_required_plugins' );

/**
 * Register required plugins
 *
 * @since  1.0
 */
function thefour_lite_register_required_plugins() {
	$plugins = thefour_lite_required_plugins();

	$config = array(
		'id'          => 'thefour-lite',
		'has_notices' => false,
	);

	tgmpa( $plugins, $config );
}

/**
 * List of required plugins
 */
function thefour_lite_required_plugins() {
	return array(
		array(
			'name'     => esc_html__( 'Jetpack', 'thefour-lite' ),
			'slug'     => 'jetpack',
		),
		array(
			'name' => esc_html__( 'Slim SEO', 'thefour-lite' ),
			'slug' => 'slim-seo',
		)
	);
}
