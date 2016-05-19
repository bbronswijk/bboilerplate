<?php

	
	// register styles
	function theme_enqueue_style() {
		// id, src, dependencies, version, media
		wp_enqueue_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
		wp_enqueue_style( 'font-awesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css' );
		wp_enqueue_style( 'animate', get_template_directory_uri().'/css/animate.min.css', false ); 		
		wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,300,900|Fira+Sans:400,300,700|Open+Sans:400,300,600,700', false ); 
		wp_enqueue_style( 'theme-style', get_template_directory_uri().'/style.css', false ); 
	} add_action( 'wp_enqueue_scripts', 'theme_enqueue_style' );
	
	// register scripts
	function theme_enqueue_script() {
		// id, src, dependencies, version, footer
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-core' );		
		wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', false, true );
		wp_enqueue_script( 'header-js', get_template_directory_uri().'/js/header.js', false, true );		
	} add_action( 'wp_enqueue_scripts', 'theme_enqueue_script' );
	
	function theme_admin_styles(){
		wp_register_style( 'font-awesome-style', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );		
	} add_action( 'admin_enqueue_scripts', 'theme_admin_styles' );
	
	// register navigation menu 
    function register_my_menus() {
	  register_nav_menus(
		  array(
		  	'header-menu' => __( 'Header Menu', 'my-theme' )
		  )
	  );
	} add_action( 'init', 'register_my_menus' );
	
	// remove unecessary menu items;
	function custom_menu_page_removing() {
	    remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
	}
	add_action( 'admin_menu', 'custom_menu_page_removing' );

	// editor style	
	add_editor_style( array('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css','style.css','https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css') );
	
	// enable header image
	$args = array(
		'header-text'            => false,
		'default-image' => get_template_directory_uri() . '/img/logo.png',
	);
	add_theme_support( 'custom-header', $args );
	
	// customizer settings
	require_once 'inc/customizer.php';
	
	// register services plugin 
	require_once 'inc/services.php';
	
	// register shortcode generator
	//require_once 'inc/shortcode-generator.php';
	
	// register dashboard widget -> redirect to help.brambronswijk.com or small faq
	// nieuwe features per versie
	require_once 'inc/dashboard.php';
	
	// register sidebar option for page editor
	require_once 'inc/sidebar-option.php';
	
	// register font-awesome includer
	require_once 'inc/fa-includer.php';
	
	// register call to action button
	require_once 'inc/call-to-action.php';
	
	// register call to action button
	require_once 'inc/coming-soon.php';
	
	// support qtranslate
	function myqtranxf_add_admin_filters() {
		if (is_admin()) {
			// Hooks (execution time critical filters)
			add_filter('gettext', 'qtranxf_gettext', 0);
			add_filter('gettext_with_context', 'qtranxf_gettext_with_context', 0);
			add_filter('ngettext', 'qtranxf_ngettext', 0);
		}
	}
	
	// check if qtranslate is active
	function check_qtranslate_plugin() {
		if (is_plugin_active('qtranslate-x/qtranslate.php')) myqtranxf_add_admin_filters();
	}	add_action( 'admin_init', 'check_qtranslate_plugin' );
		
	//register sidebars
	if ( function_exists('register_sidebar') ){
		register_sidebar(array(
		  'name' 		=> __( 'Default Sidebar', 'my-theme' ),
		  'id' 			=> 'default',
		  'description' => __( 'Default sidebar', 'my-theme' ),
		));
		register_sidebar(array(
		  'name' 		=> __( 'Alternative Default ', 'my-theme' ),
		  'id' 			=> 'default-alternative',
		  'description' => __( 'Alternative Default sidebar', 'my-theme' ),
		));
		register_sidebar(array(
		  'name' 			=> __( 'footer' ),
		  'id' 				=> 'footer',
		  'before_widget' 	=> '<div id="%1$s" class="widget %2$s col-md-3">',
		  'after_widget'  	=> '</div>',
		  'description' 	=> __( 'Footer widgets.', 'my-theme'  ),
		));
	}
	
	// enable title tag
	add_theme_support( "title-tag" );
	
	// custom admin login logo
	function custom_login_logo() {
		echo '<style type="text/css">
				h1 a {
					 background-image: url('.get_header_image().') !important; 
					 background-size: contain !important; 
					 background-position: bottom !important;
					 width: 320px !important; 
					 height: 150px !important; 
					 margin-bottom: 30px !important; 
				}
			</style>';
			
	} add_action('login_head', 'custom_login_logo');
	
	
	// GitHub Updater
	// add personal access token
	add_filter( 'github_updater_token_distribution', function (){
        return array( 'bboilerplate' => 'e5cf1afc6f1ac882981e9436d458137dd656b3ac' );
    });
	 	
	// hide option page github update
	add_filter( 'github_updater_hide_settings', '__return_true' );
		
	
	// remove useless emoticons scripts wordpress 4.2
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	
	// remove Open Sans from header wordpress 3.8+
	if (!function_exists('remove_wp_open_sans' )){
		function remove_wp_open_sans() {
		wp_deregister_style( 'open-sans' );
	    wp_register_style( 'open-sans', false );
	  }
	  add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
	  add_action('admin_enqueue_scripts', 'remove_wp_open_sans');
	}
	
	// remove unsafe meta tags
	remove_action( 'wp_head', 'wp_generator' ) ;
	remove_action( 'wp_head', 'wlwmanifest_link' ) ;
	remove_action( 'wp_head', 'rsd_link' ) ;
	
	// hide all unnecessary widgets
	function remove_default_widgets() {
	     unregister_widget('WP_Widget_Pages');
	     unregister_widget('WP_Widget_Calendar');
	     unregister_widget('WP_Widget_Archives');
	     unregister_widget('WP_Widget_Links');
	     unregister_widget('WP_Widget_Meta');
	     unregister_widget('WP_Widget_Search');
	     unregister_widget('WP_Widget_Categories');
	     unregister_widget('WP_Widget_Recent_Posts');
	     unregister_widget('WP_Widget_Recent_Comments');
	     unregister_widget('WP_Widget_RSS');
	     unregister_widget('WP_Widget_Tag_Cloud');
	 } add_action('widgets_init', 'remove_default_widgets',11);
	
?>