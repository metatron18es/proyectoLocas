<?php
require_once("./functions/db.php");

session_start();

if(!isset($_SESSION['username'])){
    header("location: login.php?error=1");
}


$provincias = ['Elige Provincia','Alava','Albacete','Alicante','Almería','Asturias','Avila','Badajoz','Barcelona','Burgos','Cáceres',
'Cádiz','Cantabria','Castellón','Ciudad Real','Córdoba','La Coruña','Cuenca','Gerona','Granada','Guadalajara',
'Guipúzcoa','Huelva','Huesca','Islas Baleares','Jaén','León','Lérida','Lugo','Madrid','Málaga','Murcia','Navarra',
'Orense','Palencia','Las Palmas','Pontevedra','La Rioja','Salamanca','Segovia','Sevilla','Soria','Tarragona',
'Santa Cruz de Tenerife','Teruel','Toledo','Valencia','Valladolid','Vizcaya','Zamora','Zaragoza'];


$where = array(
    "id" => $_GET['idLocalizacion']
);
$localizaciones = select("localizaciones", array("*"), $where);
$localizacion = mysqli_fetch_object($localizaciones);

if(!empty($_POST)){
    $camposUpdate = array();
    // foreach ($_POST as $nombreCampo => $valorCampoFormulario) {
    //     if($valorCampoFormulario != $localizacion->$nombreCampo) {
    //         $camposUpdate[$nombreCampo] = $valorCampoFormulario;
    //     }
    // }

    // Borrar cuando la base datos este completa
    if($_POST['nombre'] != $localizacion->nombre) {
        $camposUpdate['nombre'] = $_POST['nombre'];
    }
    if($_POST['descripcion'] != $localizacion->descripcion) {
        $camposUpdate['descripcion'] = $_POST['descripcion'];
    }
    if($_POST['direccion'] != $localizacion->direccion) {
        $camposUpdate['direccion'] = $_POST['direccion'];
    }
    if($_POST['provincia'] != $localizacion->provincia) {
        $camposUpdate['provincia'] = $_POST['provincia'];
    }
    // Hasta aqui

    update("localizaciones", $camposUpdate, $where);
    // La linea siguiente, hace una redirección. Es decir, te envía a otra pagina que tu quieras
    header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ProyectoLocas/modifyLocation.php?idLocalizacion=" . $_GET['idLocalizacion']);
}

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
        <div class="addform">
            <form class="formadd" name="addlocation" action="#" method="post" enctype="multipart/formdata" >
                <fieldset>
                    <h2 class="fs-title">Datos Generales de la Localización</h2>
                    <div class="row-form">
                        <div>
                            <input type="text" class="form-input" name="nombre" id="nombre" placeholder="Dale un nombre a la localización" value=<?php echo $localizacion->nombre; ?> >
                        </div>
                        <div>
                            <input type="text" class="form-input" name="direccion" id="direccion" placeholder="Dirección"  value=<?php echo $localizacion->direccion; ?>>
                        </div>
                        <div>
                            <input type="text" class="form-input" name="CP" id="CPLoca" placeholder="C.P." >
                        </div>
                        <div>
                            <input type="text" class="form-input" name="CP" id="MunicipioLoca" placeholder="Municipio" >
                        </div>
                        <div>
                            <select name="provincia" class="form-control">
                                <?php 
                                    foreach ($provincias as $key => $value) {
                                        echo "<option value='".$key."'";
                                        if($key == $localizacion->provincia) {
                                            echo "selected";
                                        }
                                        echo ">".$value."</option>";
                                    }
                                ?>
                              </select>
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <h2 class="fs-title">Caracteristicas de la localizacion</h2>
                   
                    <div class="row-form">
                        <input type="checkbox" id="vivienda" name="vivienda" value="1">
                        <label for="vivienda"> Vivienda</label>
                        <input type="checkbox" id="oficina" name="oficina" value="1">
                        <label for="oficina"> Oficina</label>
                        <input type="checkbox" id="negocio" name="negocio" value="1">
                        <label for="negocio"> Negocio / Local</label>
                        <input type="checkbox" id="industrial" name="industrial" value="1">
                        <label for="industrial"> Industrial</label>
                        <input type="checkbox" id="deportivo" name="deportivo" value="1">
                        <label for="deportivo"> Deportivo</label>

                    </div>
                    <div class="row-form">
                        <label>Naturaleza</label></br>
                        <input type="checkbox" id="costa" name="costa" value="costa">
                        <label for="costa"> Costa</label>
                        <input type="checkbox" id="montana" name="montana" value="montana">
                        <label for="montana"> Montaña</label>
                        <input type="checkbox" id="rio" name="rio" value="rio">
                        <label for="rio"> Rio</label>
                        <input type="checkbox" id="bosque" name="bosque" value="bosque">
                        <label for="bosque"> Bosque</label>
                        <input type="checkbox" id="campo" name="campo" value="campo">
                        <label for="campo"> Campo</label>
                        <input type="checkbox" id="parque" name="parque" value="parque">
                        <label for="parque"> Parque</label>
                    </div>
                    <div class="row-form">
                        <label>Equipamiento</label></br>
                        <input type="checkbox" id="luz" name="luz" value="luz">
                        <label for="luz"> Luz</label>
                        <input type="checkbox" id="agua" name="agua" value="agua">
                        <label for="agua"> Agua</label>
                        <input type="checkbox" id="aguacaliente" name="aguacaliente" value="aguacaliente">
                        <label for="laguacalienteuz"> Agua Caliente</label>
                        <input type="checkbox" id="aseos" name="aseos" value="aseos">
                        <label for="aseos"> Aseos</label>
                        <input type="checkbox" id="almacenamiento" name="almacenamiento" value="almacenamiento">
                        <label for="almacenamiento"> Almacenamiento</label>
                        <input type="checkbox" id="calefaccion" name="calefaccion" value="calefaccion">
                        <label for="calefaccion"> Calefaccion</label>
                        <input type="checkbox" id="A/C" name="A/C" value="A/C">
                        <label for="A/C"> A/C</label>
                    </div>
                    <div class="row-form">
                        <label>Accesos</label></br>
                        <input type="checkbox" id="piedecalle" name="piedecalle" value="piedecalle">
                        <label for="piedecalle"> Pie de Calle</label>
                        <input type="checkbox" id="ascensor" name="ascensor" value="ascensor">
                        <label for="ascensor"> Ascensor</label>
                        <input type="checkbox" id="movreducida" name="movreducida" value="movreducida">
                        <label for="movreducida"> Acceso Movilidad Reducida</label>
                        <input type="checkbox" id="aparcamiento" name="aparcamiento" value="aparcamiento">
                        <label for="aparcamiento"> Aparcamiento público cercano</label>
                        <input type="checkbox" id="parkingpago" name="parkingpago" value="parkingpago">
                        <label for="parkingpago"> Parking de Pago</label>
                       
                    </div>
                    <div class="row-form">
                        <label>Servicios</label></br>
                        <input type="checkbox" id="cocina" name="cocina" value="internet">
                        <label for="cocina">  Cocina</label>
                        <input type="checkbox" id="wifi" name="wifi" value="wifi">
                        <label for="wifi"> Wifi</label>
                        <input type="checkbox" id="office" name="office" value="office">
                        <label for="office"> Office / Comedor</label>
                        <input type="checkbox" id="frigorifico" name="frigorifico" value="frigorifico">
                        <label for="frigorifico"> Frigorifico / Nevera </label></br>
                        </br>
                        <input type="text" name="fname" placeholder="Otros" />
                    </div>
                    <div class="row-form">
                        <h2 class="fs-title">Descripcion Detallada</h2>
                        <textarea id="descripcion" name="descripcion" rows="20" cols="120" placeholder="Describa la localizacion aqui..."><?php echo $localizacion->descripcion; ?></textarea>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="row-form">
                        <h2>Requisitos y Condiciones</h2>
                        </br>
                        <label for="precio"> Precio de la localización</label>
                        <input type="number" id="precio" name="precio" value="0" min="0" max="9999"><p> / hora</p>
                    
                        <p>Son necesarios permisos para la grabacion?</p>
                        <input type="radio" id="si" name="permisos" value="si">
                        <label for="si">Si</label><br>
                        <input type="radio" id="no" name="permisos" value="no">
                        <label for="no">No</label><br>
                    </div>

                </fieldset>
                <fieldset>
                    <div>
                        <p>Fotografias</p>
                        <label for="myfile">Select a file:</label>
                        <input type="file" id="foto" name="myfile" accept="image/png, image/gif, image/jpeg" multiple>
                    </div>

                </fieldset>
                <fieldset>
                    <input class="button" type="submit" value="Añadir Localización">
                </fieldset>

            </form>

        </div>

    </content>
    <footer>

    </footer>

</body>

</html>