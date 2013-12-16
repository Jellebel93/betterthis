/**
 * Functionality specific to Twenty Thirteen.
 *
 * Provides helper functions to enhance the theme experience.
 */

( function( $ ) {

	window.wH = $(window).height() - 10;

$( function() {
		$(".portfolio-box ").each(function () {

    var $source = $(this).find('.watch-action');
    var $destination = $(this).find('.social');
   $destination.prepend($source.clone());
   $source.remove();
});
	} );

	
	$( function() {
		
	activeItem = $("#section4 .data-content ul li:first-child").addClass('active');
    //$(activeItem).addClass('active');
 
    $("#section4 .data-content ul li").click(function(){
		content=$(this).find('span').html();		
        $(activeItem).animate({width: "50px"}, {duration:300, queue:false});
        $(this).animate({width: "676px"}, {duration:300, queue:false});
		 $(this).parent('ul').next().html(content);
      //  $(this).addClass('active');
       activeItem = this;
    });
	
	$('div.container-body:first').css('min-height', function() { 
			var del = 25 + 230 + 83;
			var wH = $(window).height() - del;
			return (wH > 300) ? wH : 300;
		}
	);
	
		
	var parent3 = $('#section3');
  if(parent3.length > 0) {
    var mH = (wH > 646) ? wH : 646;
    if(mH > 760) mH = 760;
    var del = parent3.find('.main-frame').find('.top-content').height() + 17;
    parent3.find('.main-frame').find('.dot-lengthwise').css('min-height', (mH - del) + 'px');
    
    parent3.find('.list-item-thumb').css('min-height', (mH) + 'px').css('max-height', '760px');
    parent3.find('.wrap-section3').css('min-height', (mH) + 'px').css('max-height', '760px');
    parent3.find('.wrap-section3').find('.slider-container').css('height', (mH) + 'px').css('max-height', '760px');
    parent3.css('max-height', '760px');
  }
 
	
	} );

	
} )( jQuery );
