function selectorColegio() {
    // De esta forma se obtiene la instancia del objeto XMLHttpRequest
    if (window.XMLHttpRequest) {
        connection = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        connection = new ActiveXObject("Microsoft.XMLHTTP");
    }

    //var param = document.getElementsByName("rol");
    //var param = param[0].options[param[0].selectedIndex].value;
    var param = document.getElementById('comunas');
    var param = param.options[param.selectedIndex].value;
    // Preparando la función de respuesta
    connection.onreadystatechange = response_1;

    // Realizando la petición HTTP con método POST
    connection.open('POST', 'classes/consulta.php');
    connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connection.send("param=" + param);
}

function selectorCurso() {
    // De esta forma se obtiene la instancia del objeto XMLHttpRequest
    if (window.XMLHttpRequest) {
        connection = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        connection = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var param = document.getElementById('comunas');
    var param = param.options[param.selectedIndex].value;
    connection.onreadystatechange = response_2;

    // Realizando la petición HTTP con método POST
    connection.open('POST', 'classes/consulta.php');
    connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    connection.send("param=" + param);
}

function response_1() {
    if (connection.readyState == 4) {
        document.getElementById("resultado_1").innerHTML = this.responseText;
    }
}
function response_2() {
    if (connection.readyState == 4) {
        document.getElementById("resultado_1").innerHTML = this.responseText;
    }
}

$(function () {
    $('.selectpicker').selectpicker();
});