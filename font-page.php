<?php get_header(); ?>

<!-- Dynamic content -->
<div class="page-wrapper">
		<div class="container">
			
			<?php 
			
			if ( have_posts() ) : 
							
				while ( have_posts() ) : the_post(); 
				
						echo '<h1 class="page-title">'.get_the_title().'</h1>'; 
						echo the_content(); 

				endwhile; 
				
			 endif; 
			 
			?>
			
			
		</div>
	</div><!-- container --> 


<?php get_footer(); ?>