<?php

class Theme_Social_Customize {
  
   public static function register ( $wp_customize ) {
   	
	   	// 0. DEFINE PANELS
	   	$wp_customize->add_panel( 'header', array(
	   			'title' => 'Header',
	   			'description' => 'This is a description of this panel',
	   			'priority' => 25,
	   	) );
   	
      // 1. DEFINE SECTIONS
	  $wp_customize->add_section( 'social_section', 
         array(
            'title' => __( 'Social Media Icons', 'sensationred' ), //Visible title of section
            'description' => __('Voer hier de social media urls in', 'mytheme'), //Descriptive tooltip
         	'priority' => 2,
         		'panel' => 'header',
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

	  // CONTACT HEADER
	  $wp_customize->add_setting( 'promo_email', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
	  		array(
	  				'default' => 'promo@website.com', //Default setting/value to save
	  				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
	  				'transport' => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
	  		)
	  );
	   
	  $wp_customize->add_setting( 'promo_phone', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
	  		array(
	  				'default' => '+31(0)12 345 67 89', //Default setting/value to save
	  				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
	  				'transport' => 'refresh', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
	  		)
	  );
	  
      //3. DEFINE CONTROLS       

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

      
   }

}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Theme_Social_Customize' , 'register' ) );
