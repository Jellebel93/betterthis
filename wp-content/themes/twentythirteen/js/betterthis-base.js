(function($, window) {
  window.better = {
    scrollTop : function (elm) {
      if(elm === undefined || elm == null) {
        elm = $(this);
      } else {
        elm = $(elm);
      }
      var top = elm.offset().top;
      var scroller = $('html, body');
      console.log(scroller)
      var delta = (top - scroller.scrollTop());
      console.log(delta)
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
    }
    
  };
  $.fn.betterScrollTop = window.better.scrollTop;
})(jQuery, window);
