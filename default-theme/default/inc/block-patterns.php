<?php
/**
 * Dr Chrono: Block Patterns
 *
 */

/**
 * Registers block patterns and categories.
 *
 */
function drchrono_register_block_patterns() {
	$block_pattern_categories = array(
		'featured' => array( 'label' => __( 'Featured', 'drchrono' ) ),
		'footer'   => array( 'label' => __( 'Footers', 'drchrono' ) ),
		'header'   => array( 'label' => __( 'Headers', 'drchrono' ) ),
		'query'    => array( 'label' => __( 'Query', 'drchrono' ) ),
		'pages'    => array( 'label' => __( 'Pages', 'drchrono' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 */
	$block_pattern_categories = apply_filters( 'drchrono_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'footer-default',
		'header-default',
		'page-layout-image-and-text',
		'page-layout-image-text-and-video',
		'page-layout-two-columns',
		'query-default',
	);

	/**
	 * Filters the theme block patterns.
	 *
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'drchrono_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'drchrono/' . $block_pattern,
			require $pattern_file
		);
	}
}
add_action( 'init', 'drchrono_register_block_patterns', 9 );
