(function($) {
  $(function(){
    $('.usermenu').on('mouseover touchstart', function(e){
      if (!$('.uxu-mobile-menu').is(":visible")) {
        $(this).find('li').slideDown();
        e.preventDefault();
        e.stopPropagation();
      }
    });
    $('.usermenu').on('mouseleave', function(){
      var self = this;
      if (!$('.uxu-mobile-menu').is(":visible")) {
        setTimeout(function(){
          $(self).find('li:not(:first)').stop(true).slideUp();
        }, 200);
      }
    });
    $('.uxu-mobile-menu').on('click', function(e) {
      $('.usermenu li').show();
      $('.header-menu').slideToggle(function(){
        if (!$(this).is(":visible")) {
          $(this).attr('style', '');
        }
      });
      e.preventDefault();
      e.stopPropagation();
    });
  });
})(jQuery);


(function($){

  var isScrolling = false;
  var timeout = -1;
  var $sticky = null;
  var logoY = 0;

  $(document).ready(function(){
    if (window.screen.height > 700) {
      logoY = $('.logo').outerHeight(true);
      $sticky = $('.uxu-sticky-top');

      $(window).on('scroll', function(){
        if (!isScrolling) {
          isScrolling = true;
          scrollCheck();
        }
        clearTimeout(timeout);
        timeout = setTimeout(function(){
          isScrolling = false;
        }, 250);
      });
    }
  })
  function scrollCheck(){
    var scrollY = $(window).scrollTop();
    if (scrollY > logoY) {
      $sticky.addClass('uxu-is-sticky');
    }
    else {
      $sticky.removeClass('uxu-is-sticky');
    }
    if (isScrolling) {
      setTimeout(function(){
        scrollCheck();
      }, 200);
    }
  }
})(jQuery);
