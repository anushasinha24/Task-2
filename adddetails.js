$(document).ready(function(){
	$(".submit").click(function(event){
		event.preventDefault();
		var uida = $("#uid").val();
		var namea = $("#name").val();
		var emaila = $("#email").val();
		var mobilea = $("#mobile").val();
		var DOBa = $("#DOB").val();
		var universitya = $("#university").val();
		var companya = $("#company").val();
		var landlinea = $("#landline").val();
		var addressa = $("#address").val();
		var skilla = $("#skill").tagsinput('items');		
		
		// AJAX code to send data to php file.
		$.ajax({
			type: "POST",
			url: "adddetails.php",
			data: {uid:uida,name:namea,email:emaila,mobile:mobilea,DOB:DOBa,university:universitya,company:companya,landline:landlinea,address:addressa,skill:skilla},
			dataType: "JSON",
			success: function(data) {
				$("#message").html(data);
				$("#message").addClass("alert alert-success");
			},
			error: function(err) {
				alert(err);
			}
		}); 
	});
});