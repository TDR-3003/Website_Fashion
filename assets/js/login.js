$(document).ready(function(){
	$("#btn_login").on("click", function(e){
		e.preventDefault();
		var email = $("#email").val()
		var password = $("#password").val()
		var obj = {
			email: email,
			password: password
		}
		var jsonobj = JSON.stringify(obj)
		//console.log(email+password)
		$.ajax({
			url: "http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/user/login.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				var userName = data['lastName'] + "_" + data['firstName']
				var idUser = data['idUser']
				var idDivision = data['idDivision']
				window.location = "http://localhost:8080/WORK_SPACE/dacn1_fashion/login_handle.php?userName="+userName+"&idUser="+idUser+"&idDivision="+idDivision
				}
			});
	})
});