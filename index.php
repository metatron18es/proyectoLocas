<?php

session_start();



if(isset($usuario)){
    echo "<script type='text/javascript'>alert('Bienvenido " . $usuario . "');</script>";
    header("location: userprofile.php");
}


?>

<html>

<head>

    <meta charset="UTF-8">
    <script type="text/javascript" src="logica.js"></script>
    <link href="estilos/estilos.css" rel="stylesheet" type="text/css">
    <title>Dónde Grabar</title>
    <!--<link rel="icon" type="image/x-icon" href="XXX"> FAVICON -->
</head>

<body>
    <?php include_once("./templates/header.php"); ?>
    <content>
        <div class="homecontent">

        </div>

    </content>
    <footer>

    </footer>

</body>

</html>