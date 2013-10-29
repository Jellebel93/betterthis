(function($, window) {
  var better = {
    currentFadeInt : null,
    scrollTop : function (elm) {
      if(elm === undefined || elm == null) {
        elm = $(this);
      } else {
        elm = $(elm);
      }
      var top = elm.offset().top;
      var scroller = $('html, body');
      var delta = (top - jQuery(window).scrollTop());
      if(delta < 0) {
        delta = delta*(-1);
      }
      speed = delta / 2;

      var aniOpts = {
          duration: speed,
          easing: '',
          complete: function() {
            
          }
        };
      scroller.stop().animate({scrollTop : top + 'px'}, aniOpts);
      return elm;
    },
    nextOrFirst : function(selector) {
      var next = this.next(selector);
      return (next.length) ? next : this.prevAll(selector).last();
    },
    fadeInOut : function(parent) {
        parent.find('.fadein:first').find('.active:first').fadeOut().removeClass("active").nextOrFirst('li').addClass("active").fadeIn().end()
    },
    initFadeInOut : function(elm) {
      //
      if(elm.css('display') !== 'block') {
        elm.parents('.list-item-content:first').find('.prActive:first').removeClass('prActive').hide('slow');
      }
      elm.css('visibility', 'hidden').addClass('prActive').show();
      var mW = elm.width();
      console.log(elm.find('.thumnail:first').width());
      elm.find('.content-data:first').width((mW - elm.find('.thumnail:first').width() - 24) + 'px');
      elm.find('.fadein:first').find('li').hide();
      elm.find('.fadein:first').find('li:first').addClass('active').css('display', 'list-item');
      elm.hide().css('visibility', 'visible').show('slow');
      //
      window.currentFade = elm;
      if(better.currentFadeInt !== null) {
        window.clearInterval(better.currentFadeInt);
      }
      better.currentFadeInt = setInterval(function() {better.fadeInOut(window.currentFade);}, 6000);
    },
    scrollProcess : function(elm, evt) {
      evt.stopPropagation();
      evt.preventDefault();
      var id = elm.attr('href');
      $(id).betterScrollTop(); 
      window.location.hash = id;
    }
    
  };

  window.better = better;
  
  $(document).ready(function(){
    // scroll menu
    $('a[href^=#section]').off('click').on('click',  function(e) {window.better.scrollProcess($(this), e);});
    $('a[href=#page]').off('click').on('click',  function(e) {window.better.scrollProcess($(this), e);});
    
    // scroll item
    $('.sectionItem').on('click', 
      function(e){
        e.stopPropagation();
        e.preventDefault();
        var elm = $(this);
        var id = $(elm).data('id');
        var blItem = $('#'+id);
        window.better.initFadeInOut(blItem);
        var thumb = $('#section3').betterScrollTop().find('.list-item-thumb'); 
        thumb.find('li').show();
        thumb.find('#thumnail_'+id).hide();
      });
    
   // init
   window.better.initFadeInOut($('#section3').find('.list-item-content:first').find('.main-frame:first'));
   
  });
  
  
  


  
  $.fn.nextOrFirst = window.better.nextOrFirst;
  $.fn.betterScrollTop = window.better.scrollTop;
})(jQuery, window);
