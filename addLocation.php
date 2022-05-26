<?php
require_once("./functions/db.php");

session_start();


  


if(!isset($_SESSION['username'])){
    echo "<script type='text/javascript'>alert('Debes estar registrado para añadir una localización');</script>";
    header("location: login.php?error=1");
}else{

}

if(!empty($_POST)){
    // He creado un array con solo los campos que tenemos en la base de datos actualmente
    // Comprueba si no esta vacio el campo y lo añade al array
    // Cuando esten todos los campos en la tabla de la base de datos, se podra automatizar esto metiendo todo en un foreach

    $camposInsert = array();
    foreach ($_POST as $key => $value) {
        if($_POST[$key] != '') {
            $camposInsert[$key] = $_POST[$key];
        }
    }

    $camposInsert = array();
    $camposInsert['id_usuario'] = $_SESSION['id_usuario'];

    // Borrar cuando la base datos este completa
    if($_POST['nombre'] != '') {
        $camposInsert['nombre'] = $_POST['nombre'];
    }
    if($_POST['descripcion'] != '') {
        $camposInsert['descripcion'] = $_POST['descripcion'];
    }
    if($_POST['direccion'] != '') {
        $camposInsert['direccion'] = $_POST['direccion'];
    }
    // Hasta aqui
    
    if (!empty($camposInsert)) {
        $id_localizacion = insert("localizaciones", $camposInsert);
        // La linea siguiente, hace una redirección. Es decir, te envía a otra pagina que tu quieras
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ProyectoLocas/localizacion.php?idLocalizacion=" . $id_localizacion);
    }
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
                            <input type="text" class="form-input" name="nombre" id="nombre" placeholder="Dale un nombre a la localización" >
                        </div>
                        <div>
                            <input type="text" class="form-input" name="direccion" id="direccion" placeholder="Dirección" >
                        </div>
                        <div>
                            <input type="text" class="form-input" name="CP" id="CPLoca" placeholder="C.P." >
                        </div>
                        <div>
                            <input type="text" class="form-input" name="CP" id="MunicipioLoca" placeholder="Municipio" >
                        </div>
                        <div>
                            <select  name="provincia" class="form-control">
                                <option value="">Elige Provincia</option>
                                <option value="Álava/Araba">Álava/Araba</option>
                                <option value="Albacete">Albacete</option>
                                <option value="Alicante">Alicante</option>
                                <option value="Almería">Almería</option>
                                <option value="Asturias">Asturias</option>
                                <option value="Ávila">Ávila</option>
                                <option value="Badajoz">Badajoz</option>
                                <option value="Baleares">Baleares</option>
                                <option value="Barcelona">Barcelona</option>
                                <option value="Burgos">Burgos</option>
                                <option value="Cáceres">Cáceres</option>
                                <option value="Cádiz">Cádiz</option>
                                <option value="Cantabria">Cantabria</option>
                                <option value="Castellón">Castellón</option>
                                <option value="Ceuta">Ceuta</option>
                                <option value="Ciudad Real">Ciudad Real</option>
                                <option value="Córdoba">Córdoba</option>
                                <option value="Cuenca">Cuenca</option>
                                <option value="Gerona/Girona">Gerona/Girona</option>
                                <option value="Granada">Granada</option>
                                <option value="Guadalajara">Guadalajara</option>
                                <option value="Guipúzcoa/Gipuzkoa">Guipúzcoa/Gipuzkoa</option>
                                <option value="Huelva">Huelva</option>
                                <option value="Huesca">Huesca</option>
                                <option value="Jaén">Jaén</option>
                                <option value="La Coruña/A Coruña">La Coruña/A Coruña</option>
                                <option value="La Rioja">La Rioja</option>
                                <option value="Las Palmas">Las Palmas</option>
                                <option value="León">León</option>
                                <option value="Lérida/Lleida">Lérida/Lleida</option>
                                <option value="Lugo">Lugo</option>
                                <option value="Madrid">Madrid</option>
                                <option value="Málaga">Málaga</option>
                                <option value="Melilla">Melilla</option>
                                <option value="Murcia">Murcia</option>
                                <option value="Navarra">Navarra</option>
                                <option value="Orense/Ourense">Orense/Ourense</option>
                                <option value="Palencia">Palencia</option>
                                <option value="Pontevedra">Pontevedra</option>
                                <option value="Salamanca">Salamanca</option>
                                <option value="Segovia">Segovia</option>
                                <option value="Sevilla">Sevilla</option>
                                <option value="Soria">Soria</option>
                                <option value="Tarragona">Tarragona</option>
                                <option value="Tenerife">Tenerife</option>
                                <option value="Teruel">Teruel</option>
                                <option value="Toledo">Toledo</option>
                                <option value="Valencia">Valencia</option>
                                <option value="Valladolid">Valladolid</option>
                                <option value="Vizcaya/Bizkaia">Vizcaya/Bizkaia</option>
                                <option value="Zamora">Zamora</option>
                                <option value="Zaragoza">Zaragoza</option>
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
                        <textarea id="descripcion" name="descripcion" rows="20" cols="120" placeholder="Describa la localizacion aqui..."></textarea>
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
                    <input class="button" type="submit" value="Añadir Localización" onclick="insert()">
                </fieldset>

            </form>

        </div>

    </content>
    <footer>

    </footer>

</body>

</html>