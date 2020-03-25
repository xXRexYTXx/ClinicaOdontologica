<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>|Dentex|</title>
	<link rel="stylesheet" href="/clinica/vista/css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>

<body>
<?php
  $conexion=mysqli_connect("localhost","root","","bd_clinica") or die("problemas con la conexion");
?>


	<div id="contenedor">
		<div id="encabezado">
			<h3 id="titulo"></h3>
		</div>


		<nav class="navbar navbar-expand-lg ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
	<!---->
  <nav class="navbar ">
  <a class="navbar-brand" href="index.php">
  <span class="boton3"><img  src="/clinica/vista/img/diente.png" width="15" height="15" class="d-inline-block align-center" alt="">
    Inicio</span>
  </a>
</nav>
	<!---->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
	  
      <a class="nav-link" href="index.php?accion=asignar"><span class="boton3"><img class="nav-icon" src="../vista/img/cita.png" width="20" height="20" class="d-inline-block align-center" alt="">Asignar Cita</span></a>
		
      </li>
      <li class="nav-item">
      <a class="nav-link" href="index.php?accion=consultar"><span class="boton3"><img class="nav-icon" src="../vista/img/consulta.png" width="20" height="20" class="d-inline-block align-center" alt="">Consultar cita</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="index.php?accion=cancelar"><span class="boton3"><img class="nav-icon" src="../vista/img/cancelar.png" width="20" height="22" class="d-inline-block align-center" alt="">Cancelar cita</a>
      </li>
    </ul>
   
  </div>
</nav>




		<div id="contenido">
			<h2>Información General</h2>
			<p><strong>Dentex</strong> permine administrar el manejo de la informacion de los pacientes, tratamientos y citas, a traves de ua interface amigable.</p>
      <p>Dentex cuenta con las siguientes secciones.
      <ul>
       <li>Asignar Cita.</li>
       <li>Consultar Cita.</li>
       <li>Cancelar Cita.</li>
      </ul>
      </p>
		</div>

    
  </div>
  
  
</body>
</html>