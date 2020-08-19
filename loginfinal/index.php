<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Login</title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-image:linear-gradient(rgba(101, 224, 200.0), rgba(12,18,154,.4)),url(img/ISC.jpg);">
	<h2><strong><center>INGRESA AL SISTEMA</center></strong></h2>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading"><center> Laboratorio de Cómputo</center></div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						
					</div>
					<p></p>
					<i class="fas fa-user icon"></i>
					<label>Usuario</label>
					<input type="text" id="usuario" class="form-control input-sm" name="">
					<i class="fas fa-key icon"></i>
					<label>Contraseña</label>
					<input type="password" id="password" class="form-control input-sm" name="">
					<p></p>
					<div class="field-group">
                    <div class="check">
                    	<center>
                        <label class="checkbox w3l">
                            <input type="checkbox" onclick="myFunction()">
                            <i> </i>Ver Contraseña</label>
                        </center>
                    </div>
                    <!-- script for show password -->
                    <script>
                        function myFunction() {
                            var x = document.getElementById("password");
                            if (x.type === "password") {
                                x.type = "text";
                            } else {
                                x.type = "password";
                            }
                        }
                    </script>
                    <!-- //script for show password -->
                </div>
					<center>
					<span class="btn btn-primary" id="entrarSistema">Entrar</span>
					<a href="registro.php" class="btn btn-danger">Registro</a>
				</center>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								window.location="./index1.php";
							}else{
								alertify.alert("Fallo al entrar :(");
							}
						}
					});
		});	
	});
</script>