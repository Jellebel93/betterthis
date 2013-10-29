/**
 * Functionality specific to Twenty Thirteen.
 *
 * Provides helper functions to enhance the theme experience.
 */

( function( $ ) {

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
		
	} );
	
	
$.fn.nextOrFirst = function(selector) {
    var next = this.next(selector);
    return (next.length) ? next : this.prevAll(selector).last();
}

$(function() {
    $('.fadein li:eq(0)').addClass("active");
    $('.fadein li:gt(0)').hide();
    setInterval(function() {
        $('.active:eq(0)').fadeOut().removeClass("active").nextOrFirst('li').addClass("active").fadeIn().end()
    }, 6000);
});


	

} )( jQuery );