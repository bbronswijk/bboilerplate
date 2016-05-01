/**
 * @author bramb
 */
( function( $ ) {
	
	$jumbotron = $('.jumbotron');
	
	// banner image
	wp.customize( 'banner_image', function( value ) {
		value.bind( function( newval ) {			
			$jumbotron.css('background-image', 'url('+newval+')' );
		} );
	} );
	
	wp.customize( 'banner_headline', function( value ) {		
		value.bind( function( newval ) {	
			$jumbotron.find('h1').text( newval );
		});
	});
	
	wp.customize( 'banner_subtitle', function( value ) {
		value.bind( function( newval ) {			
			$jumbotron.find('p').text( newval );
		} );
	} );
	
	wp.customize( 'banner_text_btn', function( value ) {
		value.bind( function( newval ) {			
			$jumbotron.find('a').text( newval );
		} );
	} );
	
	// image position
	wp.customize( 'banner_position', function( value ) {
		value.bind( function( newval ) {			
			$jumbotron.css('background-position', newval );
		} );
	} );
		
	// text color banner
	wp.customize( 'banner_textcolor', function( value ) {
		value.bind( function( newval ) {
			$jumbotron.find('h1').css('color', newval  );
			$jumbotron.find('p').css('color', newval  );
		} );
	} );
	
	// text color banner
	wp.customize( 'banner_textshadow', function( value ) {
		value.bind( function( newval ){
			$jumbotron.find('h1').css('text-shadow', 'none'  );
			$jumbotron.find('p').css('text-shadow', 'none'  );
		} );
	} );
	
	// phonenumber header
	wp.customize( 'promo_phone', function( value ) {
		value.bind( function( newval ) {
			if( newval.length ){
				$('.header-phone').closest('a').show();
				$('.header-phone').text( newval );
			} else{
				$('.header-phone').closest('a').hide();
			}		
			
		} );
	} );
	
	// email header
	wp.customize( 'promo_email', function( value ) {
		value.bind( function( newval ) {				
			if( newval.length ){
				$('.header-email').closest('a').show();
				$('.header-email').text( newval );
			} else{
				$('.header-email').closest('a').hide();
			}
		} );
	} );
	
	
	
	
} )( jQuery );