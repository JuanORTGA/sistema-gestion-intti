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

		<style>
			/* Correccion de escala, zoom y adaptabilidad movil */
			.wrapper {
				min-height: 100vh !important;
				display: flex !important;
				align-items: center !important;
				justify-content: center !important;
				padding: 1.5rem !important;
				box-sizing: border-box !important;
			}
			.inner {
				max-width: 920px !important;
				width: 100% !important;
				margin: auto !important;
				display: flex !important;
				flex-direction: row !important;
				align-items: stretch !important;
				border-radius: 16px !important;
				overflow: hidden !important;
				background: #ffffff !important;
				box-shadow: 0 15px 35px rgba(0,0,0,0.2) !important;
			}
			.inner .image-holder {
				flex: 1 1 50% !important;
				width: 50% !important;
				min-width: 0 !important;
				background: #fffdf5 !important;
				display: flex !important;
				align-items: center !important;
				justify-content: center !important;
				padding: 2rem !important;
				border-right: 1px solid rgba(0,0,0,0.06) !important;
				box-sizing: border-box !important;
			}
			.inner .image-holder img.logo {
				max-width: 100% !important;
				width: auto !important;
				max-height: 380px !important;
				height: auto !important;
				object-fit: contain !important;
			}
			.cont-header {
				flex: 1 1 50% !important;
				width: 50% !important;
				min-width: 0 !important;
				padding: 2rem 2.25rem !important;
				display: flex !important;
				flex-direction: column !important;
				justify-content: center !important;
				text-align: center !important;
				box-sizing: border-box !important;
			}
			.login-content {
				width: 100% !important;
				max-width: 380px !important;
				margin: 0 auto !important;
			}
			.inner form {
				width: 100% !important;
				padding: 0 !important;
			}
			.input-div > div {
				position: relative !important;
			}
			.fa-eye {
				position: absolute !important;
				right: 10px !important;
				top: 50% !important;
				transform: translateY(-50%) !important;
				font-size: 16px !important;
				color: #999 !important;
				cursor: pointer !important;
				z-index: 10 !important;
			}
			.input_field {
				width: 100% !important;
				margin-top: 10px !important;
				position: relative !important;
			}
			.captch_box {
				display: flex !important;
				align-items: center !important;
			}
			.captch_box input {
				width: 100% !important;
				text-align: center !important;
				letter-spacing: 4px !important;
				font-weight: bold !important;
			}
			.refresh_button {
				position: absolute !important;
				right: 6px !important;
				top: 50% !important;
				transform: translateY(-50%) !important;
				background: #28a745 !important;
				border: none !important;
				color: #fff !important;
				border-radius: 4px !important;
				width: 30px !important;
				height: 30px !important;
			}
			.captch_input input {
				width: 100% !important;
			}
			.boton {
				width: 100% !important;
				border-radius: 25px !important;
				background: linear-gradient(135deg, #28a745 0%, #20c997 100%) !important;
				font-weight: 600 !important;
			}

			/* Reglas responsivas para tablets y telefonos moviles */
			@media (max-width: 860px) {
				.wrapper {
					padding: 1rem !important;
				}
				.inner {
					flex-direction: column !important;
					max-width: 440px !important;
					border-radius: 14px !important;
				}
				.inner .image-holder {
					width: 100% !important;
					flex: none !important;
					padding: 1.5rem 1rem 0.5rem !important;
					border-right: none !important;
					border-bottom: 1px solid rgba(0,0,0,0.06) !important;
					background: transparent !important;
				}
				.inner .image-holder img.logo {
					max-height: 140px !important;
					width: auto !important;
				}
				.cont-header {
					width: 100% !important;
					flex: none !important;
					padding: 1rem 1.5rem 1.75rem !important;
				}
				.cont-header h1 {
					font-size: 1.5rem !important;
					margin-bottom: 0.5rem !important;
				}
			}

			@media (max-width: 480px) {
				.wrapper {
					padding: 0.5rem !important;
				}
				.inner {
					max-width: 100% !important;
					border-radius: 12px !important;
				}
				.inner .image-holder img.logo {
					max-height: 110px !important;
				}
				.cont-header {
					padding: 0.75rem 1rem 1.25rem !important;
				}
				.cont-header h1 {
					font-size: 1.3rem !important;
				}
				.boton {
					font-size: 0.95rem !important;
					padding: 0.65rem !important;
				}
			}
		</style>
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