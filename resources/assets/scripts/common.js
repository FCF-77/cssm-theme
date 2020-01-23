import R from "@ariiiman/r"
import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap" // eslint-disable-line
import Scrollbar from "smooth-scrollbar"

export default function () {
  // Try to emulate hover ou touch devices
  document.addEventListener("touchstart", function () { }, true);

  // Variables
  const //html = S.Dom.html,
        body = R.Dom.body,
        isMobile = R.Snif.isMobile,
        globalWrapper = R.G.id('global-wrapper'),
        mainNav = R.G.id('main-nav'),
        mobileMenuToggle = R.G.id("mobilenav__toggle"),
        mobileMenu = R.G.id("mobilenav"),
        searchIcons  = R.G.class('search-icon'),
        searchUI = R.G.id('search-ui'),
        searchUIForm = R.G.tag('form', searchUI)[0],
        searchUIInput = R.G.tag('input', searchUI)[0],
        searchResults = R.G.id('search-results'),
        keycode = {
          'escape': 27,
          'a'     : 65,
          'z'     : 90,
          'down'  : 40,
          'up'    : 38,
          'enter' : 13,
        }

  // start the search function
  /* Walk through the entire set of items in a HTMLCollection
    by first converting it to an Array using Object.entries */
    Object.entries(searchIcons).map(( object ) => {
      R.L(object[1], 'add', 'click', () => {
          let searchIcon = object[1]
          if (searchUI.classList.contains('open')) {
              searchUI.classList.remove('open')
              searchIcon.classList.remove('open')
              TweenMax.to(searchUI, 1.2, {
                  className: "-=open",
                  y: "-100%",
                  ease: Elastic.easeOut.config(1, 0.8),
              })
          } else {
              TweenMax.to(searchUI, .8, {
                  className: "+=open",
                  y: "0%",
                  ease: Elastic.easeOut.config(1, 0.8),
              })
              searchUIInput.focus()
              searchUI.classList.add('open')
              searchIcon.classList.add('open')
          }
      })
  });

  // Prevents the form from submiting and triggers a keyup event
  R.L(searchUIForm, 'add', 'submit', (ev) => {
      ev.preventDefault()
      let keyupEvent = new Event('keyup')
      searchUIInput.dispatchEvent(keyupEvent)
  })

  R.L(searchUIForm, 'add', 'keypress', (ev) => {
      return keycode.enter != ev.keyCode
  })

  R.L(searchUIInput, 'add', 'keyup', () => {
      let val = searchUIInput.value

      if (val !== "") {
          TweenMax.to(searchResults, .5, {
              className: "+=search-loading",
              autoAlpha: 1,
              ease: Power4.easeInOut,
          })

          setTimeout(() => {

              var request = new XMLHttpRequest();
              // eslint-disable-next-line
              request.open('POST', ajax_object.ajax_url, true);
              request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
              request.onload = function () {
                  if (this.status >= 200 && this.status < 400) {
                      // If successful
                      setTimeout(() => {
                          searchResults.classList.remove('search-loading'),
                          searchResults.innerHTML = this.response
                      }, 500)
                  } else {
                      // If fail
                      console.log(this.response); // eslint-disable-line
                  }
              };
              request.onerror = function() {
                  // Connection error
              };
              // eslint-disable-next-line
              request.send('action=load_search_results&query=' + val + '&nonce=' + ajax_object.ajax_nonce);
          }, 500);
      } else {
          TweenMax.to(searchResults, .5, {
              className: "-=search-loading",
              autoAlpha: 0,
              onComplete: function() {
                  searchResults.innerHTML = ''
              },
              ease: Power4.easeInOut,
          })
      }

  })



  // Init
  //
  // custom body scroll only if device is not mobile
  let mainScrollbar = Scrollbar.init(globalWrapper, { syncCallbacks: true });
  if (isMobile === true) { mainScrollbar.destroy();} // eslint-disable-line

  //For fixed menu header and menu mobile
  mainScrollbar.addListener(function(status) {
     let offset = status.offset
    
     mainNav.style.top = offset.y + 'px';
     mainNav.style.left = offset.x + 'px';
     mobileMenu.style.top = offset.y + 'px';
     mobileMenu.style.left = offset.x + 'px';
  });

  // Desktop menu with children animation


  // Mobile menu
  function OnTransitionEnd() {
    mobileMenu.classList.remove("menu--animatable");
  }

  function toggleClassMenu() {
    mobileMenu.classList.add("menu--animatable");

    if (!mobileMenu.classList.contains("menu--visible")) {
      mobileMenu.classList.add("menu--visible");
      if (searchUI.classList.contains('open')) {
        searchUI.classList.remove('open')
        for (let i = 0; i < searchIcons.length; i++) {
          searchIcons[i].classList.remove('open')
        }
        TweenMax.to(searchUI, .8, {
            className: "-=open",
            y: "-100%",
            ease: Elastic.easeOut.config(1, 0.8),
        })
    }
    } else {
      mobileMenu.classList.remove("menu--visible");
      document
        .querySelectorAll(".menu-item-has-children.open")
        .forEach(function (item) {
          item.classList.remove("open");
          item.querySelector(".sub-menu").style.height = "0px";
        });
    }

    if (!mobileMenuToggle.classList.contains("menu--visible")) {
      mobileMenuToggle.classList.add("menu--visible");
    } else {
      mobileMenuToggle.classList.remove("menu--visible");
    }

    if (!body.classList.contains("menu--visible")) {
      body.classList.add("menu--visible");
    } else {
      body.classList.remove("menu--visible");
    }

    if (!body.classList.contains("of-hidden")) {
      body.classList.add("of-hidden");
    } else {
      body.classList.remove("of-hidden");
    }
  }

  R.L(mobileMenu, "add", "transitionend", function () {
    OnTransitionEnd();
  });

  R.L(mobileMenuToggle, "add", "click", function () {
    toggleClassMenu();
  });

  R.L(mobileMenu, "add", "click", function () {
    toggleClassMenu();
  });

  R.L(mobileMenu, "add", "touchmove", function (e) {
    //e.preventDefault();
    e.stopPropagation();
  });


}
