import verge from "verge/verge.js"
import R from "@ariiiman/r"
import { get } from "../util/request"

export default function search() {
    // Variables
    let body = R.Dom.body,
        $_window = $(window), // eslint-disable-line
        mainHeader = R.G.id("main-nav"),
        searchForm = R.G.id("searchform"),
        suggestionItem = document.querySelector(".suggestion-item a"),
        searchWrapper = R.G.id("search-wrapper"),
        searchIcon = R.G.id("search-icon"),
        searchWrapperOverlay = searchWrapper.querySelector('.overlay'),
        searchInput = R.G.id("s"), // eslint-disable-line
        suggestionWrapper = R.G.id("suggestions-wrapper"),
        allResultsWrapper = R.G.id("all-results-wrapper"),
        suggestionScroll = R.G.id("suggestions-scroll"),
        searchCopyAll = R.G.id("search-copy-all"),
        searchCopySingle = R.G.id("search-copy-single"),
        searchKey = R.G.id("search-key"),
        post_type1 = "cssm_speciality",
        //post_type2 = "cssm_exam",
        //post_type3 = "cssm_doctor",
        //post_type4 = "post",
        index = -1, // eslint-disable-line
        //terms,
        key_count = (searchWrapper, searchIcon, 0), // eslint-disable-line
        value = "100px", // eslint-disable-line
        value_col = "20px"; // eslint-disable-line

    const keycode = {
        'escape': 27,
        'a'     : 65,
        'z'     : 90,
        'down'  : 40,
        'up'    : 38,
        'enter' : 13,
    }

    function outerHeightWithMargin(el) {
        var height = el.offsetHeight;
        var style = getComputedStyle(el);

        height += parseInt(style.marginTop) + parseInt(style.marginBottom);
        return height;
    }

    //Get data from CSSM and populate the Search UI
    get("/wp-json/cssm/v1/search", (data) => {
        var json = data,
            cssmSpecialities = json["cssm_speciality"]["posts"];
            // cssmDoctors = json["cssm_doctor"]["posts"],
            // cssmExams = json["cssm_exam"]["posts"],
            // cssmPosts = json["post"]["posts"];

        console.log(json);
        R.L(document, "add", "keydown", (ev) => {
            // If the Search UI is open, close it when pressed escape
            if (body.classList.contains("js-search-open"))
                keycode.escape == ev.which && searchIcon.click();
            else {
                if (ev.ctrlKey || ev.metaKey) return;

                // Click Search if keydown is between A and Z
                if (keycode.a <= ev.which && ev.which <= keycode.z) {
                    if ($("#main input, #main textarea").is(":focus")) return;
                    searchIcon.click();
                }
            }
        });

        // When the user types in the search input
        R.L(searchInput, "add", "keyup", (ev) => {
            if (ev.which != keycode.escape) {
                let scrollHeight = 0;

                // 1 - Remove all previous prepended li items
                suggestionWrapper.querySelectorAll("li").forEach(e => e.parentNode.removeChild(e))

                let originalVal = searchInput.value,
                    val = originalVal.toLowerCase();

                if (val) {
                    TweenMax.to(searchKey.closest("#all-results-wrapper"), 0.3, {
                        autoAlpha: 1,
                        pointerEvents: "all",
                    });

                    cssmSpecialities.forEach( (item) => {
                        let title = item.title.toLowerCase(),
                            link  = item.link;

                            if (title.indexOf(val)) {
                                let regex = new RegExp(val, "gi"),
                                    subStr = '<span class="match">' + originalVal + "</span>",
                                    suggestion = item.title.replace(regex, subStr),
                                    prependEl = '<li class="' + post_type1 + '"><div class="grid-container"><div class="grid-x"><div class="xxlarge-2 xxlarge-offset-1 medium-offset-0 small-3 cell"><span class="type-title"></span></div><div class="xxlarge-12 medium-auto cell suggestion-item-wrapper"><div class="suggestion-item"><a href="' + link + '" data-title="">' + suggestion + "</a></div></div></div></div></li>";
                                    suggestionWrapper.insertAdjacentHTML ("afterbegin", prependEl);
                            }
                    });
                    suggestionWrapper.querySelector("." + post_type1 + " span").textContent = json["cssm_speciality"].post_type_title
                    let suggestedItems = suggestionWrapper.querySelectorAll("." + post_type1),
                        lastSuggestedItem = suggestedItems[suggestedItems.length -1 ]
                    lastSuggestedItem.classList.add("last")

                    if (outerHeightWithMargin(suggestionWrapper) > window.outerHeight) {
                        allResultsWrapper.classList.add("fixed-bottom")
                        suggestionWrapper.classList.add("padd-bottom")
                        suggestionScroll.style.opacity = "1"
                    } else {
                        allResultsWrapper.classList.remove("fixed-bottom")
                        suggestionWrapper.classList.remove("padd-bottom")
                        suggestionWrapper.querySelectorAll("li").forEach(e => e.parentNode.removeChild(e))
                    }


                    R.L(document, "add", "mousemove", () => {
                        body.classList.contains("js-search-open") &&
                        suggestionWrapper.querySelectorAll("li").forEach(e => e.style.pointerEvents = "all")
                    })

                    suggestionWrapper.querySelectorAll("li").forEach((item) => {
                        R.L(item, "add", "mouseenter", () => {
                            item.classList.add("selected"),
                            index = R.Index.list(item) + 1
                            searchCopyAll.style.display = "none"
                            searchCopySingle.style.display = "",
                            originalVal = suggestionWrapper.querySelector("li.selected .suggestion-item").textContent,
                            searchKey.textContent = '"' + originalVal + '"'
                        })

                        R.L(item, "add", "mouseleave", () => {
                            suggestionWrapper.querySelector("li.selected").classList.remove("selected"),
                            searchCopyAll.style.display = "",
                            searchCopySingle.style.display = "none",
                            originalVal = searchInput.value,
                            searchKey.textContent = '"' + originalVal + '"';
                        })
                    })
                }

                switch (ev.which) {
                    case keycode.down:
                        if (body.classList.contains("js-search-open")) {
                            let lastSuggestionIndex = R.Index.list(suggestionWrapper.getElementsByTagName("li")[suggestionWrapper.getElementsByTagName("li").length - 1])
                            suggestionWrapper.querySelectorAll("li").forEach(e => e.style.pointerEvents = "none")
                            suggestionWrapper.querySelectorAll("li.selected").forEach(e => e.classList.remove("selected"))
                            searchCopyAll.style.display = "none"
                            searchCopySingle.style.display = "block"

                            if (index == -1) {
                                suggestionWrapper.getElementsByTagName("li")[0].classList.add("selected")
                                index = 1
                            } else if (index == lastSuggestionIndex + 1) {
                                suggestionWrapper.getElementsByTagName("li")[lastSuggestionIndex].classList.add("selected")
                                index = lastSuggestionIndex + 1
                            } else {
                                suggestionWrapper.getElementsByTagName("li")[index].classList.add("selected")
                                index += 1
                            }

                            if (suggestionWrapper.getElementsByTagName("li").length > 0) {
                                originalVal = suggestionWrapper.querySelector("li.selected .suggestion-item").textContent
                                searchKey.textContent = originalVal
                            } else {
                                scrollHeight = outerHeightWithMargin(suggestionWrapper.querySelector("li.selected"))

                                verge.inViewport(suggestionWrapper.querySelector("li.selected"), -outerHeightWithMargin(suggestionWrapper.querySelector("li.selected")) - 64)
                                $(".suggestions-scroll").animate({
                                    scrollTop: "+=" + scrollHeight,
                                }, 100)
                            }
                        }

                        break;
                    case keycode.up:
                        if (body.classList.contains("js-search-open")) {
                            let firstSuggestionIndex = R.Index.list(suggestionWrapper.querySelectorAll("li")[0])
                            suggestionWrapper.querySelectorAll("li").forEach(e => e.style.pointerEvents = "none")
                            suggestionWrapper.querySelectorAll("li.selected").forEach(e => e.classList.remove("selected"))
                            searchCopyAll.style.display = "none"
                            searchCopySingle.style.display = "block"

                            if (index == firstSuggestionIndex + 1) {
                                suggestionWrapper.getElementsByTagName("li")[firstSuggestionIndex].classList.add("selected")
                                index = firstSuggestionIndex + 1
                            } else {
                                suggestionWrapper.getElementsByTagName("li")[index - 2].classList.add("selected")
                                index -= 1
                            }

                            if (suggestionWrapper.getElementsByTagName("li").length > 0) {
                                originalVal = suggestionWrapper.querySelector("li.selected .suggestion-item").textContent
                                searchKey.textContent = originalVal
                                scrollHeight = outerHeightWithMargin(suggestionWrapper.querySelector("li.selected"))

                                let selectedItemOffset = suggestionWrapper.querySelector("li.selected").getBoundingClientRect()
                                if (selectedItemOffset.top + document.body.scrollTop < 139) {
                                    $(".suggestions-scroll").animate({
                                        scrollTop: "-=" + scrollHeight,
                                    }, 100);
                                }
                            }
                        }
                        break;
                    case keycode.enter:
                        if (body.classList.contains("js-search-open")) {
                            TweenMax.to(searchWrapper, .3, {
                                pointerEvents: "none",
                                onComplete: function() {
                                    suggestionWrapper.querySelectorAll("li").forEach(e => e.parentNode.removeChild(e))
                                    TweenMax.to(searchKey.closest("#all-results-wrapper"), .3, {
                                        autoAlpha: 0,
                                        pointerEvents: "none",
                                    }),
                                    searchInput = ""
                                    searchKey.textContent = ""
                                },
                            })
                            searchIcon.click()
                        }
                        break;
                    default:
                        if (body.classList.contains("js-search-open")) {
                            index = -1
                            $(".suggestions-scroll").animate({
                                scrollTop: "0px",
                            }, 100)
                        }
                        break;
                }
            }
        })

        R.L(searchForm, 'add', 'submit', (ev) => {
            if (suggestionWrapper.querySelectorAll(".selected a").length > 0) {
                ev.preventDefault
                alert(suggestionWrapper.querySelector(".selected a").textContent)
                suggestionWrapper.querySelector(".selected a").click()
            }
        })

        R.L(document, "add", "closeSearch", () => {
            suggestionScroll.style.opacity = "0";
            key_count = 0;
        });


    })

    if (suggestionItem) {
        R.L(
            document.querySelector(".suggestion-item a"),
            "add",
            "click",
            function () {
                setTimeout(function () {
                    TweenMax.to(mainHeader, 1, {
                        className: "+=active",
                        ease: Expo.easeInOut,
                    });
                }, 1700);
            }
        );
    }

    //Search function
    R.L(searchIcon, "add", "click", () => {
        mainHeader.style.zIndex = "103";
        body.classList.toggle("js-search-open");

        if (body.classList.contains("js-search-open")) {
            searchIcon.style.pointerEvents = "all";
            TweenMax.to(searchWrapper, 0.8, {
                pointerEvents: "all",
                y: "-40px",
                ease: Elastic.easeOut.config(1, 0.8),
            });
            searchInput.focus();
            TweenMax.set(searchWrapperOverlay, {
                opacity: 0.4,
                visibility: "visible",
            });
        } else {
            searchIcon.style.pointerEvents = "all";
            mainHeader.style.zIndex = "102";
            TweenMax.to(searchWrapper, 0.3, {
                pointerEvents: "none",
                y: "-207",
                onComplete: function () {
                    suggestionWrapper.querySelectorAll("li").forEach(e => e.parentNode.removeChild(e))
                    TweenMax.set(searchKey.closest("#all-results-wrapper"), {
                        autoAlpha: 0,
                        pointerEvents: "none",
                    });
                    searchInput.value = "";
                    searchKey.textContent = "";
                },
            }),
                TweenMax.set(searchWrapperOverlay, {
                    opacity: 0,
                    visibility: "hidden",
                });
            $(document).trigger("closeSearch");
            searchIcon.style.pointerEvents = "";

        }
    })
}