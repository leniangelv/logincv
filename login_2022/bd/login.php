<?php
session_start();

include_once'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepcion de Datos enviados mediante metodo POST desde Ajax

$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$pass = md5($password); //Encripto clave enviada por el Usuario y luego para compararla con la Clave Encriptada y Almacenada en la BD

$consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$pass' ";
$resultado = $conexion->prepare($consulta);
$resultado->execute();

if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION["s_usuario"] - $usuario;
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}

print json_encode($data);
$conexion=null;

// USUARIOS DE PRUEBA EN LA BASE DE DATOS
// admin : 12345
// leni : leni 