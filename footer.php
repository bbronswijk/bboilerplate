	<div class="call-to-action ">
		<div class="container">
			<div class="row">
				<div class="col-md-7 ">
					<div class="call-title"><?php echo get_theme_mod( 'callto_text', 'are you ready for some awesomeness?' ); ?></div>
					
				</div>
				<div class="col-md-3 col-md-offset-1">
					<a class="btn btn-primary btn-lg call-btn"><?php echo get_theme_mod( 'callto_btn_text', 'purchase now' ); ?></a>
				</div>
			</div>
		</div>
	</div>

    <footer>
    	<?php get_sidebar('footer'); ?>
    	
    	<div class="container">    		
	    	<div class="footer">
	    		<p><?php echo home_url(); ?> &copy; <?php echo date("Y"); ?></p>
	    	</div>
    	</div>
    </footer>
    
    <?php wp_footer(); ?>
  </body>
</html>