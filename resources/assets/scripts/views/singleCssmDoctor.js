import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line

export default {
  namespace: "single_cssm_doctor",
  onEnter: function() {
    const pageTitle = document.querySelector(".single--title h1"),
      breadcrumbs = document.querySelector(".single--title .breadcrumbs"),
      specialityCard = document.querySelector(".single--card"),
      titleSplitText = new SplitText(pageTitle, { type: "words,chars", specialChars:["ç","Ç", "ã", "Ã", "â", "Â", "ê", "Ê", "õ", "Õ"]}),
      doctorThumb = document.querySelector(".doctor--image"),
      doctorThumbInner = document.querySelector(".doctor--image__inner"),
      tl = new TimelineMax();

    tl.from(
      doctorThumb,
      0.6,
      { y: 15, autoAlpha: 0, ease: Power3.easeOut },
      "-=0.15"
    )
      .from(
        doctorThumbInner,
        0.6,
        { y: 120, autoAlpha: 0, ease: Power3.easeOut },
        "-=0.25"
      )
      .from(
        breadcrumbs,
        0.7,
        { y: 15, autoAlpha: 0, ease: Power3.easeOut },
        "-=0.40"
      )
      .from(
        specialityCard,
        0.7,
        { y: 15, autoAlpha: 0, ease: Power3.easeOut },
        "-=0.60"
      );

    TweenMax.staggerFrom(
      titleSplitText.chars,
      0.8,
      {
        opacity: 0,
        y: 20,
        ease: Back.easeOut.config(1),
      },
      0.015
    );

    TweenMax.staggerFrom(
      ".single--card__column",
      0.8,
      {
        opacity: 0,
        delay: 0.5,
        y: 20,
        ease: Back.easeOut.config(1),
      },
      0.3
    );
  },
  onEnterCompleted: function() {},
  onLeave: function() {},
  onLeaveCompleted: function() {
    // The Container has just been removed from the DOM.
  },
};
