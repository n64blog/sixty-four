<?php
/**
 * sixty four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sixty_four
 */

 add_theme_support( 'title-tag' );

 /* *************************** */
 /* Add post thumbnail support. */
add_theme_support( 'post-thumbnails' );
add_image_size( 'post-featured', 720, 540, array( 'center', 'top' ) ); // 4:3 Medium
add_image_size( 'post-featured-hero', 960, 720, array( 'center', 'top' ) ); // 4:3 large

/* *************************** */
/* Register widget area. */
// @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar

function sixty_four_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'sixty-four' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'sixty-four' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

  register_sidebar( array(
    'name'          => esc_html__( 'Homepage sidebar', 'sixty-four' ),
    'id'            => 'sidebar-2',
    'description'   => esc_html__( 'Add widgets here.', 'sixty-four' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
    'name'          => esc_html__( 'Posts sidebar', 'sixty-four' ),
    'id'            => 'sidebar-3',
    'description'   => esc_html__( 'Add widgets here.', 'sixty-four' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'sixty_four_widgets_init' );


/* *************************** */
/* Enqueue scripts and styles. */
function sixty_four_scripts() {
	wp_enqueue_style( 'sixty-four-style', get_template_directory_uri() . '/style.min.css', array(), filemtime(get_template_directory() . '/style.min.css'), false);

	// Enqueue jquery and custom script
  wp_register_script('nav_script', home_url() . '/wp-content/themes/sixty-four/js/navigation.js', array( 'jquery' ));
	wp_register_script('slick_script', home_url() . '/wp-content/themes/sixty-four/js/slick.js', array( 'jquery' ));
  wp_enqueue_script('nav_script');
  wp_enqueue_script('slick_script');
}

add_action( 'wp_enqueue_scripts', 'sixty_four_scripts' );


/* *************************** */
/* Register Menus */
register_nav_menus( array(
	'menu-1' => esc_html__( 'Header', 'sixty-four' ),
) );


/* *************************** */
/* Register Custom Fields for ACF */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_game-review',
		'title' => 'Game Review',
		'fields' => array (
			array (
				'key' => 'field_5996092a7d77f',
				'label' => 'Score',
				'name' => 'game_review_score',
				'type' => 'number',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => 0,
				'max' => 100,
				'step' => '',
			),
			array (
				'key' => 'field_599609b87d780',
				'label' => 'The good things',
				'name' => 'game_review_the_good',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_599609d07d781',
				'label' => 'The bad things',
				'name' => 'game_review_the_bad',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'single-reviews.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_game-information',
		'title' => 'Game Information',
		'fields' => array (
			array (
				'key' => 'field_59960ec75b07e',
				'label' => 'Box art',
				'name' => 'game_box_art',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'medium',
				'library' => 'all',
			),
			array (
				'key' => 'field_59945071061b3',
				'label' => 'Developed by',
				'name' => 'game_developed_by',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => 'e.g. Nintendo',
				'maxlength' => '',
				'rows' => 1,
				'formatting' => 'none',
			),
			array (
				'key' => 'field_599450d6061b4',
				'label' => 'Published by',
				'name' => 'game_published_by',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => 'e.g. Nintendo',
				'maxlength' => '',
				'rows' => 1,
				'formatting' => 'none',
			),
			array (
				'key' => 'field_599451c3c2ffb',
				'label' => 'Japanese release date',
				'name' => 'jpn_release_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'MM yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_599451fb2e4f3',
				'label' => 'United States release date',
				'name' => 'us_release_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'MM yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_599452122e4f4',
				'label' => 'European release date',
				'name' => 'eu_release_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'MM yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_5994527ce3df7',
				'label' => 'Genre',
				'name' => 'game_genre',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => 'e.g. 3D platformer',
				'maxlength' => '',
				'rows' => 1,
				'formatting' => 'none',
			),
			array (
				'key' => 'field_5994533ee3df8',
				'label' => 'Number of players',
				'name' => 'game_players',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => 'e.g. 1 – 4',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5994549b6a959',
				'label' => 'Cartridge size',
				'name' => 'game_cartridge_size',
				'type' => 'number',
				'instructions' => 'specify in MB',
				'default_value' => '',
				'placeholder' => 'e.g. 12',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => 4,
			),
			array (
				'key' => 'field_599456db067b5',
				'label' => 'Rumble Pak',
				'name' => 'game_rumble_pak',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5994c81e82df1',
				'label' => 'Controller pak',
				'name' => 'game_controller_pak',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5994c83982df2',
				'label' => 'Expansion pak optional',
				'name' => 'game_expansion_pak_optional',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5994c85082df3',
				'label' => 'Expansion pak required',
				'name' => 'game_expansion_pak_required',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
			array (
				'key' => 'field_5994c86f82df4',
				'label' => 'Transfer pak',
				'name' => 'game_transfer_pak',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'single-reviews.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 5,
	));
}

// Homepage featured post

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_homepage-featured',
		'title' => 'Homepage Featured',
		'fields' => array (
			array (
				'key' => 'field_5a764fae22ddb',
				'label' => 'Featured Post',
				'name' => 'featured_post',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5a764f94513e9',
				'label' => 'Featured Post 2',
				'name' => 'featured_post_2',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5a764fd0fb16f',
				'label' => 'Featured Post 3',
				'name' => 'featured_post_3',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
			array (
				'key' => 'field_5a764fe2e7485',
				'label' => 'Featured Post 4',
				'name' => 'featured_post_4',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 0,
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '727',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}


// Homepage featured post 2

// Homepage featured post 3

// Homepage featured post 4

//Related Posts

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_related-posts',
		'title' => 'Related Posts',
		'fields' => array (
			array (
				'key' => 'field_5a023bf2fdad7',
				'label' => 'Related posts',
				'name' => 'related_posts',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/* *************************** */
/* Control the excerpt word count and read more link */
/* *************************** */
function wpdocs_excerpt_more( $more ) {
	return '...';
}
function wpdocs_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
add_filter( 'excerpt_length', 'wpdocs_excerpt_length', 999 );


/* *************************** */
/* Shortcodes */
/* *************************** */
// Function to add accordion shortcode
function video_shortcode( $atts, $content = null ) {
	$video = shortcode_atts( array(), $atts );
	return '<div class="video">' . $content . '</div>';
}
add_shortcode('video', 'video_shortcode');
