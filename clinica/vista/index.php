<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>|Dentex|</title>
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
	

<?php
require_once '../controlador/controlador.php';
require_once '../modelo/gestorcita.php';
require_once '../modelo/cita.php';
require_once '../modelo/paciente.php';
require_once '../modelo/conexion.php';

$controlador = new Controlador();

if(isset($_GET['accion'])){
	if($_GET['accion']=="asignar"){
		require_once'../vista/html/asignar.php';
	}
	elseif($_GET['accion']=="consultar"){
		require_once'../vista/html/consultar.php';
	}
	elseif($_GET['accion']=="cancelar"){
		require_once'../vista/html/cancelar.php';
	}
	elseif($_GET['accion']=="guardarCita"){
		$controlador->agregarCita($_POST['asignarDocumento'],$_POST['medico'],$_POST['fecha'],$_POST['hora'],$_POST['consultorio']);
	}
	elseif($_GET['accion']=="consultarcita"){
		$controlador->consultarCitas($_GET['consultarDocumento']);
	}
	elseif($_GET['accion']=="cancelarCita"){
		$controlador->cancelarCitas($_GET['cancelarDocumento']);
	}
	elseif($_GET['accion']=="consultarpaciente"){
		$controlador->consultarPaciente($_GET['Documento']);
	}
	elseif($_GET['accion']=="ingresarpaciente"){
		$controlador->agregarPaciente($_GET['PacDocumento'],$_GET['PacNombres'],$_GET['PacApellidos'],$_GET['PacNacimiento'],$_GET['PacSexo']);
	}
	elseif($_GET['accion']=="consultarHora"){
		$controlador->consultarHorasDisponibles($_GET['medico'],$_GET['fecha']);
	}
	elseif($_GET['accion']=="verCita"){
		$controlador->verCita($_GET['numero']);
	}
	elseif($_GET['accion']=="confirmarCancelar"){
		$controlador->confirmarCancelarCita($_GET['numero']);
	}
	elseif($_GET['accion']=="reporte"){
		$controlador->generearReporte($_GET['numero']);
	}
}
else{
	require_once'../vista/html/inicio.php';
}


?>













</body>
</html>