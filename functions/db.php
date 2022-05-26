<?php

function connect() {
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "dondegrabar";
    
    $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    
    if(mysqli_connect_errno()){
        echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
    }

    return $con;
}

/**
 * It takes a table name, an array of fields, and an optional array of where clauses, and returns a
 * mysqli result object.
 * 
 * @param tabla the table you want to select from
 * @param arrayCampos an array of the fields you want to select.
 * @param where array('id' => '1')
 * 
 * @return A mysqli_result object.
 */
function select($tabla = "", $arrayCampos = array("*"), $where = false ) {
    if($tabla != "") {
        if($arrayCampos[0] == "*") {
            $arrayCamposEntreComillas = $arrayCampos;
        } else {
            $arrayCamposEntreComillas = array();
            foreach ($arrayCampos as $key => $value) {
                $arrayCamposEntreComillas[$key] = "`" . $value . "`";
            }
        }
        $campos = implode(", ", $arrayCamposEntreComillas);
        $con = connect();
        $sql = "SELECT " . $campos . " FROM " . $tabla;

        /*Piter*/
        if ($where){

            $arrayWhere = array();
            foreach ($where as $key => $value) {
                $arrayWhere[] = "`" . $key . "` = '" . $value . "'";
            }

            $textoWhere = " WHERE " . implode(" AND ", $arrayWhere);

            $sql = $sql . $textoWhere;
        }

        
        // echo $sql;
        $result = mysqli_query($con, $sql);

        return $result;
    }
}

/**
 * It takes a table name and an array of data and inserts it into the database.
 * 
 * @param tabla The table you want to insert into.
 * @param arrayDatos This is the array of data you want to insert into the database. This array has the following form:
 * $arrayDatos = array(
 *  "nombreCampo1" => $valorCampo1,
 *  "nombreCampo2" => $valorCampo2,
 *  "nombreCampo3" => $valorCampo3,
 *  "nombreCampo4" => $valorCampo4
 * ); 
 * 
 * @return The ID of the last inserted row.
 */
function insert($tabla = "", $arrayDatos = array()) {
    // Si has enviado en que tabla quieres insertar y me has enviado datos para insertar en la tabla, hago cosas
    if($tabla != "" && !empty($arrayDatos)) {
        // Creo dos arrays, uno con los nombres de los campos y otro con los valores que vamos a meter en cada campo,
        // poniendo los tipos de comillas necesarias para cada uno
        $arrayCampos = array();
        $arrayValores = array();
        foreach ($arrayDatos as $key => $value) {
            $arrayCampos[] = "`" . $key . "`";
            $arrayValores[] = "'" . $value . "'";
        }
        // Convierto los arrays en cadenas de texto separadas por comas
        $stringCampos = implode(",", $arrayCampos);
        $stringValores = implode(",", $arrayValores);

        //Creo la sentencia INSERT de la base de datos: INSERT INTO nombreTabla (nombreCampos) VALUES (valoresCampos)
        $con = connect();
        $sql = "INSERT INTO " . $tabla . " (". $stringCampos.") VALUES (" . $stringValores . ")";
        // echo $sql;
        // La consulta no nos tiene que devolver nada, por lo que no hace falta que guardemos su respuesta en ningún sitio
        mysqli_query($con, $sql);

        // El mysqli_insert_id devuelve el id de la ultima fila insertada en la base de datos. Usaremos ese id para hacer las redirecciones, etc
        return mysqli_insert_id($con);
    }
}

function update($tabla = "", $arrayCampos = array("*"), $where = false ) {
    // Si has enviado en que tabla quieres hacer update y me has enviado datos para hacer update y existe un where
    if($tabla != "" && !empty($arrayCampos) && $where) {
        $arrayCamposUpdate = array();
        foreach ($arrayCampos as $nombreCampo => $valorCampo) {
            $arrayCamposUpdate[] = "`" . $nombreCampo . "` = '". $valorCampo ."'";
        }
        $stringCampos = implode(",", $arrayCamposUpdate);

        //Creo la sentencia UPDATE de la base de datos: UPDATE nombreTabla SET nombreCampo=valorCampo WHERE condicion
        $con = connect();

        $arrayWhere = array();
        foreach ($where as $key => $value) {
            $arrayWhere[] = "`" . $key . "` = '" . $value . "'";
        }

        $stringWhere = implode(" AND ", $arrayWhere);

        $sql = "UPDATE " . $tabla . " SET " . $stringCampos . " WHERE " . $stringWhere;

        // echo $sql;
        // La consulta no nos tiene que devolver nada, por lo que no hace falta que guardemos su respuesta en ningún sitio
        mysqli_query($con, $sql);

        // El mysqli_insert_id devuelve el id de la ultima fila insertada en la base de datos. Usaremos ese id para hacer las redirecciones, etc
        return mysqli_insert_id($con);
    }

}

function mostrarResultados($resultados) {
    while($resultado = mysqli_fetch_object($resultados)) {
        echo "<pre>";
        var_dump($resultado);
        echo "</pre>";
    }
}



/*
$camposSql = array("nombre", "id");
$localizaciones = select("localizaciones", $camposSql);

while($localizacion = mysqli_fetch_object($localizaciones)) {
    echo $localizacion->nombre;
    echo "<pre>";
    var_dump($localizacion);
    echo "</pre>";
}


$camposSql1 = array("nombre", "pass");
$usuarios1 = select("usuarios", $camposSql1);
$camposSql2 = array("id");
$usuarios2 = select("usuarios", $camposSql2);

while($usuario = mysqli_fetch_object($usuarios1)) {
    echo "<pre>";
    var_dump($usuario);
    echo "</pre>";
}
while($usuario = mysqli_fetch_object($usuarios2)) {
    echo "<pre>";
    var_dump($usuario);
    echo "</pre>";
}

$arrayCamposLocalizaciones = array("fotos", "direccion");
$localizaciones2 = select("localizaciones", $arrayCamposLocalizaciones);
while($localizacion = mysqli_fetch_object($localizaciones2)) {
    echo $localizacion->fotos;
    echo "<pre>";
    var_dump($localizacion);
    echo "</pre>";
}


$consultawhere = array(
    "nombre" => "Gimnasio Paco",
    "fotos" => "asas"
);
$camposSql = array("nombre", "id");
$localizaciones = select("localizaciones", $camposSql, $consultawhere);

while($localizacion = mysqli_fetch_object($localizaciones)) {
    echo "<pre>";
    var_dump($localizacion);
    echo "</pre>";
}
*/

?>