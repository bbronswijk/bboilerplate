<?php
// Display content on page using shortcode
class CTA_Shortcode extends CallToAction{
	
	public function __construct(){} 
 
	public function output_shortcode($atts) {
	
		$attr = shortcode_atts( array(
			'custom_class' => false,
			'background-image' => false,
			'bgcolor' => false,
			'padding' => false,
			'headline' => false,
			'subtitle' => false,
			'button_text' => false,
			'button_link' => false,
		), $atts );
		
		$style = '';
		
		if( $attr['background-image'] ) 
			$style .= 'background-image: url('.$attr['background-image'].'); ';
		
		if( $attr['bgcolor'] ) 
			$style .= 'background-color: '.$attr['bgcolor'].'; ';
		
		if( $attr['padding'] ) 
			$style .= 'padding-top: '.$attr['padding'].'px; padding-bottom: '.$attr['padding'].'px; ';
					
		ob_start();
		?>
		
		<div class="inline-full-width <?php echo $attr['custom_class']; ?>" style="<?php echo $style; ?>">
			<h1><?php echo $attr['headline'];  ?></h1> 
			<h2><?php echo $attr['subtitle'];  ?></h2>
			<a href="<?php echo $attr['button_link'];  ?>" class="btn btn-lg btn-primary"><?php echo $attr['button_text'];  ?></a> 
		</div>
		
		<?php	
		
		$output_string = ob_get_contents();
		ob_end_clean();
	
		return $output_string;
	}


}
