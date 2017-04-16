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
	
	wp.customize( 'banner_text_align', function( value ) {
		value.bind( function( newval ) {			
			$jumbotron.css( 'text-align', newval );
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
	
		
	$calltoaction = $('.call-to-action');
	
	// call to action button
	wp.customize( 'callto_btn_text', function( value ) {
		value.bind( function( newval ) {			
			$calltoaction.find('.call-btn').text( newval );
		} );
	} );
	
	// call to action 
	wp.customize( 'callto_text', function( value ) {
		value.bind( function( newval ) {			
			$calltoaction.find('.call-title').text( newval );
		} );
	} );
	
	
	
} )( jQuery );