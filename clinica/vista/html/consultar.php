<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dentex| Consulatr</title>
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
  <span class="boton3"><img src="/clinica/vista/img/diente.png" width="15" height="15" class="d-inline-block align-center" alt="">
    Inicio</span>
  </a>
</nav>
	<!---->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">  
      <a class="nav-link" href="index.php?accion=asignar"><span class="boton3"><img class="nav-icon" src="../vista/img/cita.png" width="20" height="20" class="d-inline-block align-center" alt="">Asignar Cita</span></a>
      </li>
      <li class="active">
      <a class="nav-link" href="index.php?accion=consultar"><span class="boton3"><img class="nav-icon" src="../vista/img/consulta.png" width="20" height="20" class="d-inline-block align-center" alt="">Consultar cita</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="index.php?accion=cancelar"><span class="boton3"><img class="nav-icon" src="../vista/img/cancelar.png" width="20" height="22" class="d-inline-block align-center" alt="">Cancelar cita</a>
      </li>
    </ul>
   
  </div>
</nav>




		<div id="contenido">
			<h2>Consultar Cita</h2>
			<form action="index.php?accion=consultarCita" method="post" id="frmconsultar"></form>
                <table>
                <tr>
                    <td>Documento del Paciente</td>
                    <td><input type="text" name="consultarDocumento" id="consultarDocumento"></td>
                 </tr>
                 <tr>
                  <td colspan="2">
                    <input type="submit" name="consultarConsultar" id="consultarConsultar" value="Buscar">
                  </td>
                 </tr>
                 <tr><td colspan="2"><div id="paciente2"></div></td></tr>
                </table>
     
		</div>


	</div>
</body>
</html>