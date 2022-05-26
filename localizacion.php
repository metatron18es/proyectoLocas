<?php 
require_once("./functions/db.php");

$where = array(
    "id" => $_GET['idLocalizacion']
);
$localizaciones = select("localizaciones", array("*"), $where);
?>

<html>

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="estilos/estilos.css" rel="stylesheet" type="text/css">
    <title>Dónde Grabar</title>
    <!--<link rel="icon" type="image/x-icon" href="XXX"> FAVICON -->
</head>

<body>
    <?php include_once("./templates/header.php"); ?>
    <content>
    <?php
        while($localizacion = mysqli_fetch_object($localizaciones)) { ?> 
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Descripcion</th>
                    <th>Fotos</th>
                    <th>ID</th>
                </tr>
                <tr>
                    <td><?php echo $localizacion->nombre; ?></td>
                    <td><?php echo $localizacion->direccion; ?></td>
                    <td><?php echo $localizacion->descripcion; ?></td>
                    <td><?php echo $localizacion->fotos; ?></td>
                    <td><?php echo $localizacion->ID; ?></td>
                </tr>
            </table>
        <?php } ?>
    </content>
    <footer>

    </footer>

</body>

</html>