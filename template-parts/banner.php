	<?php if(is_front_page()): ?>
		<div class="jumbotron <?php echo get_theme_mod( 'banner_type' ); ?>">			
			<div class="container">
				<h1 class="animated fadeInUp"><?php echo get_theme_mod( 'banner_headline', 'Headline' ); ?></h1>
				<p class="animated fadeInUp"><?php echo get_theme_mod( 'banner_subtitle', 'Curabitur luctus lacus et lectus dictum ornare.' ); ?></p>
				<?php if( get_theme_mod( 'banner_text_btn' ) ): ?>
					<a href="<?php echo get_theme_mod( 'banner_btn_url', '#' ); ?>" class="btn btn-primary btn-lg animated fadeInUp" style="margin-top: 30px;"><?php echo get_theme_mod( 'banner_text_btn', 'Read More' ); ?></a>
				<?php endif; ?>
				<?php if( get_theme_mod( 'banner_movie' ) ): ?>
					<a href="#" id="watch-movie-btn" class="btn btn-default btn-lg animated fadeInUp" style="margin-top: 30px; margin-left: 10px;">
						<?php echo __( 'watch short movie', 'my-theme' ); ?> <i class="fa fa-play" style="margin-left: 5px;"></i>
					</a>
				<?php endif; ?>
			</div>
			<div class="movie-container">
				<iframe src="<?php echo get_theme_mod( 'banner_movie' ); ?>" width="915" height="515" style="border:none;overflow:hidden; margin-top: 3px;" scrolling="no" frameborder="0" allowTransparency="true" allowFullScreen="true"></iframe>
			</div>
		</div>
	<?php endif; ?>