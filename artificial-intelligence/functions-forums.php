<?php

/**
 * Wrapper class for forums functionality
 *
 * @package Artificial Intelligence
 * @subpackage Forums
 *
 * @since 1.2.0
 */
class Forums
{
	
	/**
	 * Initializes forums hooks
	 *
	 * @since 1.2.0
	 **/
	public static function init()
	{
		add_action( 'init', array(
			__CLASS__, 'post_type'
		));
		
		add_action( 'init', array(
			__CLASS__, 'menus',
		));
		
		add_action( 'widgets_init', array(
			__CLASS__, 'widgets'
		));
		
		add_action( 'wp_enqueue_scripts', array(
			__CLASS__, 'assets'
		));
		
		add_action( 'after_setup_theme', array(
			__CLASS__, 'add_caps'
		));
		
		add_action( 'switch_theme', array(
			__CLASS__, 'remove_caps'
		));
		
	}
	
	/**
	 * Registers custom post types and taxonomies used in forums
	 *
	 * @since 1.2.0
	 */
	public static function post_type()
	{
		
		// Register forum threads post type
		//
		register_post_type( 'forum_thread', array(
			
			'labels' => array(
				'name'                => __( 'Forum Threads' ),
				'singular_name'       => __( 'Forum' ),
				'menu_name'           => __( 'Forums' ),
				'name_admin_bar'      => __( 'Forum Thread' ),
				'all_items'           => __( 'Threads' ),
				'add_new'             => __( 'New Thread' ),
				'add_new_item'        => __( 'Forum Thread' ),
				'edit_name'           => __( 'Forum' ),
				'new_item'            => __( 'Forum Thread' ),
				'view_item'           => __( 'Forum Thread' ),
				'search_items'        => __( 'Forum' ),
				'not_found'           => __( 'Forum' ),
				'not_found_in_trash'  => __( 'forum' ),
				'parent_item_colon'   => __( 'parent thread' ),
			),
			
			'description' => __( 'Forums posts' ),
			
			'exclude_from_search' => false,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_in_menu' => true,
			'show_in_admin_bar' => true,
			
			'menu_icon' => 'dashicons-format-status',
			
			'capability_type' => 'forum_thread',
			
			'map_meta_cap' => true,
			
			'supports' => array(
				'title', 'editor', 'author', 'comments', 'revisions'
			),
			
			'rewrite' => array(
				'slug' => 'forums/t',
				'pages' => true,
			),
			'hierarchial' => false,
			
			'has_archive' => 'forums',
			'can_export' => true,
			
		));
		
		// Register forums taxonomy
		// This is what's actually used for the forums functionality
		//
		register_taxonomy( 'forum', array( 'forum_thread' ), array(
			
			'labels' => array(
				'name'                        => __( 'Forums' ),
				'singular_name'               => __( 'Forum' ),
				'menu_name'                   => __( 'Forums' ),
				'all_items'                   => __( 'All Forums' ),
				'edit_item'                   => __( 'Edit Forum' ),
				'view_item'                   => __( 'View Forum' ),
				'update_item'                 => __( 'Update Forum' ),
				'add_new_item'                => __( 'Add New Forum' ),
				'new_item_name'               => __( 'New Forum Name' ),
				'parent_item'                 => __( 'Parent Forum' ),
				'parent_item_colon'           => __( 'Parent Forum:' ),
				'search_items'                => __( 'Search Forums' ),
			),
			
			'public' => true,
			
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => false,
			'hierarchical' => true,
			
			'rewrite' => array(
				'slug' => 'forums/f',
				'hierarchical' => true,
			),
			
			'capabilities' => array(
				'manage_terms'  => 'manage_forums',
				'edit_terms'    => 'manage_forums',
				'delete_terms'  => 'manage_forums',
				'assign_terms'  => 'do_forums',
			),
			
		));
		
		// Register forum tags taxonomy
		//
		register_taxonomy( 'forum_tag', array( 'forum_thread' ), array(
			'labels' => array(
				'name'                        => __( 'Thread Tags' ),
				'singular_name'               => __( 'Tag' ),
				'menu_name'                   => __( 'Thread Tags' ),
				'all_items'                   => __( 'All Tags' ),
				'edit_item'                   => __( 'Edit Tag' ),
				'view_item'                   => __( 'View Tag' ),
				'update_item'                 => __( 'Update Tag' ),
				'add_new_item'                => __( 'Add New Tag' ),
				'new_item_name'               => __( 'New Forum Tag' ),
				'parent_item'                 => __( 'Parent Tag' ),
				'parent_item_colon'           => __( 'Parent Tag:' ),
				'search_items'                => __( 'Search Tag' ),
				'popular_items'               => __( 'Popular Tags' ),
				'seperate_items_with_commas'  => __( 'Separate tags with colons' ),
				'add_or_remove_items'         => __( 'Add or remove tags' ),
				'choose_from_most_used'       => __( 'Choose from the most-used tags' ),
				'not_found'                   => __( 'No forums found.' ),
			),
			
			'public' => false,
			
			'show_ui' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud' => true,
			'hierarchial' => false,
			'show_tagcloud' => true,
			
			'rewrite' => array(
				'slug' => 'forums/tags',
			),
			
			'capabilities' => array(
				'manage_terms'  => 'manage_forums',
				'edit_terms'    => 'manage_forums',
				'delete_terms'  => 'manage_forums',
				'assign_terms'  => 'do_forums',
			),
			
		));
		
	}
	
	/**
	 * Registers forums menu locations
	 *
	 * @since 1.2.0
	 */
	public static function menus()
	{
		register_nav_menus( array(
			'forums_primary' =>          __( 'Forums' ),
			'forums_offcanvas_left'  =>  __( 'Forums Mobile' ),
			'forums_offcanvas_right' =>  __( 'Forums Offcanvas Right' ),
		));
	}
	
	/**
	 * Registers forums sidebars
	 *
	 * @since 1.2.0
	 */
	public static function widgets()
	{
		$sidebars = array(
			array(
				'name'          => 'Forums Footer',
				'id'            => 'forums_footer',
				'description'   => __( 'Appears in the footer at the bottom of the forums.' ),
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
	 * Registers forums assets
	 *
	 * @since 1.2.0
	 */
	public static function assets()
	{
		if ( is_forums() )
			wp_register_style(
				'forums',
				Artificial_Intelligence::$dir_abs . '/forums/gen/' . Artificial_Intelligence::$skin . '.css'
			);
		
		if ( is_forums() )
			wp_register_script(
				'forums',
				Artificial_Intelligence::$dir_abs . '/forums/gen/forums.js',
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
		
		if ( is_forums() )
		{
			wp_enqueue_style(  'forums' );
			wp_enqueue_script( 'forums' );
		}
		
	}
	
	/**
	 * Associative array of roles that the forums add
	 *
	 * @var array
	 * @since 1.2.0
	 */
	public static $roles = array(
		// Administrator
		//
		'administrator' => array(
			'do_forums',
			'manage_forums',
			'edit_forum_thread',
			'read_forum_thread',
			'delete_forum_thread',
			'edit_forum_threads',
			'edit_others_forum_threads',
			'publish_forum_threads',
			'read_private_forum_threads',
			'delete_forum_threads',
			'delete_private_forum_threads',
			'delete_published_forum_threads',
			'delete_others_forum_threads',
			'edit_private_forum_threads',
			'edit_published_forum_threads',
		),
		//
		// Forums Administrator
		//
		'editor' => array(
			'do_forums',
			'manage_forums',
			'edit_forum_thread',
			'read_forum_thread',
			'delete_forum_thread',
			'edit_forum_threads',
			'edit_others_forum_threads',
			'publish_forum_threads',
			'read_private_forum_threads',
			'delete_forum_threads',
			'delete_private_forum_threads',
			'delete_published_forum_threads',
			'delete_others_forum_threads',
			'edit_private_forum_threads',
			'edit_published_forum_threads',
		),
		//
		// Forums Moderator
		//
		'author' => array(
			'do_forums',
			'edit_forum_thread',
			'read_forum_thread',
			'delete_forum_thread',
			'edit_forum_threads',
			'edit_others_forum_threads',
			'publish_forum_threads',
			'read_private_forum_threads',
			'edit_published_forum_threads',
		),
		//
		// Forums Participant (regular user)
		//
		'contributor' => array(
			'do_forums',
			'edit_forum_thread',
			'edit_forum_threads',
			'edit_published_forum_threads',
			'read_forum_thread',
			'publish_forum_threads',
		),
	);
	
	/**
	 * Register roles on theme setup
	 *
	 * @since 1.2.0
	 */
	public static function add_caps()
	{
		
		foreach ( self::$roles as $role => $caps )
		{
			$role = get_role( $role );
			
			foreach ( $caps as $cap )
			{
				$role->add_cap( $cap );
			}
			
		}
		
	}
	
	/**
	 * Unregister roles on theme switch
	 *
	 * @since 1.2.0
	 */
	public static function remove_caps()
	{
		
		foreach ( self::$roles as $role => $caps )
		{
			$role = get_role( $role );
			
			foreach ( $caps as $cap )
			{
				$role->remove_cap( $cap );
			}
			
		}
		
	}
	
}

// Initialize forums
//
Forums::init();

/**
* Returns true if current page is forums-related.
*
* @return bool
**/
function is_forums()
{
	return is_singular( 'forum_thread' ) || is_post_type_archive( 'forum_thread' ) || is_tax( 'forum' ) || is_tax( 'forum_tag' );
}
