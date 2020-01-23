import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line
import SplitText from "../util/SplitText.min";


export default {
  namespace: "template-unidadepediatria",
  onEnter: function() {
    var pageTitle = document.querySelector(".single--title h1"),
        icon_esp = document.querySelector(".icon_esp"),
        sub_title = document.querySelector(".sub_title"),
        specialityCard = document.querySelector(".single--card"),
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
            0.07
        )
          .from(
            icon_esp,
            0.7,
            { opacity: 0, ease: Power3.easeIn },
            1
          )
          .from(
            sub_title,
            0.7,
            { opacity: 0, ease: Power3.easeIn },
            1
          )
          .from(
            specialityCard,
            0.5,
            { y: 15, autoAlpha: 0, ease: Power3.easeOut },
            "-=0.1"
          )
          .staggerFrom(
            ".single--card__column",
            0.8,
            {
            opacity: 0,
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
