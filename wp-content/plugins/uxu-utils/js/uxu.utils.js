(function(){
  if (typeof UxU == 'undefined') { UxU = {}; }
  UxU.utils = {
    durationFromVisitors: function (visitors) {
      return this.durationFromSecs(visitors * 15);
    },
    durationFromSecs: function(sec) {
      var duration = moment.duration(sec, 'seconds');
      var seconds = sec%60;
      var tmpFormated = '';
      if (duration._data.days == 1){
        tmpFormated += duration._data.days + ' dag ';
      }
      else if (duration._data.days > 1) {
        tmpFormated += duration._data.days + ' dagar ';
      }
      return tmpFormated + duration._data.hours + ' timmar ' + duration._data.minutes + ' minuter ' + seconds + ' sekunder';
    }
  }
})();
