<?php

require './conexionbasededatos.php';
require './logsdemensajes.php';

date_default_timezone_set('America/Bogota');

//Para pruebas
//$_POST['From'] = "whatsapp:+573156332247";
//$_POST['Body'] = "desde";
//$_POST['To'] = "whatsapp:+573156332247";


$numeroCelularOrigen = $_POST['From'];
$numeroCelularOrigen = substr($numeroCelularOrigen, 12);

$mensajeRecibido = $_POST['Body'];

$select = "select * from datosvascogsuitemoodle where numerocelular=" . $numeroCelularOrigen;
$resultado = $mysqli->query($select);
$fila = $resultado->fetch_assoc();

$nombres = "";
$apellidos = "";
$grado = $fila['grado'];

if ($fila == NULL) {
    $mensajeAEnviar = "Hola!!. Al parecer este número no está registrado en la base de datos :(";
} else {
    $nombres = $fila['nombres'];
    $apellidos = $fila['apellidos'];

    $emailGsuite = $fila['emailgsuite'];
    $contrasenaGsuite = $fila['contrasenagsuite'];

    $usuariomoodle = $fila['usuariomoodle'];
    $contrasenamoodle = $fila['contrasenamoodle'];
	
	

    $mensajeAEnviar = "Hola " . $nombres . " " . $apellidos . "
        
    Su correo institucional es: " . $emailGsuite . "
    La contraseña de este correo es: " . $contrasenaGsuite . "
    Recuerde que para usar este correo debe agregar una nueva cuenta de Google en su celular o computador.    
        
    Su usuario para ingresar a las aulas virtuales es: " . $usuariomoodle . "
    Su contraseña para ingresar a las aulas virtuales es: " . $contrasenamoodle . "
    Recuerde que para ingresar a las aulas virtuales debe ir a la dirección cevu.edu.co y hacer click en el ícono que dice moodle, para luego hacer click donde dice Acceder";
}


$string = "<?xml version='1.0' encoding='UTF-8'?><Response>
    <Message>" . $mensajeAEnviar . "        
</Message>

<Message>
De los videos a continuación observa primero el que te enseña como agregar tu cuenta institucional al celular
</Message>

<Message>  
En el siguiente video aprenderás a agregar tu cuenta institucional al celular
</Message> 

<Message> 
https://www.youtube.com/watch?v=93EDiw5geUA
</Message>

<Message>
Debes instalar el Google Meet en tu celular. En el video siguiente te enseñamos a cambiar 
cuentas en el Google Meet para que veas las reuniones que tienes programadas
https://www.youtube.com/watch?v=whhxo5BGyaE
</Message>
        
</Response>";

$numeroCelularEnvia = $_POST['To'];
$nombreUsuarioCelularOrigen = $nombres . " " . $apellidos;
$mensajeRecibido = $_POST['Body'];
$mensajeEnviado = $mensajeAEnviar;
$fechaHora = date("Y-m-d H:i:s");

ingresarLogDeMensajeBaseDeDatos($numeroCelularOrigen, $numeroCelularEnvia, $nombreUsuarioCelularOrigen, $mensajeRecibido, $mensajeEnviado, $fechaHora, $grado,$mysqli);

echo $string;
?>

