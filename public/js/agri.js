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

function calculateTotal(
    inputIndex,
    totalTables,
    totalFields,
    categoryId,
    categories
) {
    for (var i = 0; i < totalTables; i++) {
        var investments = 0;
        for (var j = 0; j < totalFields; j++) {
            investments +=
                document.getElementById(
                    "investment-" +
                        inputIndex +
                        "-" +
                        j +
                        "-" +
                        i +
                        "-" +
                        categoryId
                ) != null &&
                document.getElementById(
                    "investment-" +
                        inputIndex +
                        "-" +
                        j +
                        "-" +
                        i +
                        "-" +
                        categoryId
                ).value != ""
                    ? eval(
                          document.getElementById(
                              "investment-" +
                                  inputIndex +
                                  "-" +
                                  j +
                                  "-" +
                                  i +
                                  "-" +
                                  categoryId
                          ).value
                      )
                    : 0;
        }

        document.getElementById(
            "total-investment-" + inputIndex + "-" + i + "-" + categoryId
        ).innerHTML = investments.toLocaleString();
    }

    calculateTotalLoan(categories, inputIndex);
}

function calculateTotalLoan(categories) {
    var totalLoan = 0;
    categories = JSON.parse(categories);

    for (var i = 0; i < categories.length; i++) {
        for (var j = 0; j < categories[i].option_number; j++) {
            for (var k = 0; k < categories[i].labels.length; k++) {
                totalLoan +=
                    document.getElementById(
                        "investment-0-" + k + "-" + j + "-" + categories[i].id
                    ) != null &&
                    document.getElementById(
                        "investment-0-" + k + "-" + j + "-" + categories[i].id
                    ).value != "" &&
                    document.getElementById(
                        "investment-0-" + k + "-" + j + "-" + categories[i].id
                    ).value != null
                        ? eval(
                              document.getElementById(
                                  "investment-0-" +
                                      k +
                                      "-" +
                                      j +
                                      "-" +
                                      categories[i].id
                              ).value
                          )
                        : 0;

                totalLoan +=
                    document.getElementById(
                        "investment-1-" + k + "-" + j + "-" + categories[i].id
                    ) != null &&
                    document.getElementById(
                        "investment-1-" + k + "-" + j + "-" + categories[i].id
                    ).value != "" &&
                    document.getElementById(
                        "investment-1-" + k + "-" + j + "-" + categories[i].id
                    ).value != null
                        ? eval(
                              document.getElementById(
                                  "investment-1-" +
                                      k +
                                      "-" +
                                      j +
                                      "-" +
                                      categories[i].id
                              ).value
                          )
                        : 0;
            }
        }
    }

    document.getElementById(
        "total-loan"
    ).innerHTML = totalLoan.toLocaleString();
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
            "0",
            category.option_number,
            category.labels.length,
            category.id,
            categories
        );

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

function businessDataValidation(
    element,
    cultureNumber,
    optionNumber,
    categoryId
) {
    document
        .getElementById("business-2-" + optionNumber + "-" + categoryId)
        .setCustomValidity("");

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
        title: "Jeni të sigurt?",
        text: "Pas fshirjes nuk mund ti rimerrni të dhënat mbrapsht!",
        icon: "warning",
        buttons: ["Anullo", "Ok!"],
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
});
