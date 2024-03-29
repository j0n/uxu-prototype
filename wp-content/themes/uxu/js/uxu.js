(function($) {

  $(function(){
    $('.usermenu').on('click', function(e){
      console.log('you');
      if (!$('.uxu-mobile-menu').is(":visible")) {
        $(this).find('li').toggle();
        e.preventDefault();
        e.stopPropagation();
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


/// 
(function($){
  var isScrolling = false;
  var timeout = -1;
  var $sticky = null;
  var logoY = 0;
  var isSticky = false;

  $(document).ready(function(){
    $('.logo img').on('load', function(){
      logoY = $('.logo').outerHeight(true);
    });
    if (window.screen.height > 700) {
      logoY = $('.logo').outerHeight(true) - 4;
      $sticky = $('.uxu-sticky-top');
      $(window).on('scroll', function(){
        if (!isScrolling) {
          isScrolling = true;
          scrollCheck();
        }
        clearTimeout(timeout);
        timeout = setTimeout(function(){
          isScrolling = false;
        }, 100);
      });
    }
  })
  function scrollCheck(){
    var scrollY = $(window).scrollTop();
    if (scrollY > logoY){
      $sticky.addClass('uxu-is-sticky');
      $('.uxu-sticky-tmp-dev').css({
        height: $sticky.outerHeight()
      });
    }
    else{
      $('.uxu-sticky-tmp-dev').css({
        height: 0
      });
      $sticky.removeClass('uxu-is-sticky');
    }
    if (isScrolling) {
      setTimeout(function(){
        scrollCheck();
      }, 50);
    }
  }
})(jQuery);
