<?php
session_start();

session_destroy();



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
            <form action="functions/registrar.php" method="POST" autocomplete="off">
                
                <input type="text" placeholder="usuario" required name="usuario" autocomplete="new-text">
                <div class="bar">
                    <i></i> 
                </div>
                <input type="password" placeholder="contraseña" required name="clave" autocomplete="new-password">
                <input type="email" placeholder="correo electronico" required name="email" autocomplete="new-text">
</br>
                <button type="submit">Crear nuevo usuario</button>
                
            </form>
        </div>
        <!--Fin 
            Login-->

    </content>
    <footer>

    </footer>

</body>

</html>