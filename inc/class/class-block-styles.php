<?php
/**
 * Block Style Class
 *
 * @author Jegstudio
 * @package bwmphoto
 * @since 1.0.0
 */

namespace bwmphoto;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Init Class
 *
 * @package bwmphoto
 */
class Block_Styles {
	/**
	 * Class constructor.
	 */
	public function __construct() {
		$this->register_block_styles();
	}

	/**
	 * Register Block Patterns
	 */
	private function register_block_styles() {
		register_block_style(
			'core/button',
			array(
				'name'  => 'custombuttonfill',
				'label' => __( 'Button Fill Hover White', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'  => 'custombuttonfill2',
				'label' => __( 'Button Fill Hover Black', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/button',
			array(
				'name'  => 'custombuttonfill3',
				'label' => __( 'Button White Hover Black', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/columns',
			array(
				'name'  => 'customboxshadow',
				'label' => __( 'Box Shadow', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/column',
			array(
				'name'  => 'customboxshadow',
				'label' => __( 'Box Shadow', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'  => 'customboxshadow',
				'label' => __( 'Box Shadow', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/columns',
			array(
				'name'  => 'customboxshadowhover',
				'label' => __( 'Box Shadow on Hover', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/column',
			array(
				'name'  => 'customboxshadowhover',
				'label' => __( 'Box Shadow on Hover', 'bwmphoto' ),
			)
		);

		register_block_style(
			'core/group',
			array(
				'name'  => 'customboxshadowhover',
				'label' => __( 'Box Shadow on Hover', 'bwmphoto' ),
			)
		);
	}
}
