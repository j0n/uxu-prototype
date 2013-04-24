(function($){
  if (typeof UxU.utils !== 'undefined') {
    $('#uxu-ticket-status-festival-length').html(UxU.utils.durationFromVisitors(info.tickets_sold));
  }
})(jQuery);
