<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dentex| Asignar cita</title>
  <link rel="stylesheet" href="/clinica/vista/css/estilo.css">
  <link rel="stylesheet" href="/clinica/vista/jquery/jquery-ui.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="/clinica/vista/jquery/jquery-1.11.3.min.js"></script>
  <script src="/clinica/vista/jquery/jquery-ui.js"></script>
  <script src="/clinica/vista/js/script.js"></script>
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
      <li class="active">
      <a class="nav-link" href="index.php?accion=asignar"><span class="boton3"><img class="nav-icon" src="../vista/img/cita.png" width="20" height="20" class="d-inline-block align-center" alt="">Asignar Cita</span></a>
      </li>
      <li class="nav-ite">
      <a class="nav-link" href="index.php?accion=consultar"><span class="boton3"><img class="nav-icon" src="../vista/img/consulta.png" width="20" height="20" class="d-inline-block align-center" alt="">Consultar cita</span></a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="index.php?accion=cancelar"><span class="boton3"><img class="nav-icon" src="../vista/img/cancelar.png" width="20" height="22" class="d-inline-block align-center" alt="">Cancelar cita</a>
      </li>
    </ul>
    
  </div>
</nav>




<div id="contenido">
      <h2>Asignar Cita</h2>
      
      <form action="index.php?accion=guardarCita" method="post" id="frmasignar">
        <table>
          <tr>
            <td>Documento del Paciente</td>
            <td><input type="text" name="asignarDocumento" id="asignarDocumento"/></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="button" name="asignarConsulta" value="Consultar" id="asignarConsulta" onclick="consultarPaciente()" />
            </td>
          </tr>
          <tr><td colspan="2">
              <div id="Paciente"><br></div></td></tr>
          <tr>
            <td>Medico</td>
               <td>
                 <select id="medico" name="medico" onchange="cargarHoras()">
                  <option value="-1" selected="selected">seleccione el medico</option>
                   <?php 
                      while($fila = $result -> fetch_object()){
                        ?>
                        <option value="<?php echo $fila->MedIdentificacion?>">
                        <?php echo $fila->MedIdentificacion." ".$fila->MedNombres." ".$fila->MedApellidos?>
                      </option>
                      <?php
                      }
                   ?>
                 </select>
               </td>
          </tr>
          <tr>
            <td>Fecha</td>
            <td><input type="date" name="fecha" readonly="readonly" onchange="cargarHoras()"></td><br>
          </tr>
          <tr>
            <td>Hora</td>
            <td>
              <select id="hora" name="hora" onmousedown="seleccionarHora()">
                <option value="-1" selected="selected">seleccione la hora</option>
                
              </select>
            </td>
          </tr>

          <tr>
            <td>Consultorio</td>
            <td>
              <select id="Consultorio" name="Consultorio">
                <option value="-1" selected="selected">Seleccione el Consultorio</option>
                    <?php
                        while($fila2 = $result2 -> fetch_object()){
                    ?>
                    <option value="<?php echo $fila2->ConNumero?>">
                    <?php echo $fila2->ConNumero." ".$fila2->ConNombre?>
                  </option>
                        <?php
                         }
                         ?>

              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" name="asignarEnviar" value="enviar" id="asignarEnviar"><br>
            </td>
          </tr>
        </table>
        
      </form> 
    </div>  

    
  </div>
    <div id="frmPaciente" tittle="Agregar nuevo paciente">
        <form id="agregarPaciente">
          <table>
            <tr>
              <td>Documento:</td>
              <td><input type="text" name="PacDocumento" id="PacDocumento" readonly="readonly"></td>
            </tr>
            <tr>
              <td>Nombres</td>
              <td><input type="text" name="PacNombres" id="PacNombres"></td>
            </tr>
            <tr>
              <td>Apellidos</td>
              <td><input type="text" name="PacApellidos" id="PacApellidos"></td>
            </tr>
            <tr>
              <td>Fecha de Nacimiento</td>
              <td><input type="text" name="PacNacimiento" id="PacNacimiento"></td>
            </tr>
            <tr>
              <td>Sexo</td>
              <td>
                <select name="PacSexo" id="PacSexo">
                  <option value="-1">---Seleccione El Sexo---</option>
                  <option>M</option>
                  <option>F</option>
                </select>
              </td>
            </tr>


          </table>
        </form>
    </div>
</body>
</html>