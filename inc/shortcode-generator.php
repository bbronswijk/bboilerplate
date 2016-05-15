<?php
 /* Plugin Name: BS3 panel shortcode Plugin URI: Description: A plugin to add Bootstrap 3 panel shortcode as a part to the GWP tutorial Version: 1.0 Author: Ohad Raz Author URI: http://generatewp.com */ 
 class ShortcodeGenerator{   
  
	 public $shortcode_tag = 'services';   
	 
	 function __construct(){       
        if ( is_admin() ){
        	// create filters, to enqueue js. script and create button
            add_action('admin_head', array( $this, 'admin_head') );
			// load css file
            add_action( 'admin_enqueue_scripts', array($this , 'admin_enqueue_scripts' ) );
        }
    }

    function admin_head() {
        // check user permissions
        if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
            return;
        }
 
        // check if WYSIWYG is enabled
        if ( 'true' == get_user_option( 'rich_editing' ) ) {
            add_filter( 'mce_external_plugins', array( $this ,'mce_external_plugins' ) );
            add_filter( 'mce_buttons', array($this, 'mce_buttons' ) );
        }
    }

    function mce_external_plugins( $plugin_array ) {
        $plugin_array[$this->shortcode_tag] = get_template_directory_uri() . '/js/mce-button.js';
        return $plugin_array;
    }

    function mce_buttons( $buttons ) {
        array_push( $buttons, $this->shortcode_tag );
        return $buttons;
    }
 
    function admin_enqueue_scripts(){
         wp_enqueue_style('bs3_panel_shortcode', get_template_directory_uri() . '../css/mce-button.css');
    }
}//end class
 
new ShortcodeGenerator();
