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
      console.log('eventes');
      $('.menu-item').on('click', function(e) {
        e.stopPropagation();
        if ($(this).find('.sub-menu').length > 0) {
          $(this).toggleClass('current-sub-menu');
          $('current-sub-menu').removeClass('current-sub-menu');
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
