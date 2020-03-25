<?php
class GestorCita{
    public function agregarcita(cita$cita){
        $conexion = new Conexion();
        $conexion->abrir();
        $fecha = $cita->obtenerFecha();
        $hora = $cita->obtenerHora();
        $paciente = $cita->obtenerCita();
        $medico = $cita->obtenerMedico();
        $consultorio = $cita->obtenerConsultorio();
        $estado = $cita->obtenerEstado();
        $observaciones = $cita->obtenerObservaciones();
        $sql = "insert into citas values (null,'$fecha','$hora','$paciente','$medico','$consultorio','$estado',
        '$observaciones')";
        $conexion->consulta($sql);
        $citald = $conexion->obtenerCitald();
        $conexion->cerrar();
        return $citald;
    }
    public function consultarCitaPorid($id){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql="select paciente.*,medicos.*,consultorios.*,citas.* from pacientes,
        medicos,consultorios,citas where citas.CitPaciente = pacientes.PacIdentificacion
        and citas.Citmedico = medicos.MedIdentificacion
        and citas.CitConsultorio = consultorio.ConNumero
        and citas.Citnumero=$id";
        $conexion->consulta($sql);
        $result=$conexion->obtenerResult();
        $conexion->cerrar();
        return $result;

    }
    public function consultarCitasPorDocumento($doc){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql="select*
              from citas
              where CitPaciente ='$doc'
              and CitEstado= 'solicitada'";
        $conexion->consulta($sql);
        $result=$conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
      
    }
    public function consultarPaciente($doc){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql="select*
              from pacientes
              where PacIdentificacion ='$doc'";
        $conexion->consulta($sql);
        $result=$conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
                 

    }
    public function agregarPaciente(paciente $paciente){
        $conexion = new Conexion();
        $conexion->abrir();
        $identificacion = $paciente->obtenerIdentificacion();
        $nombres = $paciente->obtenerNombres();
        $apellidos = $paciente->obtenerApellidos();
        $fecha = $paciente->obtenerFehcaNacimiento();
        $sexo = $paciente->obeterSexo();
        $sql="insert into paciente values ('$identificacion','$nombres','$apellidos','$fecha','$sexo')";
        $conexion->consulta($sql);
        $filasAfectadas= $conexion->obtenerFilasAfectadas();
        $conexion->cerrar();
        return $filasAfectadas;


    }
    public function consultarMedicos(){
        $conexion = new Conexion();
        $conexion->abrir();
        $sql = "select* from medicos";
        $conexion->consulta($sql);
        $result=$conexion->obtenerResult();
        $conexion->cerrar();
        return $result;
    }


}
?>