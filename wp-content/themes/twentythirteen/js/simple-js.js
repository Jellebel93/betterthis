(function ($) {
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

    Load.postLoad = function () {
        var parent = $('.post-container');
        var leftImg = parent.find('.right-image:first');
        leftImg.find('img').load(function () {
            $(this).css({
                height: parent.find('.left-detail-post').outerHeight() + 'px',
                width: leftImg.width() + 'px'
            })
        });
    }
    
    
    Load.onload = function() {
      //for tags a
      var as = $('a');console.log(as.length);
      as.each(function(index) {
          var a = $(this);
          if(a.find('i').length === 1 || a.find('img').length === 1) {
            a.addClass('opacity');
          }
        
      });
      
		
    }

    Load.nextPage = function () {
      var host = window.location.href;
      if(window.location.reload) {
        window.location.reload();
      } else {
        window.location.href = host;
      }
    }

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
            console.log(data);
          }
        }
      });
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
})(jQuery);
