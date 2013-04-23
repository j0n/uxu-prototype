(function($){
  if (typeof UxU == 'undefined') { UxU = {}; }
  var infographic = function(){
    this.pos = 0;
    this.lap = 0;
    this.maxThreshold = 24000;
    this.movingForward = true;
    this.v = 0;
    this.changed = false;
    this.checkValue = 0;
    this.goalVisitor = info.tickets_sold * 1;
    this.visitors = 0;
    this.goalLap = 0;
    this.$rightNow = null;
    this.$knob = null;
    this.$visitors =  null;
    this.$time =  null;
    this.$knowImg = null;
    this.$stage = null;
    this.bgSteps = {
      3000: {
        img : '2_anim.png',
        visible: false
      },
      6000: {
        img : '3_anim.png',
        visible: false
      },
      10000: {
        img : '4_anim.png',
        visible: false
      }
    }

    this.peopleSteps = {
      1300 : {
        img : 'figur1.png',
        visible: false
      },
      2000: {
        img : 'figur2.png',
        visible: false
      },
      2500: {
        img : 'figur3.png',
        visible: false
      },
      4000: {
        img : 'figur4.png',
        visible: false
      },
      6000: {
        img : 'figur5.png',
        visible: false
      },
      8000: {
        img : 'figur6.png',
        visible: false
      }
    }
    this.init();
  }
  infographic.prototype = {
    init: function(){
      var self = this;
      // check current value 
      
      this.$knob = $('.knob');
      this.$knob.knob({
         max: 360,
         min: 0,
         stopper: false,
         fgColor: '#000000',
         displayInput: false,
         width: 180,
         height: 180,
         change: function(v) {
           // make timeout
           if (self.v > 340 && this.cv < 20) {
             self.lap++;
           }
           if (self.v < 20 && this.cv > 340) {
             if (self.lap > -1){
               self.lap--;
             }
           }
           v = this.cv;
           self.v = this.cv;
           self.update(self.v);
           if (!self.changed) {
             self.changed = true;
             setTimeout(function(){
               self.showMoreU();
             }, 200);
             setTimeout(function(){
               self.showMorePeople();
             }, 600);
           }
         }
       });
       this.$visitors =  $('.uxu-infographics-vistors');
       this.$rightNow =  $('#uxu-rightnow');
       this.$time =  $('.uxu-infographics-time');
       this.$stage =  $('.uxu-infographics-stage');
       this.$knowImg =  $('#knob-img');
       this.moveFoward();
       this.showMoreU();
       var self = this;
       setTimeout(function() {
         self.showMorePeople();
       }, 800);
    },
    update: function(v, end) {
       v = (this.lap * 360) + v;
       this.visitors = Math.floor(v*13.5);
       if (this.visitors <= this.goalVisitor && !this.movingForward) {
         this.visitors = this.goalVisitor;
         if (!this.bottom) {
           this.$rightNow.show();
           this.bottom = true;
           this.$knob.trigger( 'configure', {"fgColor":"#ff8369"});
         }
         this.$visitors.html(this.visitors);
       }
       else {
         if (this.visitors > this.goalVisitor && this.movingForward) {
           this.visitors = this.goalVisitor;
         }
         if (this.bottom) {
           this.$rightNow.hide();
           this.$knob.trigger( 'configure', { "fgColor":"#000000" });
           this.bottom = false;
         }
          if (this.visitors > 15015) {
            this.price = 1450;
          }
          else if(this.visitors > 0 && this.visitors < 150) {
            this.price = this.visitors;
          }
          else if(this.visitors > 150 && this.visitors < 160) {
            this.price = 295;
          }
          else if(this.visitors > 171 && this.visitors < 181) {
            this.price = 345;
          }
          else if(this.visitors > 181 && this.visitors < 196) {
            this.price = 395;
          }
          else if (this.visitors < 1500) {
            this.price = (Math.floor(this.visitors/50) * 4) + 466;
          }
          else {
            this.price = (Math.floor(this.visitors/100) * 4) + 466;
          }
          if (this.visitors > this.maxThreshold) {
            this.$visitors.html('SOLD OUT');
          }
          else {
            this.$time.html(UxU.utils.durationFromVisitors(this.visitors));
            this.$visitors.html(this.visitors);
          }
          $('#uxu-infographics-price').html(this.price);
          this.$knowImg.css('-webkit-transform', 'rotate('+ v + 'deg)');
        }
    },
    moveFoward: function() {
      var self = this;
      if (this.visitors < this.goalVisitor) {
        this.pos+= 3;
        this.update(this.pos);
        $('.knob').val(this.pos).trigger('change');
        setTimeout(function(){
          self.moveFoward();
        }, 20);
      }
      else {
        this.update(this.pos, true);
        this.movingForward = false;
        this.bottom = true;
      }
    },
    showMoreU: function(){
      for (limit in this.bgSteps) {
        if (limit < this.visitors && !this.bgSteps[limit].visible) {
          var step = this.$stage.find('#bgStep-'+limit)
          if (step.length < 1) {
            this.$stage.append('<div class="bgStep" id="bgStep-'+limit+'"><img src="'+info.imgPath+this.bgSteps[limit].img+'" /></div>');
            step = this.$stage.find('#bgStep-'+limit)
          }
          step.fadeIn(4000);
          this.bgSteps[limit].visible = true;
        }
        else if (limit > this.visitors && this.bgSteps[limit].visible) {
          this.$stage.find('#bgStep-'+limit).fadeOut(1000,function(){
            $(this).remove();
          });
          this.bgSteps[limit].visible = false;
        }
      }
      var self = this;
      if (this.checkValue != this.visitors) {
        this.changed = false;
        setTimeout(function(){
          self.showMoreU();
        }, 100);
      }
      this.checkValue = this.visitors;
    },
    showMorePeople: function(){
      for (limit in this.peopleSteps) {
        if (limit < this.visitors && !this.peopleSteps[limit].visible) {
          var step = this.$stage.find('#peopleStep-'+limit)
          if (step.length < 1) {
            this.$stage.append('<div class="peopleStep" id="peopleStep-'+limit+'"><img src="'+info.imgPath+this.peopleSteps[limit].img+'" /></div>');
            step = this.$stage.find('#peopleStep-'+limit)
          }
          this.peopleSteps[limit].visible = true;
        }
        else if (limit > this.visitors && this.peopleSteps[limit].visible) {
          this.$stage.find('#peopleStep-'+limit).remove();
          this.peopleSteps[limit].visible = false;
        }
      }
      var self = this;
      if (this.checkValue != this.visitors) {
        this.changed = false;
        setTimeout(function(){
          self.showMorePeople();
        }, 300);
      }
      this.checkValue = this.visitors;
    },
  }
  $(function(){
    var Info = new infographic();
  });

})(jQuery)
