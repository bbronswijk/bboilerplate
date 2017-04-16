<?php 

	// enable title tag
	add_theme_support( "title-tag" );

	// remove unecessary menu items;
	function custom_menu_page_removing() {
		remove_menu_page( 'edit.php' );
		remove_menu_page( 'edit-comments.php' );
	} add_action( 'admin_menu', 'custom_menu_page_removing' );
	
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