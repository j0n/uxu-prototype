(function($) {
  $(function(){
    $('.usermenu').on('mouseover touchstart', function(e){
      $(this).find('li').slideDown();
      e.preventDefault();
      e.stopPropagation();
    });
    $('.usermenu').on('mouseleave', function(){
      var self = this;
      setTimeout(function(){
        $(self).find('li:not(:first)').stop(true).slideUp();
      }, 200);
    });
    $('.uxu-mobile-menu').on('click', function(e) {
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
