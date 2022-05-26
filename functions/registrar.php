<?php
require_once("db.php");
echo "primer";
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$email=$_POST['email'];



 $comprobacion = mysqli_query(connect(),"SELECT * FROM usuarios WHERE nombre = '" . $usuario . "'");
 $contar = mysqli_num_rows($comprobacion);

if ($contar > 0){
    
    echo "<script type='text/javascript'>alert('EL nombre de usuario ya está en uso. Elige otro.');</script>";
    header("Refresh:0.1 , URL=../registro.php");
    
}else{
$sql = "INSERT INTO usuarios (nombre,pass,tipo,email) VALUES ('$usuario','$clave','1','$email')";
mysqli_query(connect(), $sql);
echo "Gracias por registrarte en dondegrabar.com";
echo $contar;
//header("location: ../login.php");
}
    



?>