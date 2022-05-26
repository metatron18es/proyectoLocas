<html>

<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="JS/JosemiGame.js"></script>
    <link href="estilos/estilos.css" rel="stylesheet" type="text/css">
    <title>Dónde Grabar</title>
    <!--<link rel="icon" type="image/x-icon" href="XXX"> FAVICON -->
</head>

<body onload="inicio()">
    <?php include_once("./templates/header.php"); ?>
    <div class="jcontent">
        <form action="#">
            <div>
                <p>Dale al boton para obtener una imagen aleatoria y escribir una pequeña historia tomando como referencia la imagen o parte de ella. No hay buenas o malas historias se trata de escribir y fomentar la creatividad.</p>
            </div>
            <div class="btnruleta">
                <input type="button" value="Gira la ruleta" id="botonruleta" onclick="spin()" >
            </div>
            <div id="imgruleta"><img name="ruletaimg" /></div>
            <textarea id="brevehistoria" name="brevehistoria" rows="8" cols="80" placeholder="Escribe la primera historia que te venga a la mente al ver esta imagen:"></textarea>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>


</html>