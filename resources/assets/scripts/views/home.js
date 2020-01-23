import R from "@ariiiman/r";
import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line
import autocomplete from "../util/autocomplete"; // eslint-disable-line
import Scrollbar from "smooth-scrollbar";
import Swiper from "swiper";

export default {
  namespace: "home",
  onEnter: function () {
    let homepageSlider = document.getElementById("homepageSwiper"), // eslint-disable-line
      services = document.querySelectorAll(".services-list .custom-scrollbar"),
      tl = new TimelineMax();

    services.forEach(service => {
      Scrollbar.init(service, {
        speed: 0.8,
        syncCallbacks: true,
        continuousScrolling: false,
      });
    });

    autocomplete(
      document.getElementById("specialityInput"),
      document.getElementById("specialityList")
    );
    autocomplete(
      document.getElementById("examInput"),
      document.getElementById("examList")
    );
    autocomplete(
      document.getElementById("doctorInput"),
      document.getElementById("doctorList")
    );

    // homepageCardsTimeline.staggerFrom(
    //   ".homepage-selects--each",
    //   1.2,
    //   {
    //     delay: 0.2,
    //     y: 40,
    //     ease: Power3.easeOut,
    //   },
    //   0.03
    // );

    // build homepage slider
    new Swiper(homepageSlider, {
      // Optional parameters
      slidesPerView: 1,
      autoplay: {
        delay: 5000,
      },
      speed: 1000,
      loop: false,
      scrollBar: false,
      centeredSlides: true,
      observer: true,
      observeParents: true,
      observeSlideChildren: true,
      effect: "fade",
      navigation: {
        nextEl: ".homepage__swiper--next",
        prevEl: ".homepage__swiper--prev",
      },
      pagination: {
        el: ".homepage__swiper--pagination",
        type: "progressbar",
      },
      progressbarFillClass: "pagination-progress",
      watchSlidesProgress: true,
      watchSlidesVisibility: true,
      on: {
        slideChangeTransitionEnd: function () {
          tl.from(
            ".swiper-slide-active .homepage__slide--content span",
            0.8,
            { y: 15, opacity: 0, ease: Power3.easeOut },
            "+=0.15"
          )
            .staggerFrom(
              new SplitText(
                ".swiper-slide-active .homepage__slide--content h1",
                { type: "words,chars", specialChars:["ç","Ç", "ã", "Ã", "â", "Â", "ê", "Ê", "õ", "Õ"] }
              ).chars,
              0.8,
              { opacity: 0, y: 20, ease: Back.easeOut.config(1) },
              0.02
            )
            .from(
              ".swiper-slide-active .homepage__slide--content h2",
              0.8,
              { y: 15, opacity: 0, ease: Power3.easeOut },
              "-=0.65"
            );
        },
      },
    });

    // services selects
    var inputWrappers = document.querySelectorAll(".wrapper-input");
    [].forEach.call(inputWrappers, function (el) {
      R.L(el, "add", "click", function () {
        if (!this.classList.contains("open")) {
          this.classList.add("open");
          setTimeout(() => {
            this.querySelector(".services-search").focus();
          }, 500);
        } else {
          this.classList.remove("open");
          this.querySelector(".services-search").value = "";
        }
      });

      R.L(el.querySelector(".services-search"), "add", "click", function () {
        event.stopPropagation();
      });

      R.L(el.querySelector(".services-search"), "add", "focus", function () {
        el.classList.add("open");
      });
    });
  },
  onEnterCompleted: function () { },
  onLeave: function () { },
  onLeaveCompleted: function () {
    // The Container has just been removed from the DOM.
  },
};
