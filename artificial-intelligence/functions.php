<?php

/**
 * Artificial Intelligence
 *
 * @author Ryan Duchene <duchenerc@gmail.com>
 * @license GPLv2
 *
 * @package Artifical Intelligence
 * @version 1.2.4
 *
 * @since v1.0 First introduced.
 *
 **/
class Artificial_Intelligence
{
	/**
	 * Verison.
	 *
	 * @var string
	 **/
	public static $version = '1.2.4';
	
	/**
	 * Template directory, root-relative.
	 * Used for including PHP source.
	 *
	 * @since v1.1.1 Added to work with PHP source.
	 * @var string
	 **/
	public static $dir;
	
	/**
	 * Template directory, absolute.
	 * Used for including assets.
	 *
	 * @since v1.0 First release.
	 * @var string
	 **/
	public static $dir_abs;
	
	/**
	 * Skin slug.
	 *
	 * @var string
	 **/
	public static $skin;
	
	
	/**
	 * Initializes theme, sets hooks
	 *
	 * @since v1.0
	 **/
	public static function init()
	{
		
		// Set directories.
		//
		self::$dir =     get_template_directory();
		self::$dir_abs = get_template_directory_uri();
		
		// Get current theme.
		//
		$skin = get_theme_mod( 'ai_theme' );
		
		// If theme is not set, default to lightning.
		//
		if ( empty( $skin ) )
			$skin = 'lightning';
		
		// Set theme
		//
		self::$skin = $skin;
		
		// Set up theme.
		//
		add_action( 'after_setup_theme', array(
			__CLASS__, 'setup'
		));
		
		// Enqueue assets.
		//
		add_action( 'wp_enqueue_scripts', array(
			__CLASS__, 'assets'
		));
		
		// Register menus.
		//
		add_action( 'init', array(
			__CLASS__, 'menus'
		));
		
		// Register sidebars.
		//
		add_action( 'widgets_init', array(
			__CLASS__, 'widgets'
		));
		
		// Register custom post types.
		//
		add_action( 'init', array(
			__CLASS__, 'post_types'
		));
		
		// Register customizer options.
		//
		add_action( 'customize_register', array(
			__CLASS__, 'customizer'
		));
		
		
		// Tweak excerpt length.
		//
		add_filter( 'excerpt_length', array(
			__CLASS__, 'excerpt'
		), 999 );
		
	}
	
	/**
	 * Artificial_Intelligence::setup()
	 * Declares theme features.
	 *
	 * @since v1.0
	 **/
	public static function setup()
	{
		
		// HTML5 support
		//
		add_theme_support( 'html5', array(
			'comment-list', 'comment-form', 'search-form', 'gallery', 'caption',
		));
		
		// Custom background
		//
		add_theme_support( 'custom-background', array(
			'default-color'      => '#000',
			'default-image'      => self::$dir_abs . '/images/bolts.jpg',
			'default-attachment' => 'fixed',
			'default-position-x' => 'center',
			'default-repeat'     => 'no-repeat',
		));
		
		// Post thumbnails
		//
		add_theme_support( 'post-thumbnails' );
		
		// Post formats
		//
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'status', 'quote', 'link',
		));
		
		// Automatic RSS
		//
		add_theme_support( 'automatic-feed-links' );
		
		// Pages don't have excerpts by default, so we'll add them.
		//
		add_post_type_support( 'page', 'excerpt' );
		
	}
	
	/**
	 * Artificial_Intelligence::assets()
	 * Injects theme assets into template header and footer.
	 *
	 * @since v1.0
	 **/
	public static function assets()
	{
		
		// Frontend styles
		// The actual stylesheet enqueued depends on the skin currently selected.
		//
		if ( ! is_forums() )
			wp_register_style(
				'frontend',
				self::$dir_abs . '/frontend/gen/' . self::$skin . '.css'
			);
		
		// Modernizr
		// Detects browser features
		//
		wp_register_script(
			'modernizr',
			self::$dir_abs . '/frontend/gen/modernizr.js',
			array(),
			'2.8.3',
			false
		);
		
		// Reponsd.js
		// Allows IE6, IE7, IE8 to interpret width-based media queries
		//
		wp_register_script(
			'respond',
			self::$dir_abs . '/bower_components/Respond/src/respond.js',
			array( 'modernizr' ),
			'',
			false
		);
		
		// GSAP
		// Fast, fluid animation library
		//
		wp_register_script(
			'gsap',
			self::$dir_abs . '/bower_components/gsap/src/minified/TweenMax.min.js',
			array(),
			'',
			false
		);
		
		// SlidesJS
		// Lightweight slider plugin for jQuery
		//
		wp_register_script(
			'slidesjs',
			self::$dir_abs . '/bower_components/slidesjs/source/jquery.slides.min.js',
			array( 'jquery' ),
			'',
			false
		);
		
		// Frontend scipts
		//
		if ( ! is_forums() )
			wp_register_script(
				'frontend',
				self::$dir_abs . '/frontend/gen/frontend.js',
				array(
					'modernizr',
					'respond',
					'jquery',
					'slidesjs',
					'gsap',
				),
				'',
				true
			);
		
		
		// ENQUEUE ALL THE THINGS
		//
		if ( ! is_forums() )
		{
			wp_enqueue_style(  'frontend' );
			wp_enqueue_script( 'frontend' );
		}
		
	}
	
	/**
	 * Artificial_Intelligence::menus()
	 * Registers navigation menus.
	 *
	 * @since v1.0
	 **/
	public static function menus()
	{
		
		$menus = array(
			'primary'           => __( 'Navbar' ),
			'offcanvas_left'    => __( 'Offcanvas Left' ),
			'offcanvas_right'   => __( 'Offcanvas Right' ),
		);
		
		register_nav_menus( $menus );
	}
	
	/**
	 * Artificial_Intelligence::widgets()
	 * Registers theme sidebars.
	 *
	 * @since v1.0
	 **/
	public static function widgets()
	{
		
		$sidebars = array(
			array(
				'name'          => __( 'Primary Footer' ),
				'id'            => 'footer',
				'description'   => __( 'Appears in the footer at the bottom of most posts and pages.' ),
				'before_widget' => '<div id="%1$s" class="col %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			),
			array(
				'name'          => 'Showcase Footer',
				'id'            => 'footer_showcase',
				'description'   => __( 'Appears in the footer at the bottom of showcase pages.' ),
				'before_widget' => '<div id="%1$s" class="col %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			),
		);
		
		foreach ( $sidebars as $sidebar )
		{
			register_sidebar( $sidebar );
		}
	}
	
	/**
	 * Artificial_Intelligence::customizer()
	 * Registers customizer settings and controls.
	 *
	 * @since v1.0
	 **/
	public static function customizer( $wp_customize )
	{
		
		// List of skins registered with AI.
		//
		$skins = array(
			'lightning' => __( 'Electrify' ),
			'cappy'     => __( 'Mecha' ),
			'kitty'     => __( 'Blue' ),
			'modern'    => __( 'Yosemite' ),
			'edge'      => __( 'Edge' ),
		);
		
		// Skins setting
		//
		$wp_customize->add_setting(
			'ai_theme',
			array(
				'default' => 'lightning',
			)
		);
		
		// Skins control
		//
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'ai_theme',
				array(
					'label'     => __( 'Skin' ),
					'section'   => 'colors',
					'settings'  => 'ai_theme',
					'type'      => 'select',
					'choices'   => $skins,
				)
			)
		);
		
		// Copyright setting
		//
		$wp_customize->add_setting(
			'copyright',
			array(
				'default' => '',
			)
		);
		
		// Copyright control
		//
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'copyright',
				array(
					'label'    => __( 'Copyright text' ),
					'section'  => 'title_tagline',
					'settings' => 'copyright',
					'type'     => 'text',
				)
			)
		);
		
		// Default featured image section
		//
		$wp_customize->add_section( 'default_post_thumbnail', array(
			'title'     => __( 'Featured Images' ),
			'priority'  => 85,
		));
		
		// Default featured image setting
		//
		$wp_customize->add_setting(
			'default_post_thumbnail',
			array(
				'default' => self::$dir_abs . '/images/welding.jpg',
			)
		);
		
		// Default featured image control
		//
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'default_post_thumbnail',
				array(
					'label'    => __( 'Default Featured Image' ),
					'section'  => 'default_post_thumbnail',
					'setting'  => 'default_post_thumbnail',
					'priority' => 30,
				)
			)
		);
		
	}
	
	/**
	 * Artificial_Intelligence::post_types()
	 * Registers custom post types.
	 *
	 * @since v1.0
	 **/
	public static function post_types()
	{
		
		// Slides
		//
		register_post_type( 'slides', array(
			'labels' => array(
				'name'               => __( 'Slides' ),
				'singular_name'      => __( 'Slide'  ),
			),
			'description'          => 'Slides that appear on the front page.',
			'menu_icon'            => 'dashicons-images-alt2',
			
			'show_ui'              => true,
			'exclude_from_search'  => true,
			'publicly_queryabale'  => false,
			'show_in_nav_menus'    => false,
			
			'capability_type'      => 'page',
			
			'rewrite'              => false,
			'supports'             => array(
				'title', 'author', 'revisions',
				'thumbnail', 'custom-fields', 'page-attributes',
			),
		));
		
		// Showcases
		//
		register_post_type( 'showcases', array(
			'labels' => array(
				'name'               => __( 'Showcase' ),
				'singular_name'      => __( 'Showcase Part' ),
			),
			'description'          => __( 'Pages used for advertising.' ),
			'menu_icon'            => 'dashicons-analytics',
			
			'show_ui'              => true,
			'exclude_from_search'  => true,
			'publicly_queryabale'  => false,
			'show_in_nav_menus'    => false,
			
			'capability_type'      => 'page',
			
			'rewrite'              => false,
			'supports'             => array(
				'title', 'author', 'revisions',
				'thumbnail', 'custom-fields', 'page-attributes',
			)
		));
		
		// Require ACF field registrations.
		//
		require self::$dir . '/functions-acf.php';
		
	}
	
	/**
	 * Artificial_Intelligence::excerpt()
	 * Changes the length of excerpts.
	 *
	 * @since v1.0
	 **/
	public static function excerpt( $length )
	{
		return 30;
	}

}

/**
 * Initialize theme.
 *
 **/
Artificial_Intelligence::init();

/**
 * Make sure ACF is in lite mode, no GUI.
 *
 **/
// define( 'ACF_LITE', true );

/**
 * Import PHP dependencies.
 *
 **/
require_once Artificial_Intelligence::$dir . '/vendor/autoload.php';

/**
 * Import other AI features.
 *
 **/
require Artificial_Intelligence::$dir . '/functions-editor.php';
require Artificial_Intelligence::$dir . '/functions-forums.php';


/**
 * get_post_thumbnail_src()
 * Returns the post thumbnail for the given post;
 * otherwise, returns a static image.
 *
 * @param WP_Post $post The post, intended to be the post global
 * @since v1.0 Initial release.
 **/
function get_post_thumbnail_src( $post = null )
{
	
	if ( empty( $post ) )
		$post = get_post();
	
	if ( has_post_thumbnail( $post->ID ) )
		return wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' )[0];
	
	elseif ( get_theme_mod( 'default_post_thumbnail' ) )
		return get_theme_mod( 'default_post_thumbnail' );
	
	else
		return Artificial_Intelligence::$dir_abs . '/images/welding.jpg';
	
}

/**
 * the_post_thumbnail_src( $post )
 * Echoes out the post thumbnail for the given post.
 *
 * @uses get_post_thumbnail_src()
 * @since v1.0 Initial release.
 **/
function the_post_thumbnail_src( $post = null )
{
	echo get_post_thumbnail_src( $post );
}
