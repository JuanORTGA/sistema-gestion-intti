<?php
/**
 * Formulario de Registro Asistido para Campesinos (Wizard)
 *
 * Interfaz de registro secuencial por etapas (GSDK Bootstrap Wizard).
 * Guia al productor en el ingreso de sus datos personales, localizacion territorial
 * (alimentada por db/consult.php), seleccion de organizacion comunitaria,
 * necesidades de capacitacion y ficha agropecuaria.
 * Procesa la persistencia del nuevo usuario mediante db/register.php.
 *
 * @package INTI\Auth
 */

include '../db/db.php';
include '../db/consult.php';
include '../db/register.php';

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Instituto Nacional de Tierras - Registro de Campesino</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Fuentes y estilos del wizard -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
    <link href="assets/css/gsdk-bootstrap-wizard.css" type="text/css" rel="stylesheet"/>
    <link href="assets/css/home.css" type="text/css" rel="stylesheet"/>
    <link href="assets/css/cargando.css" rel="stylesheet" type="text/css">
  </head>

  <body>

    <script>

			function Solo_Numero(evt)
			{
				if(Window.event){

					keynum= evt.keyCode;

				}

				else{

					keynum = evt.which;

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
				letras="QWERTYUIOPASDFGHJKLÑZXCVBNMqwertyuiopasdfghjklñzxcvbnm, ' ' ";

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

    <!-- cargando -->
    <div class="cargando">
      <div class="loader-outter"></div>
      <div class="loader-inner"></div>
    </div>


    <div class="image-container set-full-height" style="background-image: url('../assets/img1.jpeg')">
      <div class="glass"></div>

      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-sm-offset-2">

            <div class="wizard-container">
              <div class="card wizard-card" data-color="orange" id="wizardProfile">
                <form action="#" method="post">
                  <div class="wizard-header">
                    <h3> Registrar Nueva Cuenta Cliente </h3>
                  </div>

                  <div class="wizard-navigation">
                    <ul>
                      <li><a href="#about" data-toggle="tab">Paso 1</a></li>
                      <li><a href="#account" data-toggle="tab">Paso 2</a></li>
                      <li><a href="#address" data-toggle="tab">Fin</a></li>
                    </ul>
                  </div>

                  <!--tab 1 -->

                  <div class="tab-content">
                    <div class="tab-pane" id="about">
                      <div class="row">
                        <div class="col-sm-10 col-sm-offset-1" >
                          <h3>Datos Personales - Ubicacion</h3>
                          <p>
                          </p>
                          <div class="form-group">
                            
                            <div>
                              <input type="text" name="nombres" id="nombres" class="form-control" maxlength="20" minlength="3" onkeypress="return Solo_Letras(event);" placeholder="Escriba su Nombre" required>
                            </div>

                            <div>
                              <input type="text" name="apellidos" id="apellidos" class="form-control" maxlength="20" minlength="3" onkeypress="return Solo_Letras(event);" placeholder="Escriba su Apellido" required>
                            </div>

                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <div class="form-group">

                            <div>
                              <input type="text" name="cedula" id="cedula"  class="form-control" onkeypress="return Solo_Numero(event);" min="3000000" max="30000000" minlength="7" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Escriba su Cedula" required>
                            </div>

                            <div>
                              <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"  min="1934-12-31"  max="1994-12-31" onkeypress="return Solo_Numero(event);" placeholder="Fecha De Nacimiento" required>
                            </div>

                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <div class="form-group">

                            <select class="form-control" name="sexo" id="sexo" required>
                              <option value="" disabled selected hidden>Sexo</option>
                              <option value="Hombre">Hombre</option>
                              <option value="mujer">Mujer</option>
                            </select>  

                            <div>
                              <input type="text" name="telefono" id="telefono" class="form-control" minlength="11" maxlength="11" name="telefono" id="telefono" onkeypress="return Solo_Numero(event);" placeholder="Escriba su Num. de Telefono" required>
                            </div>

                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <div class="form-group">

                            <select name="estado" id="estado" class="form-control" onchange="SeleccionarMunicipio(this.form)" required>
                              <option value="" disabled selected hidden>Estado </option>
                              <option>Amazonas</option>
                              <option>Anzoátegui</option>
                              <option>Apure</option>
                              <option>Aragua</option>
                              <option>Barinas</option>
                              <option>Bolivar</option>
                              <option>Carabobo</option>
                              <option>Cojedes</option>
                              <option>Delta Amacuro</option>
                              <option>Distrito Capital</option>
                              <option>Falcon</option>
                              <option>Guárico</option>
                              <option>Lara</option>
                              <option>Mérida</option>
                              <option>Miranda</option>
                              <option>Monagas</option>
                              <option>Nueva Esparta</option>
                              <option>Portuguesa</option>
                              <option>Sucre</option>
                              <option>Táchira</option>
                              <option>Trujillo</option>
                              <option>Vargas</option>
                              <option>Yaracuy</option>
                              <option>Zulia</option>
                            </select>

                            <div>
                              <input type="text" name="correo" id="correo" class="form-control" minlength="8" maxlength="30" placeholder="Correo Electronico" required>
                            </div>
            
                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <div class="form-group">

                            <select name="municipio" id="municipio" class="form-control" onchange="SeleccionarParroquia(this.form)" required>
                              <option value="" disabled selected hidden>Municipio</option>
                            </select>

                            <div>
                              <input type="password" name="password" id="password" class="form-control" placeholder="Escriba una Contraseña" required>
                              
                            </div>

                          </div>
                          
                             
                        
                        </div>

                        <p></p>
                        
                        <div class="col-sm-10 col-sm-offset-1">
                          <div class="form-group">
                            <select name="parroquia" id="parroquia" class="form-control" required>
                              <option value="" disabled selected hidden>Parroquia</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                          <div class="form-group">
                            
                            <div>
                              <input type="text" name="sector" id="sector" class="form-control"  maxlength="30" minlength="5" onkeypress="return Solo_Letras(event);" placeholder="Escriba su Sector" required>
                            </div>
                           
                          </div>
                        </div>

                        <p></p>

                      </div>
                    </div>
                    <!--fin tab 1 -->

                    <!--tab 2 -->

                    <div class="tab-pane" id="account">
                      <div class="tabla2">
                        <div class="col-sm-10 col-sm-offset-1">
                          <h3>Diagnostico Formativo</h3>
                          <div class="form-group">
                            <span>¿Pertenece a una organización campesina?</span>
                              <select class="form-control"  name="pert_organizacion" id="pert_organizacion" onchange="toggleInput()" required>
                                <option value=""disabled selected hidden>Indique</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                              </select>
                          </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>Indique el nombre de su organización:</span>
                          <div class="form-group">
                            <div>
                              <input type="text" name="name_org" id="name_org" class="form-control" placeholder="Example Org" required>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>¿Cuál es la principal fortaleza de su organización campesina o sector productivo?</span>
                          <div class="form-group">
                            <div>
                              <input type="text" name="fortaleza_org" id="fortaleza_org" class="form-control" placeholder="Indique" required>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>¿Cuál es el área donde le gustaria profundizar formativamente?</span>
                          <div class="form-group">
                            <div>
                              <input type="text" name="area_formativa" id="area_formativa" class="form-control" placeholder="Indique" required>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>Horario disponible</span>
                          
                            <div>
                              <select class="form-control"  name="horario_disponible" id="horario_disponible" class="form-control"required>
                                <option value=""disabled selected hidden>Indique</option>
                                <option value="mañana">Mañana</option>
                                <option value="tarde">Tarde</option>
                                <option value="noche">Noche</option>
                              </select>
                            
                          </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>Dias disponible para la formación</span>
                          <div class="form-group">
                            <select class="form-control"  name="dias_formacion" id="dias_formacion" class="form-control"required>
                              <option value=""disabled selected hidden>Indique</option>
                              <option value="lunes">Lunes</option>
                              <option value="martes">Martes</option>
                              <option value="miercoles">Miercoles</option>
                              <option value="jueves">Jueves</option>
                              <option value="viernes">Viernes</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!--fin tab 2 -->

                    <!--tab 3 -->

                    <div class="tab-pane" id="address">
                      <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                          <h3>Registro de Comando Campesino</h3>
                          <p>
                          </p>
                          <span>Hortalizas</span>
                          <div class="grupo3">

                            <select class="form-control" name="cosecha" id="cosecha" required>
                              <option value="Maiz">Maiz</option>
                              <option value="Sorgo">Sorgo</option>
                              <option value="Trigo">Trigo</option>
                              <option value="Soya">Soya</option>
                              <option value="Frijoles">Frijoles</option>
                              <option value="Caraotas">Caraotas</option>
                              <option value="Palma">Palma</option>
                              <option value="Girasol">Girasol</option>
                              <option value="Caña de Azucar">Caña de Azucar</option>
                              <option value="Café">Café</option>
                              <option value="Cacao">Cacao</option>
                            </select>  

                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>Avicultura</span>
                          <div class="grupo3">

                            <select class="form-control" name="comida" id="comida" required>
                              <option value="Carne">Carne</option>
                              <option value="Huevo">Huevo</option>
                            </select>  

                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>Crias</span>
                          <div class="grupo3">

                            <select class="form-control" name="crias" id="crias" required>
                              <option value="Cria de Ovinos">Cria de Ovinos</option>
                              <option value="Cria de Caprinos">Cria de Caprinos</option>
                              <option value="Cria de Cerdos">Cria de Cerdos</option>
                              <option value="Cunicultura(conejo)">Cunicultura(conejo)</option>
                              <option value="Piscicultura (peces)">Piscicultura (peces)</option>
                              <option value="Cria de Bovinos">Cria de Bovinos</option>
                              <option value="Cria de Bufalinos">Cria de Bufalinos</option>
                            </select>  

                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>Situacion Juridica del Terreno</span>
                          <div class="grupo3">

                            <select class="form-control" name="situacion_juridica" id="situacion_juridica" required>
                              <option value="Propio">Propio</option>
                              <option value="Alquilado">Alquilado</option>
                            </select>  

                          </div>
                        </div>

                        <p></p>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>Indiquie Fuentes Principales de Ingreso</span>
                          <div class="grupo3">

                            <select class="form-control" name="fuentes_ingresos" id="fuentes_ingresos" required>
                              <option value="Venta Directa">Venta Directa</option>
                              <option value="Venta en Consignacion">Venta en Consignacion</option>
                            </select>

                          </div>
                        </div>

                        <div class="col-sm-10 col-sm-offset-1">
                          <span>¿Pertenece a alguna Organización sin fines de lucro?</span>
                          <div class="grupo3">
                            <select name="oganizacion_fines_lucro" id="oganizacion_fines_lucro" class="form-control" required>
                              <option value=""disabled selected hidden>Indique</option>
                              <option value="Si">Si</option>
                              <option value="No">No</option>
                            </select>
                          </div>
                        </div>

                       <div class="col-sm-10 col-sm-offset-1">
                          <span>Indique el nombre de la organizacion</span>
                          <div class="grupo3">

                            <div>
                              <input type="text" name="organizacion_campesina" id="organizacion_campesina" class="form-control" placeholder="Indique" required>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!--fin tab 3 -->

                  <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="wizard-footer height-wizard">
                        <div class="pull-right">
                          <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm siguiente' name='next' value='Siguiente'/>
                          <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Fin' />
                        </div>

                        <br>
                          <div class="form-login">
                            <p>¿Ya Posees Una Cuenta? <a href="login.php">Inicia Sesion</a></p>
                          </div>
                        <br>

                        <div class="pull-left">
                          <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Atrás' />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <br>
                    </div>
                  </div>
                </form>
              </div>
            </div> 
          </div>
        </div>
      </div> 
    </div>


    <!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="../js/ojo.js"></script>

    <!--  Plugin for the Wizard -->
    <script src="assets/js/gsdk-bootstrap-wizard.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>

    <!-- venezuela estados y parroquias -->
    <script type="text/javascript" src="Municipios.js"></script>
    <script type="text/javascript" src="parroquias.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(window).load(function() {
          $(".cargando").fadeOut(1000);
        }); 
      }); 
    </script>

    <script>
    function toggleInput() {
      var select = document.getElementById("pert_organizacion");
      var input = document.getElementById("name_org");
      
      if (select.value == "Si") {
        input.disabled = false;
      } else {
        input.disabled = true;
      }
    }
    </script>

    


  </body>
</html>
