
// get all of our list items
var itemsToFilter = document.querySelectorAll("#items-to-filter li");
//setup click event handlers on our checkboxes
var checkBoxes = document.querySelectorAll(".filter-section li input");
for (var i = 0; i < checkBoxes.length; i++) {
    checkBoxes[i].addEventListener("click", filterItems, false);

}

// the event handler!
function filterItems(e) {
    var clickedItem = e.target;

    if (clickedItem.checked == true) {
        hideOrShowItems(clickedItem.value, "hideItem", "showItem block");
    } else if (clickedItem.checked == false) {
        hideOrShowItems(clickedItem.value, "showItem block", "hideItem");
    } else {
        // deal with the indeterminate state if needed
    }
	//rearange the remaining blocks
	setupBlocks();
}

// add or remove classes to show or hide our content
function hideOrShowItems(itemType, classToRemove, classToAdd) {
    for (var i = 0; i < itemsToFilter.length; i++) {
        var currentItem = itemsToFilter[i];
        if (currentItem.getAttribute("data-type") == itemType) {
			$(currentItem).addClass(classToAdd);
            $(currentItem).removeClass(classToRemove);

        }
    }
}

//
// Helper functions for adding and removing class values
//
function addClass(element, classToAdd) {
    var currentClassValue = element.className;

    if (currentClassValue.indexOf(classToAdd) == -1) {
        if ((currentClassValue == null) || (currentClassValue === "")) {
            element.className = classToAdd;
        } else {
            element.className += " " + classToAdd;
        }
    }
}

function removeClass(element, classToRemove) {
    var currentClassValue = element.className;

    if (currentClassValue == classToRemove) {
        element.className = "";
        return;
    }

    var classValues = currentClassValue.split(" ");
    var filteredList = [];

    for (var i = 0 ; i < classValues.length; i++) {
        if (classToRemove != classValues[i]) {
            filteredList.push(classValues[i]);
        }
    }

    element.className = filteredList.join(" ");
}
