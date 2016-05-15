<?php
class FontAwesomeIncluder{   
  
	 public $button_tag = 'fa_includer';  
	 
	 function __construct(){       
        if ( is_admin() ){
            add_action('admin_head', array( $this, 'admin_head') );
            add_action( 'admin_enqueue_scripts', array($this , 'admin_enqueue_scripts' ) );
        }
    }

    function admin_head() {
        if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ){ return; }
         
        // check if WYSIWYG is enabled
        if ( 'true' == get_user_option( 'rich_editing' ) ) {
            add_filter( 'mce_external_plugins', array( $this ,'mce_external_plugins' ) );
            add_filter( 'mce_buttons', array($this, 'mce_buttons' ) );
        }
    }

    function mce_external_plugins( $plugin_array ) {
        $plugin_array[$this->button_tag] = get_template_directory_uri() . '/js/fa-button.js';
        return $plugin_array;
    }

    function mce_buttons( $buttons ) {
        array_push( $buttons, $this->button_tag );
        return $buttons;
    }
 
    function admin_enqueue_scripts(){
    	wp_enqueue_style('font-awesome-style');
        wp_enqueue_style('mce-buttons', get_template_directory_uri() . '/css/mce-button.css');
    }
}//end class
 
new FontAwesomeIncluder();
