import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line

export default {
  namespace: "archive_cssm_speciality",
  onEnter: function () {
    const especialidadesRestantes = document.getElementById(
        "especialidadesRestantes"
      ),
      tl = new TimelineMax();

    tl.staggerFrom(
      [".page-title h1", ".page-title p"],
      1,
      {
        opacity: 0,
        delay: 0.2,
        y: 20,
        ease: Back.easeOut.config(1),
      },
      0.1
    ).staggerFrom(
      especialidadesRestantes.querySelectorAll(".speciality--card"),
      1,
      {
        opacity: 0,
        delay: 0.2,
        y: 20,
        ease: Back.easeOut.config(1),
      },
      0.1,
      "-=0.55"
    );
  },
  onEnterCompleted: function () { },
  onLeave: function () {

  },
  onLeaveCompleted: function () {
    // The Container has just been removed from the DOM.
  },
};