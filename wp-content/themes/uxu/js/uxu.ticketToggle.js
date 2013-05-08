(function($){
  UxU = UxU || {};
  UxU.TicketToggle = function() {
    this.init();
  }
  UxU.TicketToggle.prototype = {
    init: function() {
      var cookie = $.cookie('mini');
      if (typeof cookie !== 'undefined') {
        if (cookie == 1) {
          this.toggle(true, true);
        }
      }
      else {
        if (window.location.href.indexOf('/me') > -1) {
          this.toggle(true, true);
        }
        if (window.location.href.indexOf('/your-profile') > -1) {
          this.toggle(true, true);
        }
      }
      this.events();
    },
    events: function() {
      var self = this;
      $('.uxu-ticket-status-minimize').on('click', function() {
        self.toggle(true);
      });
      $('.uxu-ticket-status-mini').on('click', function() {
        self.toggle(false);
      });
    },
    toggle: function(minimize, noAnimate){
      if (minimize) {
        $.cookie('mini', '1');
        if (typeof noAnimate !== 'undefined') {
          $('.uxu-ticket-status').css({
            'padding-top': '0.5em',
            'padding-bottom': '0.5em'
          })
          $('.uxu-ticket-status-full').hide();
          $('.uxu-ticket-status-mini').show();

        }
        else {
          $('.uxu-ticket-status').animate({
            'padding-top': '0.5em',
            'padding-bottom': '0.5em'
          })
          $('.uxu-ticket-status-full').slideUp();
          $('.uxu-ticket-status-mini').slideDown();
        }
      }
      else {
        $.removeCookie('mini');
        $('.uxu-ticket-status').animate({
          'padding-top': '1.5em',
          'padding-bottom': '1.5em'
        })
        $('.uxu-ticket-status-full').slideDown();
        $('.uxu-ticket-status-mini').slideUp();
      }
    }
  }
  $(document).on('ready', function(){
    var togglre = new UxU.TicketToggle();
  });
})(jQuery)
