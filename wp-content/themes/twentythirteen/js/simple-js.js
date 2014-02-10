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
            h = (h - detail.find('h2:first').height() - 54 - 40);
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
          i.addClass('shake animated');
          //i.css('background-position-y', '-50px').stop();
          //i.animate({'background-position-y': '0px'}, 200);
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
      $('#open-contact').on('click', Load.displaySay);
      $('#open-glued').on('click', Load.displayGlued);
      
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
    
    Load.msgWarn = function(txt, msg) {
      var done = true;
      if(!txt.val() || txt.val().length === 0) {
        var mess = $('<span class="span-msg" style="position: absolute; top: 0px; left: 5px; color: red; font-size:13px; font-family: \'Futura-Medium\'"></span>');
        txt.parents('span:first').append(mess.html(msg));
        done = false;
      }  
      return done;
    }
    
    function IsEmail(email) {
      var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      if(regex.test(email.val()) === false) {
        var mess = $('<span class="span-msg" style="position: absolute; top: 0px; left: 5px; color: red; font-size:13px; font-family: \'Futura-Medium\'"></span>');
        email.parents('span:first').append(mess.html("Your email is not correct!"));
        return false;
      }
      return true;
    }
    
    //say-here
    // Attach a submit handler to the form
    function loadSubmit() {
      

        $('#say-here-open').find( "form.sayFrom" ).submit(function( event ) {
         
          // Stop form from submitting normally
          event.preventDefault();
          
          var $form = $( this );
          var done = Load.msgWarn($form.find('.wpcf7-textarea'), 'You must write something on it');
          
          done &= Load.msgWarn($form.find('input.wpcf7-text'), 'You must write your name');
          
          done &= (Load.msgWarn($form.find('input.wpcf7-email'), 'You must write your email') && IsEmail($form.find('input.wpcf7-email')))
          
          
          if(done) {
            var info = $form.serialize();
            
            $.post( window.rootPath + "/contact/?" + info, function( data ) {
              Load.closeLayerThank($('#say-here-open'), 'content-say', 'say');
            });
          } else {
              setTimeout(function() {$('span.span-msg').hide(100).remove();} , 1000);
          }
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
    
    Load.closeLayerThank = function(elm, clazz1, clazz2) {
      var c = elm.find('.'+ clazz1);
      c.html('<div class="'+clazz2+'" style="text-align:center">THANK YOU</div>');
      elm.animate({'height': c.height() + 'px'}, 300, function() {setTimeout(Load.closeLayer, 1200); });
    }
    
    //open-glued
    function loadSubmitGlued() {
      $('#glued-open').find( "form.glued" ).submit(function( event ) {
        // Stop form from submitting normally
        event.preventDefault();

        var $form = $( this );
        var done = Load.msgWarn($form.find('input.wpcf7-text'), 'You must write your name');
        done &= (Load.msgWarn($form.find('input.wpcf7-email'), 'You must write your email') && IsEmail($form.find('input.wpcf7-email')));
        if(done) {
          var info = $form.serialize();
          $.post( window.rootPath + "/glued/?" + info, function( data ) {
            Load.closeLayerThank($('#glued-open'), 'content-glued', 'glued');
          });
        } else {
            setTimeout(function() {$('span.span-msg').hide(100).remove();} , 1000);
        }
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
