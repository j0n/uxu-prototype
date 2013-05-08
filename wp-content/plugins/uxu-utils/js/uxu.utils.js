(function(){
  if (typeof UxU == 'undefined') { UxU = {}; }
  UxU.utils = {
    durationFromVisitors: function (visitors) {
      return this.durationFromSecs(visitors * 15);
    },
    durationFromSecs: function(sec) {
      sec += 4 * 3600;
      var duration = moment.duration(sec, 'seconds');
      var seconds = sec%60;
      if (duration._data.days > 0) {
        duration._data.hours += (duration._data.days * 24)
      }
      return duration._data.hours + ' timmar ' + duration._data.minutes + ' minuter ' + seconds + ' sekunder';
    }
  }
})();
