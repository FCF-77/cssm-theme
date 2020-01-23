import Barba from "barba.js/dist/barba.min"
import R from "@ariiiman/r"
import hoverChildren from "../util/hoverChildren";

export default function (currentStatus, oldStatus, container, newPageRawHTML) {

  

      if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
      }

      // new body classes
      let regexp = /\<body.*\sclass=["'](.+?)["'].*\>/gi, // eslint-disable-line
        match = regexp.exec(newPageRawHTML);
      if (!match || !match[1]) return;
      document.body.setAttribute("class", match[1]);

      var el = document.createElement( 'html' );
      el.innerHTML = Barba.Pjax.Dom.currentHTML;
      var newnavs = el.querySelectorAll('.nav');

      for (let i = 0; i < newnavs.length; i++) {
        const nav = newnavs[i].innerHTML;

        document.querySelectorAll('.nav')[i].innerHTML = nav
      }

      hoverChildren()

      // Mobile menu dropdown
      var mobileMenuItemWithChildren = document.querySelectorAll(
        "#mobilenav .menu-item-has-children"
      );
      [].forEach.call(mobileMenuItemWithChildren, function (
        el,
        i,
        mobileMenuItemWithChildren
      ) {
        R.L(el, "add", "click", function (e) {
          e.stopPropagation();
          el.classList.toggle("open");

          [].forEach.call(
            mobileMenuItemWithChildren,
            function (element) {
              if (element !== this) {
                element.classList.remove("open");
                element.querySelector(".sub-menu").style.height = "0px";
              }
            },
            this
          );

          var h = 0;
          var menuChildren = el.querySelectorAll(".sub-menu .menu-item");
          [].forEach.call(menuChildren, function (element) {
            h += element.offsetHeight;
          });

          if (el.classList.contains("open")) {
            el.querySelector(".sub-menu").style.height = h + "px";
          } else {
            el.querySelector(".sub-menu").style.height = "0px";
          }
        });
      });
}