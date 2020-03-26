$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});

$(".dropdown-toggle").dropdown();

//Manage the opening and closing of the menu on mobile devices
$('#navbar-button').on('click', function() {
    var element = document.getElementById("navbarSupportedContent");

    if(element.classList.contains("show")) {
        element.classList.remove("show");
    } else {
        element.classList.add("show");
    }
});

var selectedCategories = new Array();

function calculateTotal( inputIndex, totalTables, totalFields, categoryId, categories) {
    for (var i = 0; i < totalTables; i++) {
        var investments = 0;
        for (var j = 0; j < totalFields; j++) {
            var val = document.getElementById("investment-" + inputIndex + "-" + j + "-" + i + "-" + categoryId);
            investments += (val != null && val.value != "") ? eval(val.value.replace(/,/g, '')) : 0;
        }

        document.getElementById(
            "total-investment-" + inputIndex + "-" + i + "-" + categoryId
        ).innerHTML = investments.toLocaleString();
    }

    calculateTotalLoan(categories);
}

function calculateTotalLoan(categories) {
    var totalLoan = 0;
    categories = JSON.parse(categories);

    for (var i = 0; i < categories.length; i++) {
        for (var j = 0; j < categories[i].option_number; j++) {
            for (var k = 0; k < categories[i].labels.length; k++) {
                var val = document.getElementById("investment-1-" + k + "-" + j + "-" + categories[i].id);
                totalLoan += (val != null && val.value != "" && val.value != null) ? eval(val.value.replace(/,/g, '')) : 0;
            }
        }
    }

    var tempTotalLoan = totalLoan;
    tempTotalLoan = formatNumber(tempTotalLoan.toString());
    document.getElementById("total-loan-0").value = tempTotalLoan;
    document.getElementById("total-loan-0").setAttribute('max', totalLoan);

}

function selectCategories(category, categories) {
    category = JSON.parse(category);
    categoryElement = document.getElementById("category-" + category.id);
    categoryDivElement = document.getElementById(
        "category-" + category.id + "-div"
    );
    loanElement = document.getElementById("loan");
    //applicantNameElement = document.getElementById("applicant-name-div");

    if (categoryElement.style.display === "none") {
        categoryElement.style.display = "block";
        categoryElement.style.opacity = 1;
        categoryDivElement.style.backgroundColor = "#508104";
        selectedCategories.push(category.id);
        manageSelectedCategories(category, true);
        document
            .getElementById("category-" + category.id + "-anchor")
            .scrollIntoView({ top: 150, behavior: "smooth" });
    } else {
        categoryElement.style.display = "none";
        categoryElement.style.opacity = 0;
        categoryDivElement.style.backgroundColor = "";

        var index = selectedCategories.indexOf(category.id);
        if (index !== -1) selectedCategories.splice(index, 1);

        for (var i = 0; i < category.option_number; i++) {
            for (var j = 0; j < category.labels.length; j++) {
                document.getElementById(
                    "investment-0-" + j + "-" + i + "-" + category.id
                ) != null
                    ? (document.getElementById(
                          "investment-0-" + j + "-" + i + "-" + category.id
                      ).value = 0)
                    : document.getElementById(
                          "investment-0-" + j + "-" + i + "-" + category.id
                      );

                document.getElementById(
                    "investment-1-" + j + "-" + i + "-" + category.id
                ) != null
                    ? (document.getElementById(
                          "investment-1-" + j + "-" + i + "-" + category.id
                      ).value = 0)
                    : document.getElementById(
                          "investment-1-" + j + "-" + i + "-" + category.id
                      );
            }

            document.getElementById("business-0-" + i + "-" + category.id) !=
            null
                ? (document.getElementById(
                      "business-0-" + i + "-" + category.id
                  ).value = 1)
                : document.getElementById(
                      "business-0-" + i + "-" + category.id
                  );

            document.getElementById("business-1-" + i + "-" + category.id) !=
            null
                ? (document.getElementById(
                      "business-1-" + i + "-" + category.id
                  ).value = "")
                : document.getElementById(
                      "business-1-" + i + "-" + category.id
                  );

            var businessVariableNumber = category.culture_number + 2;

            for (var j = 2; j < businessVariableNumber; j++) {
                document.getElementById(
                    "business-" + j + "-" + i + "-" + category.id
                ) != null
                    ? (document.getElementById(
                          "business-" + j + "-" + i + "-" + category.id
                      ).value = "")
                    : document.getElementById(
                          "business-" + j + "-" + i + "-" + category.id
                      );
            }
        }

        calculateTotal(
            "1",
            category.option_number,
            category.labels.length,
            category.id,
            categories
        );
        manageSelectedCategories(category, false);
    }

    if (selectedCategories.length > 0) {
        loanElement.style.display = "block";
        //applicantNameElement.style.display = "flex";
    } else {
        loanElement.style.display = "none";
        //applicantNameElement.style.display = "none";
        document.getElementById("applicantnameinput").value = "";
    }

    document.getElementById("selected-categories[]").value = selectedCategories;
}

function clearField(element, num) {
    if (element.value === num) element.value = "";
}

function fillField(element, num) {
    if (element.value === "") element.value = num;
}

function fillLoanField(element, num) {
    if (element.value === "") element.value = num;

    if(eval(element.value.replace(/,/g, '')) > 0) {
        document.getElementById("loan-0-1").setAttribute("required", "");
        document.getElementById("loan-1-1").setAttribute("required", "");
        document.getElementById("loan-2-1").setAttribute("required", "");
        document.getElementById("loan-3-1").setAttribute("required", "");
    } else {
        document.getElementById("loan-0-1").removeAttribute("required");
        document.getElementById("loan-1-1").removeAttribute("required");
        document.getElementById("loan-2-1").removeAttribute("required");
        document.getElementById("loan-3-1").removeAttribute("required");
    }
}

function checkIfNum(element) {
    if (element.value === "" || isNaN(element.value)) {
        element.value = "";
        element.value = element.value.substr(element.value.length - 1);
        return false;
    }

    return true;
}

function blockSpecialCharactersInInputNumber(event) {
    /* 	69 -> e, E
     * 	109 -> - in numpad
     *	107 -> + in numpad
     *	189 -> - in keyboard
     * 	187 -> + in keyboard
     */

    if (
        event.keyCode == 69 ||
        event.keyCode == 109 ||
        event.keyCode == 107 ||
        event.keyCode == 187 ||
        event.keyCode == 189
    ) {
        return false;
    }
    return true;
}

function createInvalidMsg(input, requiredMessage, alternativeMessage) {
    if (input.value == "") {
        input.setCustomValidity(requiredMessage);
    } else if (input.value < 0) {
        input.setCustomValidity(alternativeMessage);
    } else if (input.validity.typeMismatch) {
        input.setCustomValidity(alternativeMessage);
    } else if (input.validity.patternMismatch) {
        input.setCustomValidity(alternativeMessage);
    } else {
        input.setCustomValidity("");
    }

    //input.scrollIntoView({ top: 200, behavior: "smooth" });

    // console.log(input.id);
    // document.getElementById(input.id).scrollIntoView({ top: 0, behavior: "smooth" });
    // var target = 0;
    // var header = 56;

    // $(window).scrollTop( target - header )

    return true;
}

function loanInterestRateValidation(
    input,
    min,
    max,
    requiredMessage,
    lessThanMinMessage,
    moreThanMaxMessage
) {
    if (input.value == "") {
        input.setCustomValidity(requiredMessage);
    } else if (input.value <= min) {
        input.setCustomValidity(lessThanMinMessage);
    } else if (input.value > max) {
        input.setCustomValidity(moreThanMaxMessage);
    } else {
        input.setCustomValidity("");
    }

    return true;
}

function validateLoanTotals(input, message, categories) {
    var totalLoan = 0;
    categories = JSON.parse(categories);

    for (var i = 0; i < categories.length; i++) {
        for (var j = 0; j < categories[i].option_number; j++) {
            for (var k = 0; k < categories[i].labels.length; k++) {
                var val = document.getElementById("investment-1-" + k + "-" + j + "-" + categories[i].id);
                totalLoan += val != null && val.value != "" && val != null ? eval(val.value.replace(/,/g, '')): 0;
            }
        }
    }

    var sumOfTotals = eval(document.getElementById("total-loan-0").value.replace(/,/g, ''))
        + eval(document.getElementById("total-loan-1").value.replace(/,/g, ''));

    if(sumOfTotals != totalLoan) {
        document.getElementById("total-loan-0").setAttribute('max', -1);
        input.setCustomValidity(message);
    } else {
        document.getElementById("total-loan-0").setAttribute('max', totalLoan);
        input.setCustomValidity("");
    }

    //console.log(eval(document.getElementById("total-loan-1").value.replace(/,/g, '')));

    if(eval(document.getElementById("total-loan-1").value.replace(/,/g, '')) > 0) {
        document.getElementById("loan-0-1").setAttribute("required", "");
        document.getElementById("loan-1-1").setAttribute("required", "");
        document.getElementById("loan-2-1").setAttribute("required", "");
        document.getElementById("loan-3-1").setAttribute("required", "");
    } else {
        console.log("hey");
        document.getElementById("loan-0-1").removeAttribute("required");
        document.getElementById("loan-1-1").removeAttribute("required");
        document.getElementById("loan-2-1").removeAttribute("required");
        document.getElementById("loan-3-1").removeAttribute("required");
    }

    return true;
}

function businessDataValidation(clickedElement, cultureNumber, optionNumber, categoryId, totalOptions) {
    document.getElementById("business-2-" + optionNumber + "-" + categoryId).setCustomValidity("");

    var isAnySelected = false;

    for (var i = 0; i < cultureNumber; i++) {
        if (
            document.getElementById(
                "business-" + (i + 2) + "-" + optionNumber + "-" + categoryId
            ).value != ""
        ) {
            isAnySelected = true;
            break;
        }
    }

    if (!isAnySelected) {
        document
            .getElementById("business-2-" + optionNumber + "-" + categoryId)
            .setAttribute("required", "");
    } else {
        document
            .getElementById("business-2-" + optionNumber + "-" + categoryId)
            .removeAttribute("required");
    }

    if (totalOptions > 1) {
        updateCultures(clickedElement, optionNumber, categoryId);
    }
}

function manageSelectedCategories(category, enable) {
    var businessVariableNumber = category.culture_number + 2;

    for (var i = 0; i < category.option_number; i++) {
        for (var j = 0; j < businessVariableNumber; j++) {
            if (enable) {
                document
                    .getElementById(
                        "business-" + j + "-" + i + "-" + category.id
                    )
                    .removeAttribute("disabled");
            } else {
                document
                    .getElementById(
                        "business-" + j + "-" + i + "-" + category.id
                    )
                    .setAttribute("disabled", "");
            }
        }
    }
}

function areYouSure(e, element) {
    e.preventDefault();
    var form = $(element).parents("form");

    swal({
        title: Lang.get('messages.are_you_sure'),
        text: Lang.get('messages.delete_message'),
        icon: "warning",
        buttons: [Lang.get('messages.cancel'), "Ok!"],
        dangerMode: true
    }).then(willDelete => {
        if (willDelete) {
            form.submit();
        }
    });
}

$("#loan-3").keypress(function(event) {
    event.preventDefault();
});

$(window).on("load", function() {
    $("#myModal").modal("show");

    setTimeout(function(e) {
        $('#myModal').modal('hide');
    }, parseInt($('#myModal').attr('data-delay')) * 1000);
});

//Formating the number fields to currency
$("input[data-type='number']").on({
    keyup: function() {
        formatNumberWithCommas($(this));
    },
    blur: function() {
        formatNumberWithCommas($(this), "blur");
    }
});

function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function formatNumberWithCommas(input, blur) {
    // appends currency to value if we want, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = left_side + "." + right_side;

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);
        input_val = input_val;

        // final formatting
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

//Formating the percentage fields to currency
$("input[data-type='percentage']").on({
    keyup: function() {
        formatPercentage($(this));
    },
    blur: function() {
        formatPercentage($(this), "blur");
    }
});

function formatPercentage(input, blur) {
    // appends currency to value if we want, validates decimal side
    // and puts cursor back in right position.

    // get input value
    var input_val = input.val();

    // don't validate empty input
    if (input_val === "") { return; }

    // original length
    var original_len = input_val.length;

    // initial caret position
    var caret_pos = input.prop("selectionStart");

    // check for decimal
    if (input_val.indexOf(".") >= 0) {

        // get position of first decimal
        // this prevents multiple decimals from
        // being entered
        var decimal_pos = input_val.indexOf(".");

        // split number by decimal point
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);

        // add commas to left side of number
        left_side = formatNumber(left_side);

        // validate right side
        right_side = formatNumber(right_side);

        // On blur make sure 2 numbers after decimal
        if (blur === "blur") {
            right_side += "00";
        }

        // Limit decimal to only 2 digits
        right_side = right_side.substring(0, 2);

        // join number by .
        input_val = left_side + "." + right_side + "%";

    } else {
        // no decimal entered
        // add commas to number
        // remove all non-digits
        input_val = formatNumber(input_val);

        // final formatting
        if (blur === "blur") {
            input_val += ".00";
        }

        input_val = input_val + "%";
    }

    // send updated string to input
    input.val(input_val);

    // put caret back in the right position
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

function updateCultures(clickedElement, optionNumber, categoryId) {
    //First we get the culture strings grouped in the defined periods
    var firstPeriodCultures = Lang.get('cultures.greenhouse_first_period_products');
    var secondPeriodCultures = Lang.get('cultures.greenhouse_second_period_products');
    var yearlyCultures = Lang.get('cultures.greenhouse_yearly_products');

    //Convert the object strings into arrays
    var firstPeriodCulturesArray = Object.keys(firstPeriodCultures).map(item => firstPeriodCultures[item]);
    var secondPeriodCulturesArray = Object.keys(secondPeriodCultures).map(item => secondPeriodCultures[item]);
    var yearlyCulturesArray = Object.keys(yearlyCultures).map(item => yearlyCultures[item]);

    //Get the select element that will not to be changed based on the currently clicked select element
    var elementToChange = null;
    if(clickedElement.id.startsWith("business-2-")) {
        elementToChange = document.getElementById("business-3-" + optionNumber + "-" + categoryId);
    } else {
        elementToChange = document.getElementById("business-2-" + optionNumber + "-" + categoryId);
    }

    //Get the length of the options that the select element has
    var length = elementToChange.options.length;

    //In case a culture option is selected, we get the text of the selected option
    var selectedText = clickedElement.options[clickedElement.selectedIndex].text;

    //If we click the first option of a select element or an yearly culture, the other element should have all of its options enabled
    if(clickedElement.value === '' || yearlyCulturesArray.includes(selectedText)) {
        for (i = 0; i < length; i++) {
            elementToChange.options[i].disabled = false;
        }
    } else {
        if (firstPeriodCulturesArray.includes(selectedText)) {
            //If the text is present in the first period cultures, we disable all first period cultures in the other select and enable all second period cultures

            for (i = 0; i < length; i++) {
                for (j = 0; j < firstPeriodCulturesArray.length; j++) {
                    if (elementToChange.options[i].text === firstPeriodCulturesArray[j] && elementToChange.options[i].disabled === false) {
                        elementToChange.options[i].disabled = true;
                    }
                }
            }

            for (i = 0; i < length; i++) {
                for (j = 0; j < secondPeriodCulturesArray.length; j++) {
                    if (elementToChange.options[i].text === secondPeriodCulturesArray[j] && elementToChange.options[i].disabled === true) {
                        elementToChange.options[i].disabled = false;
                    }
                }
            }
        } else if (secondPeriodCulturesArray.includes(selectedText)) {
            //If the text is present in the second period cultures, we disable all second period cultures in the other select and enable all first period cultures

            for (i = 0; i < length; i++) {
                for (j = 0; j < secondPeriodCulturesArray.length; j++) {
                    if (elementToChange.options[i].text === secondPeriodCulturesArray[j] && elementToChange.options[i].disabled === false) {
                        elementToChange.options[i].disabled = true;
                    }
                }
            }

            for (i = 0; i < length; i++) {
                for (j = 0; j < firstPeriodCulturesArray.length; j++) {
                    if (elementToChange.options[i].text === firstPeriodCulturesArray[j] && elementToChange.options[i].disabled === true) {
                        elementToChange.options[i].disabled = false;
                    }
                }
            }
        }
    }
}
