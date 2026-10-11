<?php
/**
 * Vista de Inicio de Sesion (Login)
 *
 * Interfaz grafica de acceso que solicita al usuario su cedula de identidad,
 * nombre registrado y contrasena. Incluye librerias visuales (Bootstrap, SweetAlert2),
 * funciones de validacion de teclado en JavaScript y el procesamiento del inicio de sesion
 * mediante la inclusion de db/cosult_log.php.
 *
 * @package INTI\Auth
 */

include '../db/cosult_log.php';

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Instituto Nacional de Tierras - Iniciar Sesion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Fuentes e Iconografia -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

		<!-- Estilos visuales del formulario -->
		<link rel="stylesheet" href="../css/style2.css">
		<link rel="stylesheet" href="assets/css/captcha.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.12/dist/sweetalert2.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- Librerias JavaScript principales -->
		<script src="https://kit.fontawesome.com/a81368914c.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
	</head>

	<script>
        /**
         * Restringe la entrada de texto exclusivamente a valores numericos.
         * Permite teclas de control como retroceso (8) y enter (13).
         */
        function Solo_Numero(evt)
        {
            if(Window.event){
                keynum = evt.keyCode;
            } else {
                keynum = evt.which;
            }

            }

            if((keynum > 47 && keynum < 58) || keynum == 8 || keynum== 13 ){

                return true;
            }

            else{

                alert("Ingrese solo numeros");

                return false;

            }

        }


        function Solo_Letras(e){

            key= e.keyCode || e.which;
            tecla= String.fromCharCode(key) .toString();
            letras="QWERTYUIOPASDFGHJKLÑZXCVBNMqwertyuiopasdfghjklñzxcvbnm";

            especiales =[8,13];
            tecla_especial = false

            for(var i in especiales){

                if(key == especiales [i]){

                    tecla_especial = true;
                    break;

                }

            }

            if(letras.indexOf(tecla) == -1 && !tecla_especial){

                alert("Ingrese solo letras");
                return false;

            }

        }

    </script>

	<body>
		<div class="wrapper" style="background-image: url('../assets/img2.2.jpg')">
			<div class="glass"></div>

			<div class="inner">
				<div class="image-holder">
					<img src="../assets/imagen2.jpg" class="logo" alt="">
				</div>
				<div class="cont-header">
					<h1>Bienvenido</h1>
					<div class="tab-content" id="myTabContent"></div>
					<ul class="nav nav-tabs" id="myTab" role="tablist">

						<li class="nav-item" role="presentation">
							<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
							aria-controls="home" aria-selected="false">Ingrese Sus Datos</a>
						</li>
	
					</ul>
					<div class="login-content">
						<div class="tab-content" id="myTabContent">

							<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<form class="inicio" method="POST">
									<div class="input-div one">
										<div class="i">
											<i class="fas fa-user"></i>
										</div>
										
										<div class="div">
											<h5>Cedula</h5>
											<input type="text" class="input" maxlength="8" minlength="8" onkeypress="return Solo_Numero(event);" name="cedula" id="cedula">
											<input type="hidden" name="nombres" id="nombres" minlength="3" maxlength="20" required style="display: none;">
										</div>
									</div>
									<div class="input-div pass">
										<div class="i"> 
											<i class="fas fa-lock"></i>
										</div>
										<div class="div">
											<h5>Contraseña</h5>
											<input type="password" class="input" class="contraseña" name="password" id="password"  maxlength="20" minlength="4" name="pass">
											<i class="fa fa-eye" id="togglePassword" aria-hidden="true"></i>
										</div>
									</div>

									<p></p>
									<br>

									<div class="input_field captch_box">
										<input type="text" value="" disabled />
										<button class="refresh_button">
										<i class="fa-solid fa-rotate-right"></i>
										</button>
									</div>
									<div class="input_field captch_input">
										<input type="text" placeholder="Ingrese el Captcha" required />
									</div>
									<div class="message">El Captcha Ingresado es el Correcto</div>

									<p></p>

									<button class="boton" type="submit">INICIAR SESION</button>

									<div class="links">
									<p><a href="registro.php">¿No Posees Una Cuenta? Registrate</a></p>
									</div>

									<?php echo $exito; ?>
									<?php echo $error; ?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/main2.js"></script>
		<script src="../js/login.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="../js/ojo.js"></script>
        <script src="../js/funcionalidad_login.js"></script>
		<script src="assets/js/captcha.js"></script>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>