(function($){
  UxU = UxU || {};
  UxU.SubMenu = function() {
    this.init();
    this.events();
  }
  UxU.SubMenu.prototype = {
    init: function(){
    }, 
    events: function(){
      $('.menu-item').on('click', function(e) {
        e.stopPropagation();
        $('.sub-menu').hide();
        if ($(this).find('.sub-menu').length > 0) {
          if ($(this).hasClass('current-sub-menu')) {
            $('.current-sub-menu').removeClass('current-sub-menu');
          }
          else {
            $(this).toggleClass('current-sub-menu');
          }
          $(this).find('.sub-menu').toggle();
          e.preventDefault();
        }
      });
    }
  }
  $(document).on('ready', function(){
    var subMenu = new UxU.SubMenu();
  });
})(jQuery);
