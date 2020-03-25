function consultarPaciente(){
    url="index.php?accion=consultarpaciente&documento" + $("#asifnarDocumento").val();
    $("#paciente").load(url);
}

$(document).ready(function(){
    $("#frmPaciente").dialog({
        autoOpen:false,
        height:310,
        width:400,
        modal:true,
        buttons:{
            "Insertar":insertarPaciente,
            "Cancelar":cancelar
        }
    });
});

function mostrarFormulario(){

    documento = "" +$("#asignarDocumento").val();
    $("#PacDocumento").attr("value", documenta);
    $("#frmPaciente").dialog("open");

}

function insertarPaciente(){
    $(this).dialog("close");
    queryString=$("#agregarPaciente").serialize();
    url="index.php?accion=ingresarpaciente&" +queryString;
    $("#paciente").load(url);
}

function cancelar(){
    $(this).dialog("close");
}

$(document).ready(function(){
    $("#fecha").datepicker({
        dateformat:"yy-mm-dd",
        changeMonth:true,
        changeYear:true
    });
    $("#PacNacimiento").datepicker({
        dateformat:"yy-mm--dd",
        changeMonth:true,
        changeYear:true
    })
});

function cargarHoras(){ 

    if(($("#medico").val()==-1)||($("#fecha").val()=="")){
        $("#hora").html("<option value='-1' selected='selected'>---Seleccione La Hora---</option>");
    }
    else{
        queryString = "medico" + $("#medico").val() + "&fecha"+$("#fecha").val();
        url="index.php?accion=consultarHora&"+queryString;
        $("#hora").load(url);
    }
}

function seleccionarHora(){
    if($("#medico").val()==-1){
        alert("Debe seleccionar un Medico");
    }
    else if($("#fecha").val()==""){
        alert("Debe seleccionar una fecha");
    }
}

function consultarCita(){
    url="index.php?accion=consultarcita&consultarDocumento="+$("#consultarDocumento").val();
    $("#paciente2").load(url);
}
function cancelarCita(){
    url="index.php?accion=cancelarcita&cancelarDocumento="+$("#cancelarDocumento").val();
    $("#paciente3").load(url);
}

function confirmarCancelar(numero){
    if (confirm("Esta seguro que desea cancelar la cita"+numero)){
        $.get("index.php",{accion:'confirmarCancelar',numero:numero},function(mensaje){
            $("#ejecutar").html(mensaje);
        });
    }
    $("#cancelarConsultar").trigger();
}