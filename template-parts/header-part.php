		<header class="<?php if(is_front_page() ) echo get_theme_mod( 'banner_type' );  ?>">
		   	<div class="header hidden-xs">
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-sm-9 col-xs-12">
			   				<?php if( get_theme_mod('promo_email') ): ?>
			   				<a href="mailto:info@rowcoaching.nl" target="_blank" style="margin-right: 30px;"><i class="fa fa-envelope-o" aria-hidden="true"></i><span class="header-email"><?php echo get_theme_mod( 'promo_email', 'promo@website.com' ); ?></span></a>
			   				<?php endif; if( get_theme_mod('promo_phone') ): ?>
			   				<a href="tel:+31653621545" target="_blank"><i class="fa fa-phone" aria-hidden="true"></i><span class="header-phone"><?php echo get_theme_mod( 'promo_phone', '+31(0)12 345 67 82' ); ?></span></a>
			   				<?php endif; ?>
			   			</div>
			   			<div class="col-sm-3" style="text-align: right;">
			   				<?php if( get_option('facebook-url') ): ?>
			   				<a href="<?php echo get_option('facebook-url'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
			   				<?php endif; if( get_option('instagram-url') ): ?>
			   				<a href="<?php echo get_option('instagram-url'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
			   				<?php endif; if( get_option('vimeo-url') ): ?>
			   				<a href="<?php echo get_option('vimeo-url'); ?>" target="_blank"><i class="fa fa-vimeo" aria-hidden="true"></i></a>	   
			   				<?php endif; if( get_option('twitter-url') ): ?>
			   				<a href="<?php echo get_option('twitter-url'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
			   				<?php endif; if( get_option('linkedin-url') ): ?>
			   				<a href="<?php echo get_option('linkedin-url'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
			   				<?php endif; ?>					
			   			</div>
			   		</div>
		   		</div>
		   	</div>
			<nav class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						
						<a class="logo-link pull-left hidden-xs hidden-sm " href="<?php echo home_url(); ?>">
							<span class="helper"></span>
							<?php if ( has_post_thumbnail() ) {
							    the_post_thumbnail();
							} else {?>
								<img src="<?php header_image(); ?>?<?php echo date("Ymdgis");?>" alt="logo" class="header-logo"/> 
							<?php } ?>
						</a>					
					</div>
					
					<?php if( function_exists('qtranxf_generateLanguageSelectCode') ) echo qtranxf_generateLanguageSelectCode('image'); ?>
					
					<?php wp_nav_menu( array( 	'theme_location' => 'header-menu', 
												'container_id' => 'navbar', 
												'container_class' => 'navbar-collapse collapse pull-right', 
												'container' => 'nav',
												'menu_class' => 'nav navbar-nav'
										)); ?>
					
				</div>
			</nav>
		</header>