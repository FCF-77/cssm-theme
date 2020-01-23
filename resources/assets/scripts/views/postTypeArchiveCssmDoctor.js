import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line

export default {
  namespace: "archive_cssm_doctor",
  onEnter: function () {
    var tl = new TimelineMax();

    tl.staggerFrom(
      [".page-title h1", ".page-title h2", ".page-title p"],
      1,
      {
        opacity: 0,
        delay: 0.2,
        y: 20,
        ease: Back.easeOut.config(1),
      },
      0.1
    )
      // .from(pageTitle, 0.7, {y: 15, autoAlpha: 0, ease:Power3.easeOut}, '-=0.15')
      .staggerFrom(
        ".doctor",
        1,
        {
          opacity: 0,
          delay: 0.2,
          y: 20,
          ease: Back.easeOut.config(1),
        },
        0.1
      );
  },
  onEnterCompleted: function () {

  },
  onLeave: function () { },
  onLeaveCompleted: function () {
    // The Container has just been removed from the DOM.
  },
};
