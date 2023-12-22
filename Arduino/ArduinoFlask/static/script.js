
window.onload = function () {

    let numeroPuntos = 0;

    let socket = io();

    socket.on('data', function (data) {
        var data1 = data.parte1;
        var data2 = data.parte2;
        chart.options.data[0].dataPoints.push({y: parseFloat(data1)})
        actualizarParte2(parseFloat(data2));
        chart.render();

    })
    // Función para actualizar el contenido de la etiqueta <p>
    function actualizarParte2(valor) {
        document.getElementById("parte2").innerText = "Parte 2: " + valor;
    }

    let chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "TEMPERATURA"
        },
        data: [
            {
                type: "line",
                indexLabelFontSize: 16,
                name: "Data 1",
                showInLegend: true,
                dataPoints: []
            },
            /*
            {
                type: "line",
                indexLabelFontSize: 16,
                name: "Data 2",
                showInLegend: true,
                dataPoints: []
            }
            */
        ]
    });
    chart.render();

}