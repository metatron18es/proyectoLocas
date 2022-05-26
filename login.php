<?php
session_start();


  


if(isset($_SESSION['username'])){
    header("location: userprofile.php");
}else{
    if(isset($_GET['error']) && $_GET['error'] == 1) {
        echo "eres tontoooooo";
    }
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
        <!--Login-->
        <div class="wrap">
            <div class="avatar">
                <img src="imagenes/idavatar.png">
            </div>
            <form action="functions/loguear.php" method="POST" autocomplete="off">
                <input type="text" placeholder="usuario" required name="usuario" autocomplete="new-text">
                <div class="bar">
                    <i></i> 
                </div>
                <input type="password" placeholder="contraseña" required name="clave" autocomplete="new-password">
                <a href="" class="forgot_link">recuperar</a>
                <button type="submit">Identifícate</button>

</br></br></br>
                <a href="registro.php" ><button type="button">Registrate</button></a>
            </form>
        </div>
        <!--Fin 
            Login-->

    </content>
    <footer>

    </footer>

</body>

</html>