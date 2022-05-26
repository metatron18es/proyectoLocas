<?php
require 'conexion.php';
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

$sql = "SELECT id, nombre from usuarios where nombre = '" . $usuario . "' and pass = '" . $clave . "'";
$consulta = mysqli_query($con, $sql);

if(mysqli_num_rows($consulta) > 0) {
    $result = mysqli_fetch_array($consulta);
    $_SESSION['id_usuario'] = $result['id'];
    $_SESSION['username'] = $result['nombre'];
    
    header("location:../index.php");
}else{
    echo "Datos incorrectos";
}

?>