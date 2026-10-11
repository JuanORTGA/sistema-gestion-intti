function Solo_Numero(evt) {
    if (Window.event) {

        keynum = evt.keyCode;

    } else {

        keynum = evt.which;

    }

    if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13) {

        return true;
    } else {

        alert("Ingrese solo numeros");

        return false;

    }

}

function Solo_Letras(e) {

    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = "QWERTYUIOPASDFGHJKLÑZXCVBNMqwertyuiopasdfghjklñzxcvbnm, ' ' ";

    especiales = [8, 13];
    tecla_especial = false

    for (var i in especiales) {

        if (key == especiales[i]) {

            tecla_especial = true;
            break;

        }

    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {

        alert("Ingrese solo letras");
        return false;

    }

}