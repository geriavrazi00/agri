function calculateTotal(index, totalTables, totalFields) {
	var totalLoan = 0;

	for(var i = 0; i < totalTables; i++) {
		var investments = 0;
		for(var j = 0; j < totalFields; j++) {
			investments += document.getElementById("investment-" + j + "-" + i).value != "" ? 
				eval(document.getElementById("investment-" + j + "-" + i).value) : 0;
		}

		document.getElementById("total-investment-" + i).innerHTML = investments.toLocaleString();
		totalLoan += investments;
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

function selectCategories(id) {
	if(document.getElementById("category-" + id).style.display === "none")
		document.getElementById("category-" + id).style.display = "block";
	else
		document.getElementById("category-" + id).style.display = "none";

  	//document.getElementById("table2").style.display = "none";
  	//document.getElementById("table3").style.display = "none";
  	//document.getElementById("table4").style.display = "none";
  	//document.getElementById("table" + nr).style.display = "block";
}