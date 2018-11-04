$(document).ready(function(){
	$("#user").focus();
	$("#start").click(function(){
		if ( $('#user').val() != "" && $('#password').val() != "" ){
			var dataString = $("#login").serialize();
			$("#start").html("Espere por favor... <i class='fa fa-spinner fa-spin'></i>");
			$.ajax({
				type: 'POST',
				url: 'modules/admin/log/login.php',
				data: dataString,
				success: function(data){
					$('#box-alert').html(data).fadeIn();
				}
			});

		}else{
			$("#box-alert").html("*El usuario y contraseña no puede estar vacios").fadeOut(5000);
			$("#start").html("Iniciar sesion");
			$("#user").focus();
		}
	});
});