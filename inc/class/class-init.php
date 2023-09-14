<?php
/**
 * Init Configuration
 *
 * @author Baliwebmaker
 * @package bwmphoto
 * @since 1.0.0
 */

namespace bwmphoto;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use bwmphoto\Block_Patterns;
use bwmphoto\Block_Styles; 

/**
 * Init Class
 *
 * @package bwmphoto
 */
class Init {

	/**
	 * Instance variable
	 *
	 * @var $instance
	 */
	private static $instance;

	/**
	 * Class instance.
	 *
	 * @return Init
	 */
	public static function instance() {
		if ( null === static::$instance ) {
			static::$instance = new static();
		}

		return static::$instance;
	}

	/**
	 * Class constructor.
	 */
	private function __construct() {
		$this->load_hooks();
		 
	}

	/**
	 * Load initial hooks.
	 */
	private function load_hooks() {
		// actions.
		add_action( 'init', array( $this, 'add_theme_templates' ) );
		add_action( 'after_setup_theme', array( $this, 'theme_setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) ); 
		add_action( 'init', array( $this, 'register_block_patterns' ), 9 );
		add_action( 'init', array( $this, 'register_block_styles' ), 9 );

		// filters.
		add_filter( 'excerpt_length', array( $this, 'excerpt_length' ) );
		add_filter( 'excerpt_more', array( $this, 'excerpt_elipsis' ) ); 
	}

	 
	
	/**
	 * Register Block Pattern.
	 */
	public function register_block_patterns() {
		new Block_Patterns();
	}

	/**
	 * Register Block Style.
	 */
	public function register_block_styles() {
		new Block_Styles();
	}

	 

	/**
	 * Excerpt Elipsis.
	 *
	 * @param string $more .
	 *
	 * @return string
	 */
	public function excerpt_elipsis( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '';
	}

	/**
	 * Excerpt Length.
	 *
	 * @param int $length .
	 *
	 * @return int
	 */
	public function excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return 100;
	}


	/**
	 * Add theme template
	 */
	public function add_theme_templates() {
		add_editor_style( 'block-style.css' );
	}

	/**
	 * Theme setup.
	 */
	public function theme_setup() {

		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'editor-styles' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'bwmphoto' ),
			)
		);


		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );
	}


	/**
	 * Enqueue scripts and styles.
	 */
public function enqueue_scripts() {
		wp_enqueue_style( 'bwmphoto-style', get_stylesheet_uri(), array(), BWM_PHOTO_VERSION );
		wp_add_inline_style( 'bwmphoto-style', $this->load_font_styles() );

			wp_enqueue_style(
		'blwbmkr-shared-styles',
		get_theme_file_uri( 'assets/css/min/style-shared.min.css' ),
		[],
		BWM_PHOTO_VERSION
	);
		// enqueue core animation.
		wp_enqueue_script( 'bwmphoto-animate', BWM_PHOTO_URI . '/assets/js/index.js', array(), BWM_PHOTO_VERSION, true );
		

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		/*
	 * Load additional block styles.
	 */
	$styled_blocks = [
		'animation',
		'core-add',
	];

	foreach ( $styled_blocks as $block_name ) {
		$args = array(
			'handle' => "blwbmkr-$block_name",
			'src'    => get_theme_file_uri( "assets/css/min/blocks/$block_name.min.css" ),
			'path'   => get_theme_file_path( "assets/css/min/blocks/$block_name.min.css" ),
		);
		wp_enqueue_block_style( "core/$block_name", $args );
	}

	/**
	 * Gutenberg 13.0 broke the loading of CSS in the Site Editor,
	 * this is a temporary(?) workaround.
	 */
	if ( function_exists( 'gutenberg_pre_init' ) ) {
		foreach ( $styled_blocks as $block_name ) {
			add_editor_style( "assets/css/min/blocks/$block_name.min.css" );
		}
	}

}


	/**
	 * Register static data to be used in theme's js file
	 */
	public function theme_config() {
		return array(
			'demo'    => esc_url( 'https:/gutenverse.com/demo?name=bwmphoto' ),
			'pages'   => array(
				'home'     => BWM_PHOTO_URI . '/assets/img/page-home.webp',
				'about'    => BWM_PHOTO_URI . '/assets/img/page-about.webp',
				'services' => BWM_PHOTO_URI . '/assets/img/page-services.webp',
				'contact'  => BWM_PHOTO_URI . '/assets/img/page-contact.webp',
				'port'     => BWM_PHOTO_URI . '/assets/img/page-single-portfolio.webp',
			),
			'domain'  => 'bwmphoto',
		);
	}

	/**
	 * Load Font Styles
	 */
	public function load_font_styles() {
		$font_families = array(
			'Prata:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600',
			'Heebo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600',
		);

		$fonts_url = add_query_arg(
			array(
				'family'  => implode( '&family=', $font_families ),
				'display' => 'swap',
			),
			'https://fonts.googleapis.com/css2'
		);

		$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ), 'woff' );

		return "@import url({$contents});";
	}

	/**
	 * Load Editor Styles
	 */
	public function load_editor_styles() {
		wp_add_inline_style( 'wp-block-library', $this->load_font_styles() );
	}

	//DROP DOWN SUBMENU IN MOBILE
	public function add_nav_top_mobile( $content, array $block ) {
  if ( ! has_classname( 'is-nav-top-mobile', $block )  ) {
    return $content;
  }
    $script = "<script>
    const items = document.querySelectorAll('.is-nav-top-mobile button');
    items[0].addEventListener('click', e => {
    e.target.nextElementSibling.style.display = 'block';
    })

    function openWoi(e){
        if (e.style.maxHeight){
                  e.style.maxHeight = null;
                } else {
                  e.style.maxHeight = e.scrollHeight + 'px';
        } 
    }

    var coll = document.getElementsByClassName('wp-block-navigation-submenu__toggle');

    var i;
    for (i = 0; i < coll.length; i++) {


    coll[i].previousElementSibling.addEventListener('click', function()  { 
        this.nextElementSibling.classList.toggle('active');
        openWoi(this.nextElementSibling.nextElementSibling);
        }
    )

    coll[i].addEventListener('click', function() { 
        this.classList.toggle('active');
        openWoi(this.nextElementSibling);
      });
    }
    </script>";

    add_action( 'wp_footer', function() use($script) { echo $script; } , 100);

    return $content;
}
add_filter( 'render_block', 'add_nav_top_mobile', 10, 2 );

	public function has_classname( string $classname, array $block ):  bool {
	  if ( empty( $block['attrs'] ) ) {
	    return false;
	  }
	  $block = $block['attrs'];
	  if ( empty( $block['className'] ) ) {
	    return false;
	  }
	  $classes = explode( ' ', $block['className'] );
	  return in_array( $classname, $classes, true );
	}

}
