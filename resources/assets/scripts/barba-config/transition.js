import Barba from "barba.js/dist/barba.min"
import { TweenMax } from "gsap"
import R from "@ariiiman/r"
import Scrollbar from "smooth-scrollbar"

export default {
    start: function() {
        /**
         * This function is automatically called as soon the Transition starts
         * this.newContainerLoading is a Promise for the loading of the new container
         * (Barba.js also comes with an handy Promise polyfill!)
         */

        // As soon the loading is finished and the old page is faded out, let's fade the new page
        Promise
          .all([this.newContainerLoading, this.fadeOut()])
          .then(this.fadeIn.bind(this));
      },

      fadeOut: function() {
        var deferred = Barba.Utils.deferred();
        /**
         * this.oldContainer is the HTMLElement of the old Container
         */
        TweenMax.fromTo(this.oldContainer, 0.5, { autoAlpha: 1 }, {
            autoAlpha: 0,
            ease: Power2.easeOut,
            onComplete: function() {
                deferred.resolve();
            },
        });

        return deferred.promise;
      },

      fadeIn: function() {
        /**
         * this.newContainer is the HTMLElement of the new Container
         * At this stage newContainer is on the DOM (inside our #barba-container and with visibility: hidden)
         * Please note, newContainer is available just after newContainerLoading is resolved!
         */

         const  isMobile = R.Snif.isMobile,
                globalWrapper = R.G.id('global-wrapper'),
                mainScrollbar = Scrollbar.get(globalWrapper);


        TweenMax.set(this.oldContainer,{autoAlpha:0,display:'none'});
        var _this = this;


        TweenMax.fromTo(this.newContainer,0.5,{autoAlpha:0},{
            autoAlpha:1,
            ease:Power2.easeOut,
            onStart:function(){
                if (isMobile === false && Scrollbar.has(globalWrapper)) {
                    mainScrollbar.setPosition(0, 0);
                } else if(isMobile) {
                    R.ScrollZero()
                }
            },
            onComplete:function(){
                _this.done();
            },
        });
      },
}