# Sistema de Informacion y Gestion Territorial - INTI

## Descripcion General
Este proyecto es una plataforma web desarrollada para el Instituto Nacional de Tierras (INTI). Su proposito fundamental es centralizar, organizar y facilitar el registro y seguimiento de los campesinos, productores agricolas, organizaciones agrarias y el personal administrativo de la institucion.

A traves de la plataforma, los funcionarios pueden gestionar censos campesinos, supervisar procesos de formacion y capacitacion, analizar datos estadisticos mediante indicadores graficos y publicar novedades o comunicados institucionales. Al mismo tiempo, los campesinos cuentan con un espacio individual donde consultar su ficha de registro y enterarse de las actividades y noticias pertinentes.

---

## Estructura y Arquitectura del Sistema
El aplicativo esta disenado bajo una estructura modular en PHP, con separacion clara entre la persistencia de datos, la logica de control y las interfaces de usuario.

* index.php: Enrutador de entrada al sistema que redirecciona al usuario al inicio de sesion.
* db/: Capa de conexion a la base de datos mediante PHP Data Objects (PDO) y operaciones CRUD (creacion, consulta, actualizacion y eliminacion), junto con endpoints que suministran datos en formato JSON para las graficas.
* log/: Modulo de acceso publico. Incluye el formulario de inicio de sesion (login), el registro guiado paso a paso para nuevos productores con seleccion territorial y las validaciones de entrada en el cliente.
* c/: Panel de control y vista del perfil para usuarios con estatus de Campesino.
* v/: Panel administrativo para funcionarios y personal del INTI. Contiene los listados maestros con DataTables, herramientas de busqueda en tiempo real, generadores de reportes, creacion de noticias y paneles con graficas.
* inicio/: Recursos visuales compartidos de la plantilla administrativa SB Admin 2 (estilos CSS, scripts JS, iconos y tipografias).
* assets/, css/, js/, fonts/: Librerias de terceros, plugins auxiliares y hojas de estilo complementarias.
* inti.sql: Volcado de la estructura de la base de datos relacional y datos base territoriales de Venezuela.

---

## Tecnologias y Herramientas Empleadas

### Backend
* PHP (version 8.x / 7.4+): Lenguaje principal del servidor, implementando PDO para consultas SQL preparadas y el algoritmo Bcrypt (password_hash y password_verify) para la proteccion de credenciales.
* MySQL / MariaDB (version 10.4+): Motor de base de datos relacional.

### Frontend
* HTML5: Marcado semantico para formularios y estructuras modales.
* CSS3 / SCSS: Hojas de estilo personalizadas y reglas de adaptabilidad.
* Bootstrap (v4 y componentes v5): Sistema de grillas, diseno responsivo y componentes de interfaz.
* SB Admin 2: Plantilla base de panel de administracion.
* JavaScript (ES6) y jQuery (v3.x): Control de eventos, peticiones asincronas mediante AJAX y validaciones en tiempo real en los campos de formulario.

### Librerias y Plugins Auxiliares
* DataTables: Tablas interactivas con paginacion, ordenamiento y buscador instantaneo.
* Extensiones DataTables (JSZip, pdfmake, vfs_fonts): Exportacion directa de registros a formatos Excel, PDF e impresion en navegador.
* Chart.js: Renderizado de graficos estadisticos (graficos circulares y de distribucion).
* SweetAlert / SweetAlert2: Ventanas modales y cuadros de confirmacion interactivos.
* Select2: Listas desplegables con filtrado dinamico.
* GSDK Bootstrap Wizard: Formularios de registro interactivos en varios pasos.
* FontAwesome y Material Design Iconic Font: Paquetes de iconos de interfaz.

---

## Modelo de Base de Datos
La base de datos del sistema se denomina inti y cuenta con las siguientes entidades principales:

1. usuarios: Contiene la informacion demografica, ubicacion geografica (estado, municipio, parroquia, sector), datos de produccion (cosechas, cria de animales, alimentos), situacion juridica, organizacion a la que pertenece y credenciales de acceso de los campesinos.
2. empleados: Almacena los registros del personal institucional del INTI, datos de contacto, rol y contrasenas encriptadas.
3. estados, municipios, parroquias: Tablas que contienen la division politico-territorial de Venezuela para alimentar los selectores dinamicos del registro.
4. noticias: Publicaciones, convocatorias y comunicados generados por los administradores.
5. participaciones: Registro de participacion de usuarios en eventos o convocatorias institucionales.

---

## Requisitos de Instalacion
Para ejecutar este proyecto en un entorno local se recomienda contar con:
* Servidor web Apache con soporte para PHP 7.4 o superior (recomendado PHP 8.1 o 8.2).
* Servidor de base de datos MySQL o MariaDB.
* Paquete de integracion recomendado: XAMPP, WampServer o Laragon.
* Navegador web moderno (Google Chrome, Mozilla Firefox, Microsoft Edge).

---

## Guia de Puesta en Marcha

1. Ubicacion del proyecto:
   Copiar o clonar la carpeta del proyecto dentro del directorio publico del servidor web:
   * En XAMPP para Windows: C:\xampp\htdocs\Sistema del INTTI

2. Inicializacion de servicios:
   Abrir el panel de control de XAMPP (o el servidor utilizado) e iniciar los servicios de Apache y MySQL.

3. Importacion de la base de datos:
   * Acceder al gestor phpMyAdmin desde el navegador (habitualmente http://localhost/phpmyadmin).
   * Crear una nueva base de datos llamada inti con cotejamiento utf8mb4_general_ci.
   * Seleccionar la base de datos recien creada, ir a la pestana "Importar" y cargar el archivo inti.sql ubicado en la raiz del proyecto.

4. Verificacion de credenciales de conexion:
   Abrir el archivo db/db.php y constatar que los parametros coincidan con la configuracion de su servidor local:
   * Servidor: localhost
   * Usuario: root
   * Contrasena: (vacio por defecto en XAMPP)
   * Base de datos: inti

5. Acceso a la aplicacion:
   Ingresar desde el navegador a la direccion:
   http://localhost/Sistema del INTTI/

El sistema lo redireccionara automaticamente a la pantalla de inicio de sesion (log/login.php).

---

## Roles y Flujo de Trabajo

### Flujo de Acceso (Login)
Al ingresar usuario (o cedula) y contrasena:
* El sistema evalua primero si corresponde a un registro en la tabla de usuarios con estatus Campesino. De ser afirmativo, inicia sesion y lo envia a la vista c/index.php.
* Si el usuario pertenece a la tabla de empleados y cuenta con estatus activo de empleado, inicia sesion y lo redirecciona al panel administrativo v/index.php.

### Modulo Administrativo (Funcionarios)
* Inicio / Dashboard: Metricas generales y accesos directos.
* Tabla de Campesinos: Gestion integral de productores (visualizacion, edicion y baja con confirmacion de cedula).
* Organizacion y Comandos Campesinos: Registro y control de las asociaciones agrarias y su condicion juridica.
* Proceso Formativo: Censo de necesidades de formacion, horarios disponibles y areas tecnicas de interes.
* Reportes Estadisticos: Graficas dinamicas que representan la distribucion legal de las tierras y fuentes de ingreso.
* Noticias: Modulo para redactar comunicados con opcion de participacion ciudadana.
* Personal: Registro y control de los funcionarios con acceso al sistema.

### Modulo Campesino
* Ficha personal: Consulta de datos personales, ubicacion registrada y ficha productiva.
* Novedades: Visualizacion de comunicados y convocatorias emitidas por la institucion.

---

## Consideraciones de Seguridad y Buenas Practicas
* Sentencias preparadas: Todas las consultas que reciben valores del usuario utilizan marcadores de posicion con PDO, previniendo inyecciones de codigo SQL.
* Encriptacion de contrasenas: Las contrasenas nunca se almacenan en texto plano; se procesan mediante la funcion nativa password_hash usando el algoritmo Bcrypt.
* Confirmacion de borrado: En las acciones de eliminacion de registros se exige confirmar la cedula de identidad de la persona para evitar borrados accidentales.
* Sanitizacion de salidas: Los valores mostrados en tablas y resultados dinámicos son procesados con htmlspecialchars para mitigar vulnerabilidades de Cross-Site Scripting (XSS).
