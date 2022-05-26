<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "dondegrabar";
    
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


    if($con){
        echo "Conectado correctamente";

    }else{
        echo "No se ha podido establecer conexión";
    }


?>