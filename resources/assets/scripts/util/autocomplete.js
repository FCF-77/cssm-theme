import Scrollbar from "smooth-scrollbar";

export default function autocomplete(inp, list) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus = -1,
      elementList = list.querySelectorAll("li"),
      scrollbar = Scrollbar.get(list);

    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function () {
        var i, val = this.value,
            listArray = [];

        if (!val) { return false; }

        // for each item in the array...
        for (i = 0; i < elementList.length; i++) {
            /*check if the dom item has the same substring that the input value*/
            
            if (elementList[i].querySelector("a").textContent.toUpperCase().indexOf(val.toUpperCase()) !== -1) {
              // push the correspondant ones to listArray
              listArray.push(i);
            }
        }

        // show only the correspondant ones
        elementList.forEach(item => {
            if (listArray.includes(parseInt(item.getAttribute("data-index")))) {
              item.style.display = "block";
            } else if (!listArray.includes(parseInt(item.getAttribute("data-index")))) {
              item.style.display = "none";
            } else {
                item.style.display = "block";
            }
        });

        // reset custom scrollbar position
        scrollbar.setPosition(0, 0);
    });

    // shows all list items if the user deletes all input
    inp.addEventListener('keyup', function() {
        if (this.value.length === 0) {
            elementList.forEach(item => {list
                item.style.display = 'block';
            });
        }
    });

    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function (e) {
        switch (e.keyCode) {
          case 13:
            /*If the ENTER key is pressed, prevent the form from being submitted,*/
            e.preventDefault();
            if (currentFocus > -1) {
              /*and simulate a click on the "active" item:*/
              if (elementList) elementList[currentFocus].querySelector("a").click();
            }
            break;
          case 27:
            /*If the ESC key is pressed, close the opened list*/
            this.parentNode.parentNode.parentNode.classList.remove("open");
            break;
          case 38:
            /*If the arrow UP key is pressed,
            decrease the currentFocus variable:*/
            currentFocus--;
            /*and and make the current item more visible:*/
            addActive(elementList);
            break;
          case 40:
            /*If the arrow DOWN key is pressed,
            increase the currentFocus variable:*/
            currentFocus++;
            /*and and make the current item more visible:*/
            addActive(elementList);
            break;
        }
    });

    function addActive(x) {
        /*a function to classify an item as "active":*/
        if (!x) return false;
        /*start by removing the "active" class on all items:*/
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        /*add class "autocomplete-active":*/
        x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
        /*a function to remove the "active" class from all autocomplete items:*/
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
}