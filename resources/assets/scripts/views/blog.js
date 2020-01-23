import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line

export default {
  namespace: "index",
  onEnter: function() {
    var pageTitle = document.querySelector(".page-title h1"),
      newsCard = document.querySelectorAll(".news__article"),
      tl = new TimelineMax();

    tl.from(pageTitle, 0.5, {
      y: 15,
      autoAlpha: 0,
      ease: Power3.easeOut,
    }).staggerFrom(
      newsCard,
      1,
      {
        opacity: 0,
        delay: 0.2,
        y: 20,
        ease: Back.easeOut.config(1),
      },
      0.1,
      "-=0.35"
    );
  },
  onEnterCompleted: function() {},
  onLeave: function() {},
  onLeaveCompleted: function() {},
};
