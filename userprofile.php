<?php
session_start();

require_once("./functions/db.php");


$camposSql = array("nombre", "descripcion", "direccion", "ID");

$condicionesBusqueda = array();
$condicionesBusqueda['id_usuario'] = $_SESSION['id_usuario'];

$localizaciones = select("localizaciones", $camposSql, $condicionesBusqueda);




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
            <div class="userdata">
                <p> Bienvenido a tu pagina de usuario <span id="user"></span></p>
                <p> A continuacion se listan todas las localizaciones que has incorporado a nuestra base de datos</p>
                
                <form action="functions/salir.php">
                    <input type="submit" value="Desconectar Usuario"></input>
                </form>
            </div>
            <div class="listado">
                <table>
                    <tr>
                        
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Municpio</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                    while($localizacion = mysqli_fetch_object($localizaciones)) { //consulta  multitabla para enseñar las locas de un usuario concreto//?> 
                        <tr>
                            <td><?php echo $localizacion->nombre; ?></td>
                            <td><?php echo $localizacion->descripcion; ?></td>
                            <td><?php echo $localizacion->direccion; ?></td>
                            <td>
                                <a href="modifyLocation.php?idLocalizacion=<?php echo $localizacion->ID; ?>"><img src="imagenes/modificar.png"/></a>
                            </td>
                            <td><img src="imagenes/delete.png"/></td>
                        </tr>
                    <?php } ?>


                    


            </div>

        </div>

    </content>
    <footer>

    </footer>

</body>

</html>