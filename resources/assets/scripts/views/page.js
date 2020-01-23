import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line

export default {
  namespace: "page",
  onEnter: function() {
    var pageTitle = document.querySelector(".page-title.default-page h1"),
      titleSplitText = new SplitText(pageTitle, { type: "words,chars", specialChars:["ç","Ç", "ã", "Ã", "â", "Â", "ê", "Ê", "õ", "Õ"]}),
      pageContent = document.querySelector(".page .block--content"),
      tl = new TimelineMax();

    tl.staggerFrom(
      titleSplitText.chars,
      0.8,
      {
        opacity: 0,
        y: 20,
        ease: Back.easeOut.config(1),
      },
      0.015
    ).from(
      pageContent,
      1,
      { y: 15, autoAlpha: 0, ease: Power3.easeOut },
      "-=0.35"
    );
  },
  onEnterCompleted: function() {},
  onLeave: function() {},
  onLeaveCompleted: function() {
    // The Container has just been removed from the DOM.
  },
};
