function show(name) {

    var campo = document.getElementById(name);

    if (campo.style.display == "none") {

        campo.style.display = "block";
    } else if (campo.style.display == "block") {

        campo.style.display = "none";
    }


}