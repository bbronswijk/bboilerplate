<?php
class comingSoon {
	
	public $status;
	
	function __construct(){
		$this->status = get_option('comingsoon_option');
						
		if ( !is_admin() ){
            add_action('template_redirect', array($this , 'coming_soon_redirect') );
			add_action( 'wp_enqueue_scripts', array($this , 'enqueue_inline_scripts' ) );
			add_action( 'wp_enqueue_scripts', array($this , 'enqueue_scripts' ) );
        } else{
        	
        	add_action( 'admin_enqueue_scripts', array($this , 'enqueue_scripts' ) );
        	add_action( 'admin_head', array($this , 'create_page' ) );
			add_action('admin_init', array($this , 'register_comingsoon_option') );
        }
		
		add_action( 'admin_bar_menu', array( $this, 'comingsoon_admin_bar'), 999 );
	}
	
	// enqueue script
	function enqueue_scripts(){
		// enqueu the styles sheet for the default styles which are not dynamic		
		wp_enqueue_style( 'comingsoon-style', get_template_directory_uri().'/css/coming-soon.css', false );
    }
	
	// enqueue inline script
	function enqueue_inline_scripts(){
		// get dynamic values
		$bg = get_theme_mod( 'banner_image', '../img/banner.jpg' ); //E.g. #FF0000
		// TODO enque inline styles doens't work for some reason
        echo '
        	<style id="comingsoon-inline-styles" type="text/css">
                #coming-soon{
                    background-image: url('.$bg.');
                }
            </style>';
    }
	
	// add coming soon item in admin bar
	function comingsoon_admin_bar( $wp_admin_bar ) {
		if( $this->status == "active"){
			$args = array(
				'id'    => 'coming_soon',
				'title' => 'Coming Soon Mode Active!',
				'href'	=> get_site_url().'/wp-admin/options-reading.php',
				'meta'  => array( 'class' => 'comingsoon_admin_bar' )
			);
			$wp_admin_bar->add_node( $args );
		}
	}

	// register settings
	// checkbox option goede doelen
	function register_comingsoon_option() {
	        register_setting( 'reading', 'comingsoon_option', 'esc_attr' );
	        add_settings_field('comingsoon_option', '<label for="comingsoon_option">Coming Soon Modus </label>' ,array( $this,'comingsoon_option_html'),'reading' );
	} 
	
	function comingsoon_option_html() {
			if( $this->status === "active"){
				 $checked =  "checked='checked'"; 
			} else{
				$checked = "";
			}
			echo '<input type="checkbox" name="comingsoon_option" value="active" '.$checked.'/> Zorg dat bezoekers de website tijdelijk niet kunnen bekijken en geef in plaats daarvan een tijdelijke comingsoon pagina weer.';
	}
	
	function create_page(){
		// check if not already exists page exists
		// this way there is always a coming soon page, even if it gets deleted
		// TODO check if coming-soon  is active
		if( !get_page_by_path( 'coming-soon' , OBJECT ) ){
			$my_post = array(
			  'post_title'    => 'coming-soon',
			  'post_status'   => 'publish',
			  'post_type'	  => 'page'
			);
			 
			// Insert the post into the database
			wp_insert_post( $my_post );
		}
	}
	
	//redirect non-users to the coming soon page
	function coming_soon_redirect()
	{
		if( $this->status == "active"){
			//global $pagenow;
			//&& $page_now != "wp-login.php"
			if(!is_user_logged_in() && !is_page("login") && !is_page("coming-soon") )
			{
				wp_redirect(home_url("coming-soon"));
				exit;
			}
		}
	}

	
} new comingSoon();
