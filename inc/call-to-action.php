<?php
class CallToAction{   
  
	 public $button_tag = 'call_to_action';  
	 
	 function __construct(){       
        if ( is_admin() ){
            add_action('admin_head', array( $this, 'admin_head') );
        } else{
        	$this->load_dependencies();
        	$this->register_shortcodes();
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
	
	// loads all the external files
	private function load_dependencies(){
		require_once 'class-cta-shortcode.php';
	}
	
	// register the [ call_to_action ]
	private function register_shortcodes(){		
		$shortcode = new CTA_Shortcode();		
		add_shortcode('call_to_action',array( $shortcode,'output_shortcode') );
	}
	
    function mce_external_plugins( $plugin_array ) {
        $plugin_array[$this->button_tag] = get_template_directory_uri() . '/js/call_to_action.js';
        return $plugin_array;
    }

    function mce_buttons( $buttons ) {
        array_push( $buttons, $this->button_tag );
        return $buttons;
    }
 
}//end class
 
new CallToAction();
