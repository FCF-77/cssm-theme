import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line

export default {
  namespace: "single_post",
  onEnter: function() {
    var pageTitle = document.querySelector(".single--title h1"),
      specialityCard = document.querySelector(".single--card"),
      articleDate = document.querySelector(".article--date"),
      titleSplitText = new SplitText(pageTitle, { type: "words,chars", specialChars:["ç","Ç", "ã", "Ã", "â", "Â", "ê", "Ê", "õ", "Õ"] }),
      tl = new TimelineMax();

    tl.staggerFrom(
      titleSplitText.chars,
      0.5,
      {
        y: 20,
        autoAlpha: 0,
        ease: Back.easeOut.config(1),
      },
      0.04
    )
      .staggerFrom(
        ".article--categories a",
        0.3,
        {
          y: 20,
          autoAlpha: 0,
          ease: Power3.easeOut,
        },
        0.04,
        "-=0.65"
      )
      .from(
        articleDate,
        0.5,
        { y: 15, autoAlpha: 0, ease: Power3.easeOut },
        "-=0.15"
      )
      .from(
        specialityCard,
        0.5,
        { y: 15, autoAlpha: 0, ease: Power3.easeOut },
        "-=0.15"
      );
  },
  onEnterCompleted: function() {},
  onLeave: function() {},
  onLeaveCompleted: function() {
    // The Container has just been removed from the DOM.
  },
};
