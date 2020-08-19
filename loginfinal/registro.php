<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" >
	<link rel="stylesheet" href="estilos.css">
	<?php require_once "scripts.php"; ?>
</head>
<body style="background-image:linear-gradient(rgba(101, 224, 200.0), rgba(12,18,154,.4)),url(img/ISC.jpg);">
	<center><h2><strong>LABORATORIO DE CÓMPUTO</strong></h2></center>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			
			<div class="panel panel-danger">
				<div class="panel panel-heading"><center><strong>Registro de Usuario</strong></center></div>
				<div class="panel panel-body">
					<form id="frmRegistro">
						<strong>
							<i class="fas fa-user icon"></i>
						<label>Nombre</label>
					<input type="text" class="form-control input-sm" id="nombre" name="">
					<i class="fas fa-user icon"></i>
					<label>Apellido</label>
					<input type="text" class="form-control input-sm" id="apellido" name="">
					<i class="fas fa-user icon"></i>
					<label>Usuario</label>
					<input type="text" class="form-control input-sm" id="usuario" name="">
					<i class="fas fa-key icon"></i>
					<label>Contraseña</label>
					<input type="password" class="form-control input-sm" id="password" name="">
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
					<p>
					<center>
					<span class="btn btn-primary" id="registrarNuevo">Registrar</span>
				</center>
				<br>
					</form>
					<div style="text-align: center;">
						<a href="index.php" class="btn btn-default">Iniciar</a>
					</div>
				</p>
			</strong>
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
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#apellido').val()==""){
				alertify.alert("Debes agregar el apellido");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#password').val()==""){
				alertify.alert("Debes agregar el password");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&apellido=" + $('#apellido').val() +
					"&usuario=" + $('#usuario').val() + 
					"&password=" + $('#password').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){

							if(r==2){
								alertify.alert("Este usuario ya existe, prueba con otro :)");
							}
							else if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con exito");
							}else{
								alertify.error("Fallo al agregar");
							}
						}
					});
		});
	});
</script>

