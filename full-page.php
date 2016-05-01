<?php 
/*
Template Name: Full Width 
*/ 
?>

	<?php get_header(); ?>
	
	<div class="page-wrapper">
		<div class="container">
			
			<?php if ( have_posts() ) : 
							
				while ( have_posts() ) : the_post(); ?>
						
						<h1 class="page-title"><?php the_title(); ?></h1>
					
				<?php endwhile; ?>
				
			<?php endif; ?>
			
			
			<?php if ( have_posts() ) : 
							
				while ( have_posts() ) : the_post(); ?>
					<div class="content col-md-12">	
																
						<?php the_content(); ?>
						
					</div>
					
				<?php endwhile; ?>
				
			<?php endif; ?>
			
			
		</div>
	</div><!-- container --> 
	
<?php get_footer(); ?>