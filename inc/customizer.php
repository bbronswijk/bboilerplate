<?php

class MyTheme_Customize {
  
   public static function register ( $wp_customize ) {
   	  // 0. DEFINE PANELS
   	  $wp_customize->add_panel( 'header', array(
		    'title' => 'Header',
		    'description' => 'This is a description of this panel',
		    'priority' => 25,
		) );
		
	
      // 1. DEFINE SECTIONS
       $wp_customize->add_section( 'fonts', 
         array(
            'title' => __( 'Fonts', 'mytheme' ), //Visible title of section
            'priority' => 35, //Determines what order this appears in
            'description' => __('Change fonts.', 'mytheme'), //Descriptive tooltip
         ) 
      );
      
      $wp_customize->add_section( 'banner_section', 
         array(
            'title' => __( 'Banner', 'mytheme' ), //Visible title of section
            'priority' => 25, //Determines what order this appears in
            'description' => __('Allows you to customize the banner image.', 'mytheme'), //Descriptive tooltip
         ) 
      );
	  
	  $wp_customize->add_section( 'callto_section', 
         array(
            'title' => __( 'Call to Action', 'mytheme' ), //Visible title of section
            'priority' => 45, //Determines what order this appears in
            'description' => __('Allows you to customize the call to action bar at the bottom of the page', 'mytheme'), //Descriptive tooltip
         ) 
      );
	  
	  $wp_customize->add_section( 'social_section', 
         array(
            'title' => __( 'Social Media Icons', 'mytheme' ), //Visible title of section
            'description' => __('Allows you to customize the social media icons in the top bar of the page', 'mytheme'), //Descriptive tooltip
         	'panel' => 'header',
         	'priority' => 2,
		 ) 
      );
	  
	  $wp_customize->add_section( 'contact_section', 
         array(
            'title' => __( 'Contact Data', 'mytheme' ), //Visible title of section
            'description' => __('Allows you to customize the social media icons in the top bar of the page', 'mytheme'), //Descriptive tooltip
         	'panel' => 'header',
         	'priority' => 1
		 ) 
      );
	  
	  $wp_customize->get_section( 'header_image' )->panel = 'header';
      $wp_customize->get_section( 'header_image' )->title = 'header logo';
	  
      //2. REGISTER SETTINGS
      $wp_customize->add_setting( 'main-font', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => 'Open Sans', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
         ) 
      ); 
      
      $wp_customize->add_setting( 'banner_image', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => get_template_directory_uri().'/img/banner.jpg', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );  
	  
	  $wp_customize->add_setting( 'banner_position', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => 'center', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );   
	  
	   $wp_customize->add_setting( 'banner_textcolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => '#fff', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );   
	  
	  $wp_customize->add_setting( 'banner_text_align', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => 'left', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );   
	  
	  $wp_customize->add_setting( 'banner_textshadow', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => 'none', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
         ) 
      ); 
	  
	  $wp_customize->add_setting( 'banner_headline', 
         array(
            'default' => 'Headline', 
            'type' => 'theme_mod',
            'transport' => 'postMessage',  
         ) 
      );  
	  
	  $wp_customize->add_setting( 'banner_subtitle', 
         array(
            'default' => 'Curabitur luctus lacus et lectus dictum ornare.', 
            'type' => 'theme_mod',
            'transport' => 'postMessage'  
         ) 
      );   
	  
	  $wp_customize->add_setting( 'banner_text_btn', 
         array(
            'default' => 'Read More', 
            'type' => 'theme_mod',
            'transport' => 'postMessage'  
         ) 
      );  
	  
	  $wp_customize->add_setting( 'banner_btn_url', 
         array(
            'default' => '#', 
            'type' => 'theme_mod',
            'transport' => 'postMessage'  
         ) 
      );  
	  
	  $wp_customize->add_setting( 'banner_movie', 
         array(
            'default' => '#', 
            'type' => 'theme_mod'
         ) 
      );  
	  
	  $wp_customize->add_setting( 'callto_text', 
         array(
            'default' => 'are you ready for awesomeness? this is a call to action', 
            'type' => 'theme_mod',
            'transport' => 'postMessage'  
         ) 
      );
	  
	  $wp_customize->add_setting( 'callto_btn_text', 
         array(
            'default' => 'purchase now', 
            'type' => 'theme_mod',
            'transport' => 'postMessage'  
         ) 
      );   
	  
	  $wp_customize->add_setting( 'callto_link', 
         array(
            'default' => '#', 
            'type' => 'theme_mod',
            'transport' => 'postMessage'  
         ) 
      );     
	    
	  
	  // CONTACT HEADER
	  $wp_customize->add_setting( 'promo_email', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => 'promo@website.com', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );   
     
	 $wp_customize->add_setting( 'promo_phone', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => '+31(0)12 345 67 89', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );  
	  
	  // SOCIAL MEDIA
	  $wp_customize->add_setting( 'facebook-url', 
         array(
            'type' => 'option'
         ) 
      );  
	  
	  $wp_customize->add_setting( 'twitter-url', 
         array(
            'type' => 'option' 
         ) 
      );  
	  
	  $wp_customize->add_setting( 'linkedin-url', 
         array(
            'type' => 'option'
         ) 
      );  
	  
	  $wp_customize->add_setting( 'vimeo-url', 
         array(
            'type' => 'option' 
         ) 
      );  
	  
	  $wp_customize->add_setting( 'instagram-url', 
         array(
            'type' => 'option'
         ) 
      );  
	        
      //3. DEFINE CONTROLS       
      $wp_customize->add_control(
			'main-font', 
			array(
				'label'    => __( 'Main Font', 'mytheme' ),
				'section'  => 'fonts',
				'settings' => 'main-font',
				'type'     => 'select',
				'choices'  => array(
					'Roboto'  => 'Roboto',
					'Fira Sans'  => 'Fira Sans',
					'Open Sans' => 'Open Sans'
				),
			)
		);
      
	  // BANNER
      $wp_customize->add_control( new WP_Customize_Image_Control( 
         $wp_customize, //Pass the $wp_customize object (required)
         'banner_image', //Set a unique ID for the control
         array(
            'label' => __( 'Image', 'mytheme' ), //Admin-visible name of the control
            'section' => 'banner_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'banner_image', //Which setting to load and manipulate (serialized is okay)
            'priority' => 10, //Determines the order this control appears in for the specified section
         ) 
      ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'banner_headline',
         array(
            'label' => __( 'Headline', 'mytheme' ), 
            'section' => 'banner_section', 
            'settings' => 'banner_headline', 
            'priority' => 10
         ) 
	  ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'banner_subtitle',
         array(
            'label' => __( 'Subtitle', 'mytheme' ), 
            'section' => 'banner_section', 
            'settings' => 'banner_subtitle', 
            'priority' => 10
         ) 
	  ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'banner_text_btn',
         array(
            'label' => __( 'Text Button', 'mytheme' ), 
            'section' => 'banner_section', 
            'settings' => 'banner_text_btn', 
            'priority' => 10
         ) 
	  ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'banner_btn_url',
         array(
            'label' => __( 'Button redirect URL', 'mytheme' ), 
            'section' => 'banner_section', 
            'settings' => 'banner_btn_url', 
            'priority' => 10
         ) 
	  ) );
	  	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'banner_movie',
         array(
            'label' => __( 'Movie', 'mytheme' ), 
            'section' => 'banner_section', 
            'settings' => 'banner_movie', 
            'priority' => 10
         ) 
	  ) );
	  
	  $wp_customize->add_control(
			'position', 
			array(
				'label'    => __( 'Position', 'mytheme' ),
				'section'  => 'banner_section',
				'settings' => 'banner_position',
				'type'     => 'select',
				'choices'  => array(
					'top'  => 'top',
					'center'  => 'center',
					'bottom' => 'bottom'
				),
			)
		);
		
		$wp_customize->add_control(
			'main_text_align', 
			array(
				'label'    => __( 'Text Align', 'mytheme' ),
				'section'  => 'banner_section',
				'settings' => 'banner_text_align',
				'type'     => 'select',
				'choices'  => array(
					'left'  => 'left',
					'center'  => 'center',
					'right' => 'right'
				),
			)
		);
				
		$wp_customize->add_control(
			'banner-textshadow', 
			array(
				'label'    => __( 'Text Shadow', 'mytheme' ),
				'section'  => 'banner_section',
				'settings' => 'banner_textshadow',
				'type'     => 'select',
				'choices'  => array(
					'none'  => 'none',
					'2px 2px 0px #707070'  => 'black',
				),
			)
		);
				
	  $wp_customize->add_control( new WP_Customize_Color_Control( 
         $wp_customize, 
         'banner_textcolor', 
         array(
            'label' => __( 'Text Color', 'mytheme' ), 
            'section' => 'banner_section', 
            'settings' => 'banner_textcolor', 
            'priority' => 10, 
         ) 
      ) );
		
	  // contact info
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, //Pass the $wp_customize object (required)
         'promo_email', //Set a unique ID for the control
         array(
            'label' => __( 'Email', 'mytheme' ), //Admin-visible name of the control
            'section' => 'contact_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'promo_email', //Which setting to load and manipulate (serialized is okay)
            'priority' => 12, //Determines the order this control appears in for the specified section
         ) 
	  ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, //Pass the $wp_customize object (required)
         'promo_phone', //Set a unique ID for the control
         array(
            'label' => __( 'Telefoonnummer', 'mytheme' ), //Admin-visible name of the control
            'section' => 'contact_section', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'promo_phone', //Which setting to load and manipulate (serialized is okay)
            'priority' => 13, //Determines the order this control appears in for the specified section
         ) 
	  ) );
	  
	  // social media
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'facebook-url',
         array(
            'label' => __( 'Facebook', 'mytheme' ), 
            'section' => 'title_tagline', 
            'settings' => 'facebook-url', 
            'priority' => 10,
            'section' => 'social_section'
         ) 
	  ) );
	  
	   $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'twitter-url',
         array(
            'label' => __( 'Twitter', 'mytheme' ), 
            'section' => 'title_tagline', 
            'settings' => 'twitter-url', 
            'priority' => 11, 
            'section' => 'social_section'
         ) 
	  ) );
	  
	   $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'linkedin-url',
         array(
            'label' => __( 'LinkedIn', 'mytheme' ), 
            'section' => 'title_tagline', 
            'settings' => 'linkedin-url', 
            'priority' => 12, 
            'section' => 'social_section'
         ) 
	  ) );
	  
	   $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'instagram-url',
         array(
            'label' => __( 'Instagram', 'mytheme' ), 
            'section' => 'title_tagline', 
            'settings' => 'instagram-url', 
            'priority' => 13, 
            'section' => 'social_section'
         ) 
	  ) );
		
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'vimeo-url',
         array(
            'label' => __( 'Vimeo', 'mytheme' ), 
            'section' => 'title_tagline', 
            'settings' => 'vimeo-url', 
            'priority' => 14, 
            'section' => 'social_section'
         ) 
	  ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'callto_text',
         array(
            'label' => __( 'Call to action', 'mytheme' ), 
            'section' => 'callto_section', 
            'settings' => 'callto_text', 
            'priority' => 10
         ) 
	  ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'callto_btn_text',
         array(
            'label' => __( 'Button Text', 'mytheme' ), 
            'section' => 'callto_section', 
            'settings' => 'callto_btn_text', 
            'priority' => 10
         ) 
	  ) );
	  
	  $wp_customize->add_control( new WP_Customize_Control( 
         $wp_customize, 
         'callto_link',
         array(
            'label' => __( 'Button URL', 'mytheme' ), 
            'section' => 'callto_section', 
            'settings' => 'callto_link', 
            'priority' => 10
         ) 
	  ) );
		 
	
      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      //$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      //$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
      //$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
      //$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
      
   }

   //This will output the custom WordPress settings to the live theme's WP head. 
   public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style id="theme-styles" type="text/css">
      	   <?php self::generate_css('*', 'font-family', 'main-font',"'","',sans-serif"); ?> 
           <?php self::generate_css('.jumbotron', 'background-image', 'banner_image','url(',')'); ?> 
           <?php self::generate_css('.jumbotron', 'background-position', 'banner_position'); ?> 
           <?php self::generate_css('.jumbotron', 'text-align', 'banner_text_align'); ?> 
           <?php self::generate_css('.jumbotron h1', 'color', 'banner_textcolor'); ?> 
           <?php self::generate_css('.jumbotron p', 'color', 'banner_textcolor'); ?> 
           <?php self::generate_css('.jumbotron h1', 'text-shadow', 'banner_textshadow'); ?> 
           <?php self::generate_css('.jumbotron p', 'text-shadow', 'banner_textshadow'); ?> 
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
   
   //This outputs the javascript needed to automate the live settings preview. 
   public static function live_preview() {
      wp_enqueue_script( 	'theme-themecustomizer', 
      						get_template_directory_uri().'/js/theme-customizer.js',
      						array('jquery','customize-preview'), 
      						'', 
      						true
						);
   }

    //This will generate a line of CSS for use in header output. If the setting
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'MyTheme_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'MyTheme_Customize' , 'live_preview' ) );