<?php
/**
 * bwmphoto functions and definitions
 *
 * @author Baliwebmaker
 * @package bwmphoto
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

defined( 'BWM_PHOTO_VERSION' ) || define( 'BWM_PHOTO_VERSION', '1.1.3' );
defined( 'BWM_PHOTO_DIR' ) || define( 'BWM_PHOTO_DIR', trailingslashit( get_template_directory() ) );
defined( 'BWM_PHOTO_URI' ) || define( 'BWM_PHOTO_URI', trailingslashit( get_template_directory_uri() ) );

require get_parent_theme_file_path( 'inc/autoload.php' );

require get_parent_theme_file_path( 'inc/wptt-webfont-loader.php' );

bwmphoto\Init::instance();
