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
