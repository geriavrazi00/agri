
var selectedCategories = new Array();

function calculateTotal(totalTables, totalFields, categoryId, categories) {
    for (var i = 0; i < totalTables; i++) {
        var investments = 0;
        for (var j = 0; j < totalFields; j++) {
            investments += document.getElementById("investment-" + j + "-" + i + "-" + categoryId) != null 
            	&& document.getElementById("investment-" + j + "-" + i + "-" + categoryId).value != "" 
                ? eval(document.getElementById("investment-" + j + "-" + i + "-" + categoryId).value)
                : 0;
        }

        document.getElementById("total-investment-" + i + "-" + categoryId).innerHTML = investments.toLocaleString();
    }

    calculateTotalLoan(categories);
}

function calculateTotalLoan(categories) {
	var totalLoan = 0;
	categories = JSON.parse(categories);

	for (var i = 0; i < categories.length; i++) {
		for (var j = 0; j < categories[i].option_number; j++) {
			for (var k = 0; k < categories[i].labels.length; k++) {
				totalLoan += document.getElementById("investment-" + k + "-" + j + "-" + categories[i].id) != null && 
				document.getElementById("investment-" + k + "-" + j + "-" + categories[i].id).value != "" 
				&& document.getElementById("investment-" + k + "-" + j + "-" + categories[i].id).value != null 
                ? eval(document.getElementById("investment-" + k + "-" + j + "-" + categories[i].id).value)
                : 0;
			}
		}
	}

    document.getElementById("total-loan").innerHTML = totalLoan.toLocaleString();
}

/*function chooseCategory() {
	var selectedCategory = document.getElementById("farm-type").value;
	$CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.ajax({
		url : '/home/category',
		method : 'get',
		data: {_token: $CSRF_TOKEN, selectedCategory: selectedCategory},
		success: function(result) {
			$('#content').html(result);
		}
	});
}*/

function selectCategories(category, categories) {
	category = JSON.parse(category);

	if (document.getElementById("category-" + category.id).style.display === "none") {
		document.getElementById("category-" + category.id).style.display = "block";
		document.getElementById("category-" + category.id + "-div").style.backgroundColor = "#1e69b8";
		selectedCategories.push(category.id);
	} else {
		document.getElementById("category-" + category.id).style.display = "none";
		document.getElementById("category-" + category.id + "-div").style.backgroundColor = "";
		var index = selectedCategories.indexOf(category.id);
		if (index !== -1) selectedCategories.splice(index, 1);

		for (var i = 0; i < category.option_number; i++) {
			for (var j = 0; j < category.labels.length; j++) {
				document.getElementById("investment-" + j + "-" + i + "-" + category.id) != null ?
				document.getElementById("investment-" + j + "-" + i + "-" + category.id).value = 0 : 
				document.getElementById("investment-" + j + "-" + i + "-" + category.id);
			}
		}

		calculateTotal(category.option_number, category.labels.length, category.id, categories);
	}

	if (selectedCategories.length > 0) {
		document.getElementById("loan").style.display = "block";
		document.getElementById("applicant-name-div").style.display = "flex";
	} else {
		document.getElementById("loan").style.display = "none";
		document.getElementById("applicant-name-div").style.display = "none";
	}

	document.getElementById("selected-categories[]").value = selectedCategories;
}

function clearField(element) {
	if (element.value === "0") element.value = "";
}

function fillField(element) {
	if (element.value === "") element.value = "0";
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
