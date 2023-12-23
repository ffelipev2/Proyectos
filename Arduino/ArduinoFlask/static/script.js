
let socket = io();

function encenderLED() {
    socket.emit('encender');
}

function apagarLED() {
    socket.emit('apagar');
}

window.onload = function () {

    let numeroPuntos = 0;
    socket.on('data', function (data) {
        var data1 = data.parte1;
        if (data1 == 2) {
            distancia = data.parte2
            actualizarDistancia(parseFloat(distancia));
        }
        if (data1 == 1) {
            temperatura = data.parte2
            humedad = data.parte3
            chart.options.data[0].dataPoints.push({y: parseFloat(humedad)})
            chart.options.data[1].dataPoints.push({y: parseFloat(temperatura)})
            chart.render();
        }
    })
    // Función para actualizar el contenido de la etiqueta <p>
    function actualizarDistancia(valor) {
        document.getElementById("parte2").innerText = "Distancia: " + valor + "cm";
    }

    let chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Temperatura y Humedad Relativa %"
        },
        data: [
            {
                type: "line",
                indexLabelFontSize: 16,
                name: "Humedad Relativa",
                showInLegend: true,
                dataPoints: []
            },

            {
                type: "line",
                indexLabelFontSize: 16,
                name: "Temperatura",
                showInLegend: true,
                dataPoints: []
            }

        ]
    });
    chart.render();

}