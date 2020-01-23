import R from "@ariiiman/r"

export default function hoverChildren() {

    const menuItemsWithChildren = R.G.class('menu-item-has-children', R.G.id('nav-primary'));

    [].forEach.call(menuItemsWithChildren, function (el) {
      let submenuTimeline = new TimelineMax({ paused: true })


      submenuTimeline.to(el.querySelector(".sub-menu"), 0.2, {
        autoAlpha: 0,
        css: {
          y: '65px',
        },
        ease: Power3.easeOut,
      });

      el.animation = submenuTimeline;

      R.L(el, "add", "mouseover", function () {
        el.classList.add("submenu-open");
        submenuTimeline.play();
      });

      R.L(el, "add", "mouseout", function () {
        el.classList.remove("submenu-open");
        submenuTimeline.reverse();
      });
    });
  }