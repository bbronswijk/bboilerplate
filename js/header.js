/**
 * @author bramb
 */
jQuery(document).ready(function($) {
	
	$jumbotron = $('.jumbotron');
	$jumbotron.find('p,h1').delay(500).show();
	$jumbotron.find('.btn').delay(500).css('display','inline-block');
	
	/* SCROLLING */
	$header = $('header');
	$adminbar = $('#wpadminbar');
	$logoLink = $header.find('.logo-link');
	$nav = $header.find('#navbar');
	
	maxScroll = 75;

	var offsetTop = 0;

	
	scrollCheck();

	function scrollCheck() {
		
		if ($adminbar.is(':visible')) {
			offsetTop = parseInt( $adminbar.css('height') );
		}

		
		var scrollTop = parseInt( $(window).scrollTop() );
		var positionHeader = parseInt( $header.css('top') );

			if ( scrollTop > maxScroll ) {
				if (positionHeader == offsetTop) {	
					if($(window).width() > 768 ){
						$header.animate({top: offsetTop - 50 +'px'},200);
						$nav.animate({margin: '10px 0'},200);
						$logoLink.animate({height: '70px'},200);
					}				
				}
			} else {
				if (positionHeader != offsetTop) {
					$header.animate({top: offsetTop + 'px'},200);
					$nav.animate({margin: '25px 0'},200);
					$logoLink.animate({height: '100px'},200);
				}
			}

	}
	
	
	$(window).scroll(function(e) {
		scrollCheck();
	});

	$(window).resize(function() {
		scrollCheck();
	});

});
