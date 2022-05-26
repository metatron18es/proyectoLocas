var loca0 = new Image();
var loca1 = new Image();
var loca2 = new Image();
var loca3 = new Image();
var loca4 = new Image();
var loca5 = new Image();
var loca6 = new Image();
var loca7 = new Image();
var loca8 = new Image();
var loca9 = new Image();
var loca10 = new Image();
var loca11 = new Image();
var loca12 = new Image();
var loca13 = new Image();
var loca14 = new Image();
var loca15 = new Image();
var loca16 = new Image();
var loca17 = new Image();
var loca18 = new Image();
var loca19 = new Image();
var loca20 = new Image();
var loca21 = new Image();
var loca22 = new Image();


loca0.src = "./imagenes/game/loca0.jpg";
loca1.src = "./imagenes/game/loca1.jpg";
loca2.src = "./imagenes/game/loca2.jpg";
loca3.src = "./imagenes/game/loca3.jpg";
loca4.src = "./imagenes/game/loca4.jpg";
loca5.src = "./imagenes/game/loca5.jpg";
loca6.src = "./imagenes/game/loca6.jpg";
loca7.src = "./imagenes/game/loca7.jpg";
loca8.src = "./imagenes/game/loca8.jpg";
loca9.src = "./imagenes/game/loca9.jpg";
loca10.src = "./imagenes/game/loca10.jpg";
loca11.src = "./imagenes/game/loca11.jpg";
loca12.src = "./imagenes/game/loca12.jpg";
loca13.src = "./imagenes/game/loca13.jpg";
loca14.src = "./imagenes/game/loca14.jpg";
loca15.src = "./imagenes/game/loca15.jpg";
loca16.src = "./imagenes/game/loca16.jpg";
loca17.src = "./imagenes/game/loca17.jpg";
loca18.src = "./imagenes/game/loca18.jpg";
loca19.src = "./imagenes/game/loca19.jpg";
loca20.src = "./imagenes/game/loca20.jpg";
loca21.src = "./imagenes/game/loca21.jpg";
loca22.src = "./imagenes/game/loca22.jpg";

var arraylocas = new Array(loca1, loca2, loca3, loca4, loca5, loca6, loca7, loca8, loca9, loca10, loca11, loca12, loca13, loca14, loca15, loca16, loca17, loca18, loca19, loca20, loca21, loca22)

function inicio() {
    document.images["ruletaimg"].src = loca0.src;



}


function ruleta() {
    var locarandom;
    locarandom = new Image();
    locarandom.src = arraylocas[Math.floor(Math.random() * 22)].src;

    return locarandom.src;

}

function hidebutton() {
    document.getElementById("botonruleta").style.visibility = "hidden";
}

function showbutton() {
    (document.getElementById("botonruleta").style.visibility = "visible")
}


function spin() {

    document.getElementById("botonruleta").style.visibility = "hidden";
    let timerId = setInterval(function() {
        $("#imgruleta").fadeOut(200);
        document.images["ruletaimg"].src = ruleta();
        $("#imgruleta").fadeIn(200);

    }, 400);


    setTimeout(() => { clearInterval(timerId); }, 2000);
    setTimeout(() => { showbutton(); }, 2500);




}