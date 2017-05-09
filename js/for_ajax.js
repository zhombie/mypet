$(document).ready(function(){

	$(".load_more_btn").click(function(){
		loadmore();
		// document.getElementById("load_more_div").style.display = 'none';
 	});
});

function loadmore(){

	var val = document.getElementById("result_no").value;
	$.ajax({
		type: 'POST',
		url: 'ajax.php',
		data: {
			getresult: val
		},
		success: function (response) {
			// if (document.getElementById("result_no").value == 13){
			// 	document.getElementById("load_more_div").style.display = 'none';	
			// }
			var content = document.getElementById("result_para");

			content.innerHTML = content.innerHTML + response;

			document.getElementById("result_no").value = Number(val) + 3;

		}
    });
}