import R from "@ariiiman/r";
import { TweenMax, EasePack, TimelineMax, Power4 } from "gsap"; // eslint-disable-line
import Scrollbar from "smooth-scrollbar";


export default {
    namespace: "template-appointment",
    onEnter: function () {

        const   //body = R.Dom.body,
                //appointmentApiEndpoint = '/wp-json/cssm/v1/appointment',
                inputElements = document.querySelectorAll(".formFieldGroup__input"),
                fakeSelect = R.G.class('fake-select'),
                radioOptions = document.querySelectorAll("#formFieldGroup__radio input"),
                servicesList = document.getElementsByClassName('select-list'),
                specialitiesList = document.getElementById('especialidade').nextElementSibling,
                doctorList = document.getElementById('doctor').nextElementSibling,
                appointmentForm = R.G.id('appointmentForm'),
                submitButton = document.getElementById('submit'),
                successClose = R.G.id('success-close'),
                rgpdCheck = R.G.id('rgpd-check'),
                rgpdCheckInput = R.G.id('rgpd-check-input'),
                submitSuccessFeedback = document.getElementById('successAppointment'),
                tl = new TimelineMax(),
                submitTl = new TimelineMax({paused:true});

        // Success Timeline
        submitTl.to(submitSuccessFeedback, 1, {
            y: 0,
            ease: Power2.easeInOut,
        }, "-=0.4").to("#successAppointment__logo", 2, {
            opacity: 0.6,
            ease: Power2.easeInOut,
        }).staggerFrom(
            new SplitText(
                "#successAppointment__content h1",
                { type: "words,chars", specialChars:["ç","Ç", "ã", "Ã", "â", "Â", "ê", "Ê", "õ", "Õ"] }
            ).chars,
            0.8,
            { opacity: 0, y: 20, ease: Back.easeOut.config(1) },
            0.02,
            "-=2.2"
        ).staggerFrom(
            new SplitText(
                "#successAppointment__content p",
                { type: "words,chars", specialChars:["ç","Ç", "ã", "Ã", "â", "Â", "ê", "Ê", "õ", "Õ"] }
            ).chars,
            0.8,
            { opacity: 0, y: 20, ease: Back.easeOut.config(1) },
            0.005,
            "-=1.8"
        ).staggerTo("#successAppointment__content a",
            0.7,
            { opacity: 1, y: -25, ease: Power2.easeInOut },
            0.01,
            "-=1.1"
        );


        function getChildren(parent, selector) {
            return Array.prototype.filter.call(parent.children, function (node) {
                return node.matches(selector);
            });
        }

        inputElements.forEach(input => {
            var inputBg = getChildren(input.parentNode, ".input-bg"),
                inputLabel = getChildren(input.parentNode, ".input-label");

            R.L(input, "add", "click", () => {
                input.classList.add("loc");
                inputBg[0].classList.add("filled");
                inputLabel[0].classList.add("filled");
            });

            R.L(input, "add", "focus", () => {
                input.classList.add("loc");
                inputBg[0].classList.add("filled");
                inputLabel[0].classList.add("filled");
            });

            R.L(input, "add", "focusOut", () => {
                if (input.value == "") {
                    inputLabel[0].classList.remove("filled");
                    inputLabel[0].classList.remove("input-not-empty");
                } else {
                    inputLabel[0].classList.add("input-not-empty");
                }
                input.classList.remove("loc");
                inputBg[0].classList.remove("filled");
            });
        });

        function filterData(url, list, array, id) {
            let listItems = list.querySelectorAll('li'),
                listNumber = listItems.length

            fetch(url+id, {
                headers : {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                },
              }).then(
                    function(response) {
                    if (response.status !== 200) {
                        console.log('Looks like there was a problem. Status Code: ' + response.status); // eslint-disable-line
                        return;
                    }

                    // Examine the text in the response
                    response.json().then(function(data) {
                        // all items of given list
                        let nonMatchNumber = 0

                        // Loop through given list items
                        // - If the item ID is in the API response, show it, else hide it
                        listItems.forEach(item => {
                            if (item.classList.contains('non-match') || item.classList.contains('match')) {
                                item.classList.remove('non-match')
                                item.classList.remove('match')
                            }

                            if (item.classList.contains('null')) {
                                item.parentElement.removeChild(item)

                            }

                            if (data[array].includes(parseInt(item.dataset.id)) == true) {
                                item.classList.add('match')
                            } else {
                                item.classList.add('non-match')
                                nonMatchNumber++
                            }

                            // if there is no cpt relation
                            if (nonMatchNumber == listNumber) {
                                let node = document.createElement('li'),
                                    span = document.createElement('span'),
                                    textnode = document.createTextNode('Não existente')

                                node.classList.add('null'),
                                span.appendChild(textnode);                              // Append the text to <li>
                                list.querySelector('ul').appendChild(node).appendChild(span);     // Append <li> to <ul> with id="myList"
                            }
                        });

                        // The list of items has a fixed height,
                        // so we need to calculate the height of all filtered items
                        // - 75px for the item height and 40 for the list padding
                        // (TODO: try to not use hardcoded px values)
                        let heightOfAllItems = data[array].length * 75 + 40,
                            listHeight = 350

                        // The list is now filtered
                        list.classList.add('selected')

                        if (listHeight > heightOfAllItems) {
                            list.style.height = heightOfAllItems + 'px'
                        } else if (listHeight < heightOfAllItems && listNumber > 1) {
                            list.style.height = listHeight + 'px'
                        }

                        if (parseInt(nonMatchNumber) === parseInt(listNumber)) {
                            list.style.height = '105px'
                        }
                    });
                    }
                )
                .catch(function(err) {
                    console.log('Fetch Error :-S', err); // eslint-disable-line
                });
        }

        Object.entries(fakeSelect).map(( select ) => {
            // Here, object = Array[index, object] (object is the
            // HTML element object). This means that the actual element
            // is stored in object[1], not object. Do whatever you need
            // with it here.
            let input = select[1],
                list = input.nextElementSibling,
                listItems = Array.from(input.nextElementSibling.getElementsByTagName('li'))

            let fakeSelectScroll = Scrollbar.init(list, {
                syncCallbacks: true,
            }); // eslint-disable-line

            R.L(input, "add", "click", () => {
                list.classList.add("show");
            });

            R.L(input, "add", "focus", () => {
                list.classList.add("show");
            });

            R.L(input, "add", "focusOut", () => {
                list.classList.remove("show");
                fakeSelectScroll.setPosition(0, 0);
            });

            listItems.forEach(item => {
                R.L(item, "add", "mousedown", () => {
                    let itemName = item.querySelector('span').innerHTML,
                        itemWrapper = item.closest('.formFieldGroup__wrapper'),
                        itemID = item.dataset.id;

                    input.value = itemName;
                    input.parentNode.querySelector('label').classList.add('input-not-empty');

                    if (itemWrapper.querySelector(".fake-placeholder") !== null) {
                        itemWrapper.removeChild(itemWrapper.querySelector(".fake-placeholder"));
                    }

                    switch (input.id) {
                        case 'especialidade':
                            // The list might be already filtered, so skip it
                            if (list.classList.contains('selected') == false) {
                                filterData('/wp-json/cssm/v1/search-speciality?speciality_id=', doctorList, 'doctors', itemID)
                            }
                            break;

                        case 'doctor':
                            // The list might be already filtered, so skip it
                            if (list.classList.contains('selected') == false) {
                                filterData('/wp-json/cssm/v1/search-doctor?doctor_id=', specialitiesList, 'specialities', itemID)
                            }
                            break;
                        default:
                            break;
                    }
                });
            });
        });


        radioOptions.forEach(option => {
            R.L(option, "add", "click", () => {
                [].forEach.call(servicesList, function (list) {

                    if (option.dataset.filter !== list.id && list.classList.contains('visible')) {
                        tl.to(list, 0.2, {
                            y: 30,
                            autoAlpha: 0,
                            ease: Power3.easeOut,
                        })
                            .set(document.getElementById(option.dataset.filter), { visibility: "visible" })
                            .to(document.getElementById(option.dataset.filter), 0.2, {
                                y: 0,
                                autoAlpha: 1,
                                ease: Power3.easeOut,
                            });

                        list.classList.remove('visible');
                        document.getElementById(option.dataset.filter).classList.add('visible');
                        //listSibling[0].classList.add('visible');
                    }
                });


            });
        });


        // on appointment submit success
        R.L(appointmentForm, "add", "submit", (event) => {
            event.stopImmediatePropagation(),
            event.preventDefault();
            event.stopPropagation();

            const req = {
                especialidade: R.G.id('especialidade').value,
                doctor: R.G.id('doctor').value,
                exames: R.G.id('exames').value,
                date: R.G.id('date').value,
                time: R.G.id('time').value,
                mensagem: R.G.id('mensagem').value,
                name: R.G.id('name').value,
                email: R.G.id('email').value,
                phone: R.G.id('phone').value,
            };

            var data = new FormData();
            data.append( "json", JSON.stringify( req ) );

            fetch("/wp-json/cssm/v1/appointment",
            {
                method: "POST",
                body: data,
            })
            .then(function(res){
                return res.json();
            })
            .then(function(data){
                console.log( JSON.stringify( data ) ) // eslint-disable-line

                if (data.success) {
                    submitTl.play()
                } else {
                    alert('Algo correu mal. Tente outra vez por favor.')
                }
            })
        });

        R.L(successClose, "add", "click", () => {
            submitSuccessFeedback.style.display = 'flex'
            document.querySelector('.brand a').click()
            submitTl.reverse()
        })

        // rgpd
        // $(".rgpd-check").on("click", function() {
        //     $(".rgpd-check").toggleClass("active"),
        //     $(".rgpd-check").hasClass("active") ? ($("#rgpd-check").prop("checked", !0),
        //     TweenMax.to(".send-contact-form", .25, {
        //         pointerEvents: "inherit",
        //         opacity: 1,
        //     })) : ($("#rgpd-check").prop("checked", !1),
        //     TweenMax.to(".send-contact-form", .25, {
        //         pointerEvents: "none",
        //         opacity: .4,
        //     }))
        // })

        R.L(rgpdCheck, 'add', 'click', () => {
            rgpdCheck.classList.toggle('active')
            if (rgpdCheck.classList.contains('active')) {
                rgpdCheckInput.checked = true
                TweenMax.to(submitButton, .25, {
                    pointerEvents: "inherit",
                    opacity: 1,
                })
            } else {
                rgpdCheckInput.checked = false
                TweenMax.to(submitButton, .25, {
                    pointerEvents: "none",
                    opacity: .4,
                })
            }
        })

    },
    onEnterCompleted: function () { },
    onLeave: function () { },
    onLeaveCompleted: function () {
        // The Container has just been removed from the DOM.
    },
};
