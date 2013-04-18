(function($){
    var goal = 100;
    var currentPos = 0;
  if (typeof UxU == 'undefined') { UxU = {}; }
  var infographic = function(){
    this.pos = 0;
    this.v = 0;
    this.up = 0;
    this.down = 0;
    this.goal = 260;
    this.currentPos = 0;
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
           
           if(self.v > this.cv){
             if(self.up){
               //decr();
               up=0;
             }else{self.up=1;self.down=0;}
           } else {
             if(self.v < this.cv){
               if(self.down){
                 //incr();
                 self.down=0;
               }else{self.down=1;up=0;}
             }
           }
           v = this.cv;
           self.v = this.cv;
           self.update(self.v);
         }
       });
       this.moveFoward();
    },
    update: function(v) {
      $('.uxu-infographics-tickets').html(v).css({
        'font-size': v/100 + 'em'
      });
      $('#knob-img').css('-webkit-transform', 'rotate('+ v + 'deg)');
    },
    moveFoward: function() {
      var self = this;
      if (this.pos < this.goal) {
        this.pos+= 1;
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
