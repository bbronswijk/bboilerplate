<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
                
        <link rel="profile" href="http://gmpg.org/xfn/11" />       
		
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>> 
    
    	<?php get_template_part( 'template-parts/header-part'); ?>
    	
    	<?php get_template_part( 'template-parts/banner'); ?>
		
	
		