(function ($) {

    $(document).on('click', '.post-info', function() {
        window.location.href = $(this).data('link');
    });

    $(document).on('mouseover', '.post-info', function() {
        $(this).addClass('opacity-hover').removeClass('opacity-out');
    });

    $(document).on('mouseout','.post-info', function() {
        $(this).addClass('opacity-out').removeClass('opacity-hover');
    });

    window.Load = {};
    window.Resize = new Array(); //push
    Load.pdTop = function () {
        var parent = $('ul.h-menu');
        var items = parent.find('li');
        var as = parent.find('a');
        var w = 0;
        for (var i = 0; i < as.length; ++i) {
            w += as.eq(i).width();
        }
        var delta = (parent.width() - w) / 2;
        var padding = delta / items.length;
        items.css('padding', '0px ' + (padding - 2) + 'px');
    }

    Load.pdHead = function () {
        var parent = $('ul.m-menu');
        var items = parent.find('li');
        var w = 120 * 4;

        var delta = ($(window).width() - w - 255) / 2;
        var margin = delta / 4;
        //	items.css('margin', '0px ' + (margin - 2) + 'px');
    }

   Load.postLoad = function () {}
    
    
    Load.onload = function() {
      //
      var nude = $('a.icon-nudege');
      var i = nude.find('i:first');
      i.on('mouseover', function() {
           i.addClass('shake animated');
          //i.css('background-position-y', '-50px').stop();
          //i.animate({'background-position-y': '0px'}, 200);
      })
      .on('mouseout', function() { 
        i.attr('class', 'text-nude'); 
      });
      
      var items = $('li.m-item');
      items.each(function(index) {
          var li = $(this);
          li.on('mouseover', function() {li.removeClass('out').addClass('over');})
            .on('mouseout', function() {li.removeClass('over').addClass('out');})
      });
      
      
      $('#open-what').on('click', Load.displayWhat);
      $('#open-contact').on('click', Load.displaySay);
      $('#open-glued').on('click', Load.displayGlued);
      
    }

    Load.nextPage = function () {
		$.ajax(location.href, {
			cache: false,
			success: function(data) {
				var new_posts = $('.post-item', data);
				var i = 0;
				$('.posts-container .post-item').each(function() {
					$(this).fadeOut(parseInt(Math.random() * 1000), function() {
						if (i < new_posts.length) {
							$(new_posts[i++]).hide().insertBefore(this)
								.fadeIn(parseInt(Math.random() * 1000), function() {
										if ($(this).hasClass('social_update'))
											$(this).imagefill();
									});
						}
						$(this).remove();
					});
				});
			},
		});
    };

    Load.loadPost = function(perPage, cateName) {
      var url_ = window.rootPath + '/posts-blog/';
      url_ += '?size=' + perPage + '&cats=' + encodeURIComponent(cateName);
      console.log(url_);
      $.ajax({
        type : "GET",
        url : url_
      }).complete(function(jqXHR) {
        if (jqXHR.readyState === 4) {
          var data = (jqXHR.responseText);
          if (data) {
            window.data= data;
            //console.log(data);
          }
        }
      });
    }
    
    Load.getLayer = function() {
      var layer = $('#layer-info');
      layer.html('<div class="bg-gray"></div>').show();
      layer.find('.bg-gray:first').on('click', Load.closeLayer).css({'width': $('html').width(), 'height' : $('html').height(), 'display' : 'block'});
      $('html').css('overflow', 'hidden');
      return layer;
    }
    
    Load.displayWhat = function() {
      var what = $('#what-info').clone();
      what.css('left', ($('html').width() - 810)/2 + 'px');
      var top = ($(window).height() - 420)/2
      if(top < 100) top = 100;
      what.css('top', top + 'px');
      Load.getLayer().append(what.show());
      what.find('.close-what').off('click').on('click', Load.closeLayer);
    }
    
    //say-here
    // Attach a submit handler to the form
    function loadSubmit() {
      $('#say-here-open').find( "form.sayFrom" ).submit(function( event ) {
       
        // Stop form from submitting normally
        event.preventDefault();
        var $form = jQuery( this );
        var info = $form.serialize();
        
        $.post( window.rootPath + "/contact/?" + info, function( data ) {
          console.log(data);
          Load.closeLayer();
        });
        
      });
    }
    Load.displaySay = function() {
      var say = $('#say-here').clone().attr('id','say-here-open');
      say.css('left', ($('html').width() - 810)/2 + 'px');
      var top = ($(window).height() - 470)/2
      if(top < 100) top = 100;
      say.css('top', top + 'px');
      Load.getLayer().append(say.show());
      say.find('.close-say').off('click').on('click', Load.closeLayer);
      
      loadSubmit();
      
    }
    
    //open-glued
    function loadSubmitGlued() {
      $('#glued-open').find( "form.glued" ).submit(function( event ) {
       
        // Stop form from submitting normally
        event.preventDefault();
        var $form = jQuery( this );
        var info = $form.serialize();
        
        $.post( window.rootPath + "/glued/?" + info, function( data ) {
          console.log(data);
          Load.closeLayer();
        });
        
      });
    }
    
    Load.displayGlued = function() {
      var glued = $('#get-glued').clone().attr('id','glued-open');
      glued.css('left', ($('html').width() - 634)/2 + 'px');
      var top = ($(window).height() - 312)/2
      if(top < 100) top = 100;
      glued.css('top', top + 'px');
      Load.getLayer().append(glued.show());
      glued.find('.close-glued').off('click').on('click', Load.closeLayer);
      
      loadSubmitGlued();
      
    }
    
    Load.closeLayer = function() {
      $('html').css('overflow', 'auto');
      $('#layer-info').hide(300).html('');
    }
    
    // load
    $(document).ready(function() {
      Load.onload(); 
    });

    // resize
    window.Resize.push(Load.pdTop);

    $(window).on('resize', function () {
        for (var i = 0; i < window.Resize.length; ++i) {
            window.Resize[i]();
        }
    });
    
    
    
    
    
  window.closeLayer = Load.closeLayer;
})(jQuery);
