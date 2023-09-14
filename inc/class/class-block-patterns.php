<?php
/**
 * Block Pattern Class
 *
 * @author Baliwebmaker
 * @package bwmphoto
 * @since 1.0.0
 */

namespace bwmphoto;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use WP_Block_Pattern_Categories_Registry;

/**
 * Block Pattern Class
 *
 * @package bwmphoto
 */
class Block_Patterns {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->register_block_patterns();
	}

	/**
	 * Register Block Patterns
	 */
	private function register_block_patterns() {
		$block_pattern_categories = array(
			'bwmphoto-basic' => array( 'label' => __( 'bwmphoto Basic Patterns', 'bwmphoto' ) ),
		);

		$block_pattern_categories = apply_filters( 'bwmphoto_block_pattern_categories', $block_pattern_categories );

		foreach ( $block_pattern_categories as $name => $properties ) {
			if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
				register_block_pattern_category( $name, $properties );
			}
		}

		$block_patterns = array(
			'404',
			'post-title',
			'section-1-hero',
			'section-2-gallery',
			'section-3-hero',
			'section-4-gallery',
			'feature',
			'team',
			'testimonial',
			'footer',
			'hero-title-archive',
			'hero-title-index',
			'hero-title-search',
		);

		

		$block_patterns = apply_filters( 'bwmphoto_block_patterns', $block_patterns );

		if ( function_exists( 'register_block_pattern' ) ) {
			foreach ( $block_patterns as $block_pattern ) {
				$pattern_file = get_theme_file_path( '/patterns/' . $block_pattern . '.php' );

				register_block_pattern(
					'bwmphoto/' . $block_pattern,
					require $pattern_file
				);
			}
		}
	}
}
