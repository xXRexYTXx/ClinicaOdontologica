<?php
class Controlador{
    public function vePagina($ruta){
        require_once $ruta;
    }
    public function agregarCita($doc,$med,$fec,$hor,$con){
        $cita = new Cita(null,$fec,$hor,$doc,$med,$con,"Solicitada","Ninguna");
        $gestorCita = new GestorCita($cita);
        $id = $gestorCita -> agregarCita($cita);
        $result = $gestorCita->consultarCitaPorId($id);
        require_once "vista/html/confirmarCita.php";


    }
    public function consultarCitas($doc){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> consultarCitasPorDocumento($doc);
        require_once "vista/html/consultarCitas.php";
    }
    public function cancelarCitas($doc){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> consultarCitasPorDocumento($doc);
        require_once "vista/html/cancelarCitas.php";
    }
    public function consultarPacientes($doc){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> consultarPaciente($doc);
        require_once "vista/html/consultarPaciente.php";
    }

    public function agregarPaciente($doc,$nom,$ape,$fec,$sex){

        $paciente = new paciente($doc,$nom,$ape,$fec,$sex);
        $gestorCita = new GestorCita();
        $registros=$gestorCita->agregarPaciente($paciente);

        if ($registros>0){
            echo "Paciente insertado con exito";
        }
        else{
            echo "Error al insertar el paciente, intente de nuevo";

        }
    }

    public function cargarAsignar(){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> consultarMedicos();
        $result2 = $gestorCita -> consultarConsultorios();

        require_once "vista/html/asignar.php";
    }

    public function consultarHorasDisponibles($medico,$fecha){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> consultarHorasDisponibles($medico,$fecha);

        require_once "vista/html/consultarHoras.php";
    } 
    
    public function verCita($cita){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> consultarCitaPorId($cita);
       
        require_once "vista/html/confirmarCita.php";
    }
    
    public function conformarCancelarCita($cita){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> cancelarCita($cita);
        
        if ($registros>0){
            ?>
            <script>
            alert('Cancelacion Exitosa');
            window.location = 'index.php?accion=cancelar';
            </script>
            <?php
        }
        else{
            echo "Error al cancelar Cita, intente nuevamente";
        }
    }

    public function generarReporte($cita){
        $gestorCita = new GestorCita();
        $result = $gestorCita -> consultarCitaPorId($cita);
        ob_start();
        require_once "vista/html/reporteCita.php";
        $content = ob_get_clean();
        require_once "vista/pdf/html2pdf-4.03/html2pdf.class.php";
        $html2pfd = new HTML2PDF('P','A4','es');
        $html2pfd -> pdf -> SetDisplayMode('fullpage');
        $html2pfd -> writeHTML($content);
        $html2pfd -> Output('Informacion de la cita.pdf');

    }

}


?>