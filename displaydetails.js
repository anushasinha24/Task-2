$(document).ready(function(){
	$(".submit").click(function(event){
		document.getElementById("message").innerHTML="";
		event.preventDefault();
		var uida = $("#uid").val();		
		
		// AJAX code to send data to php file.
		$.ajax({
			type: "POST",
			url: "displaydetails.php",
			data: {uid:uida},
			dataType: "JSON",
			success: function(data) {
				txt = "<table border='black' cellpadding='10%' style='text-align: center'><tr><th>USER ID</th><th>NAME</th><th>EMAIL</th><th>MOBILE</th><th>DOB</th><th>UNIVERSITY</th><th>COMPANY</th><th>LANDLINE</th><th>ADDRESS</th></tr>"
				txt = txt + data;
				display=document.getElementById("message");
				display.insertAdjacentHTML( 'beforeend', txt);
			},
			error: function(err) {
				alert("Couldn't fetch details. Please try again later.");
			}
		}); 
	});
});