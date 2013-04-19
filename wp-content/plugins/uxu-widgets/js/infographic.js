(function($){
    var goal = 100;
    var currentPos = 0;
  if (typeof UxU == 'undefined') { UxU = {}; }
  var infographic = function(){
    this.pos = 0;
    this.lap = 0;
    this.maxThreshold = 24000;
    this.v = 0;
    this.up = 0;
    this.down = 0;
    this.goal = 260;
    this.goalLap = 0;
    this.currentPos = 0;
    this.$visitors =  null;
    this.$time =  null;
    this.$knowImg = null;
    this.init();
  }
  infographic.prototype = {
    init: function(){
      var self = this;
      // check current value 
       $('.knob').knob({
         max: 360,
         min: 0,
         stopper: false,
         fgColor: '#000000',
         displayInput: false,
         width: 180,
         height: 180,
         change: function(v) {
           if (self.v > 340 && this.cv < 20) {
             self.lap++;
           }
           if (self.v < 20 && this.cv > 340) {
             if (self.lap > 0){
               self.lap--;
             }
           }
           v = this.cv;
           self.v = this.cv;
           self.update(self.v);
         }
       });
       this.$visitors =  $('.uxu-infographics-vistors');
       this.$time =  $('.uxu-infographics-time');
       this.$knowImg =  $('#knob-img');
       this.moveFoward();
    },
    update: function(v) {
      v = (this.lap * 360) + v;
      this.visitors = Math.floor(v*13.5);

      if (this.visitors > this.maxThreshold) {
        this.$visitors.html('SOLD OUT').css({
          'font-size': '4em'
        });
      }
      else {
        this.$visitors.html(this.visitors).css({
          'font-size': (1 + (v/250)) + 'em'
        });
        var sec = (v*10)*24;
        var duration = moment.duration(sec, 'seconds');
        var seconds = v%60;
        this.$time.html(1+duration._data.days + ' day ' + duration._data.hours + ' hours ' + duration._data.minutes + ' minutes ' + seconds + ' seconds');
      }
      this.$knowImg.css('-webkit-transform', 'rotate('+ v + 'deg)');
    },
    moveFoward: function() {
      var self = this;
      if (this.pos < this.goal) {
        this.pos+= 3;
        this.update(this.pos);
        $('.knob').val(this.pos).trigger('change');
        setTimeout(function(){
          self.moveFoward();
        }, 20);
      }
    }
  }
  $(function(){
    var Info = new infographic();
  });

})(jQuery)
