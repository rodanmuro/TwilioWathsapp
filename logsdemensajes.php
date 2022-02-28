<?php

require './conexionbasededatos.php';

function ingresarLogDeMensajeBaseDeDatos($numeroCelularOrigen, $numeroCelularEnvia, 
        $nombreUsuarioCelularOrigen, $mensajeRecibido, $mensajeEnviado, $fechaHora, $grado,$mysqli) {

    $insert = "insert into logsdemensajes" .
            " (numerocelularorigen, "
            . "numerocelularenvia, "
            . "nombreusuariocelularorigen,"
            . "mensajerecibido,"
            . "mensajeenviado,"
            . "fechahora,"
			." grado)"
            . " values "
            . "('" . $numeroCelularOrigen . "',"
            . "'".$numeroCelularEnvia . "',"
            . "'".$nombreUsuarioCelularOrigen . "',"
            . "'".$mensajeRecibido . "',"
            . "'".  $mensajeEnviado . "',"
            . "'".$fechaHora . "', '"
			.$grado."')";
    
    if($mysqli->query($insert)===TRUE){
        //No hacer nada si se guarda el log en la base de datos
    }else{
        echo "Error ".$mysqli->error;
    };
    
    
    
}
