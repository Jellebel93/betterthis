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
        var detail = parent.find('.left-detail-post:first');
        var leftImg = parent.find('.right-image:first');
        var w = leftImg.width();
        leftImg.find('img').load(function () {
            $(this).css({
               width: w + 'px'
            });
            var h = $(this).height();
            detail.css('height', h + 'px');
            var post = detail.find('.post-content');
            h = (h - detail.find('h2:first').height() - 54);
            if(post.height() > h) {
              post.css('height', h + 'px')
                  .css('overflow-y', 'auto');
            }
        });
        //leftImg.css('height', h + 'px');
        
    }
    
    
    Load.onload = function() {
      //
      var nude = $('a.icon-nudege');
      var i = nude.find('i:first');
      i.on('mouseover', function() {
          i.css('background-position-y', '-50px').stop();
          i.animate({'background-position-y': '0px'}, 200);
      });
      
      var posts = $('.post-info');
      posts.each(function(index) {
          var p = $(this);
          p.on('mouseover', function() { p.addClass('opacity-hover').removeClass('opacity-out'); })
           .on('mouseout', function() { p.addClass('opacity-out').removeClass('opacity-hover'); })
           .on('click', function() {window.location.href = $(this).attr('data-link');})
      });
      
      var items = $('li.m-item');
      items.each(function(index) {
          var li = $(this);
          li.on('mouseover', function() {li.removeClass('out').addClass('over');})
            .on('mouseout', function() {li.removeClass('over').addClass('out');})
      });
      
      
      $('#open-what').on('click', Load.displayWhat);
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
    
    
    
    
    
   // window.Load = Load;
    
})(jQuery);
