<?php
require_once("./functions/db.php");


$camposSql = array("nombre", "id", "descripcion");

if(!empty($_POST)) {
    $condicionesBusqueda = array();
    foreach ($_POST as $key => $value) {
        if(!empty($value) && $key != "interiorexterior") {
            $condicionesBusqueda[$key] = $value;
        }
    }
    $localizaciones = select("localizaciones", $camposSql, $condicionesBusqueda);
} else {
    $localizaciones = select("localizaciones", $camposSql);
}
?>

<html>

<head>

    <meta charset="UTF-8">
    <script type="text/javascript" src="js/buscador.js"></script>
    <link href="estilos/estilos.css" rel="stylesheet" type="text/css">
    <title>Dónde Grabar</title>
    <!--<link rel="icon" type="image/x-icon" href="XXX"> FAVICON -->
</head>

<body>
    <?php include_once("./templates/header.php"); ?>
    <content>
        <div class="leftsection">
            <form class="formsearch" name="busqueda" action="#" method="post">
                <div class="secciontitulo">
                    <p>Introduce las caracteristicas a buscar</p>
                    <div class="searchtext">
                        <input type="text" class="form-input" name="busqueda" id="busqueda" placeholder="¿Que deseas buscar?">
                    </div>
                </div>
                <div class="searchoptions">
                    <div class="searchwhere">
                        <input type="button" onclick="show('geograficas')" value="Caracteristicas Geograficas"></input>
                        <div class="row-form" id="geograficas" style="display:none">
                            <div>


                                <input type="text" class="form-input" name="Nombre" id="NombreLoca" placeholder="Nombre">

                            </div>
                            <div>

                                <input type="text" class="form-input" name="Direccion" id="DireccionLoca" placeholder="Dirección">

                            </div>
                            <div>

                                <input type="text" class="form-input" name="CP" id="CPLoca" placeholder="C.P.">

                            </div>
                            <div>

                                <input type="text" class="form-input" name="CP" id="MunicipioLoca" placeholder="Municipio">

                            </div>
                            <div>
                                <select name="provincia" class="form-control">
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
                    </div>
                    
                    <input type="button" onclick="show('generales')" value="Caracteristicas Generales"></input>
                    <div class="searchwhat" id="generales" style="display:none">
                        
                        
                        <div>
                            <input type="checkbox" id="vivienda" name="vivienda" value="vivienda">
                            <label for="vivienda"> Vivienda</label>
                            <input type="checkbox" id="oficina" name="oficina" value="oficina">
                            <label for="oficina"> Oficina</label>
                            <input type="checkbox" id="negocio" name="negocio" value="negocio">
                            <label for="negocio"> Negocio / Local</label>
                            <input type="checkbox" id="industrial" name="industrial" value="industrial">
                            <label for="industrial"> Industrial</label>
                            <input type="checkbox" id="deportivo" name="deportivo" value="deportivo">
                            <label for="deportivo"> Deportivo</label>

                        </div>
                        <div>
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
                        <div>
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
                            <input type="checkbox" id="parkinggratuito" name="parkinggratuito" value="parkinggratuito">
                            <label for="parkinggratuito"> Parking Gratuito</label>
                        </div>
                        </div>
                        <input type="button" onclick="show('equipamiento')" value="Equipamiento"></input>
                        <div class="Equipamiento" id="equipamiento" style="display:none">
                            
                            
                            <div>
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

                            <div>
                                <input type="checkbox" id="internet" name="internet" value="internet">
                                <label for="internet"> Conexion a internet</label>
                                <input type="checkbox" id="wifi" name="wifi" value="wifi">
                                <label for="wifi"> Wifi</label>
                                <input type="checkbox" id="office" name="office" value="office">
                                <label for="office"> Office / Comedor</label>
                                <input type="checkbox" id="frigorifico" name="frigorifico" value="frigorifico">
                                <label for="frigorifico"> Frigorifico / Nevera </label>
                                <input type="text" name="otros" placeholder="Otros" />
                            </div>

                        </div>
                    </div>
                <div class="searchbutton">
                    <input type="SUBMIT" value="Buscar">
                </div>
            </form>
        </div>
        <div class="searchresult">
            <div class="row">
                <?php 
                    while($localizacion = mysqli_fetch_object($localizaciones)) { ?>                       
                        <div class="locationcard">
                        <div class="cardimg">
                            <img class="preview" src="imagenes/1080.jpg">
                            <div class="carddata">
                                <div class="cardname">
                                    <h3><?php echo $localizacion->nombre; ?></h3>
                                </div>
                                <div class="cardref">
                                    <h5><?php echo $localizacion->id; ?></h5>
                                </div>
                                <div class="carddescription">
                                    <p><?php echo $localizacion->descripcion; ?></p>
                                </div>

                                <div class="cardbutton">
                                    <a href="localizacion.php?idLocalizacion=<?php echo $localizacion->id; ?>">Mas info</a>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php }?>
            </div>

    </content>
    <footer>

    </footer>

</body>

</html>

