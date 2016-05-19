<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no">
        <meta name="description" content="<?php bloginfo( 'description' ); ?>">
                
        <link rel="profile" href="http://gmpg.org/xfn/11" />       
		
		<?php wp_head(); ?>
    </head <?php body_class(); ?>>
	<div id="coming-soon">
		<img src="<?php header_image(); ?>?<?php echo date("Ymdgis");?>" alt="logo" class="header-logo"/>
		<h1>Deze website is binnenkort beschikbaar</h1>		
	</div>


<?php wp_footer(); ?>