
            window.onload = function () {

                let numeroPuntos = 0;

                let socket = io();

                socket.on('data', function (data) {
                    console.log(data)
                    chart.options.data[0].dataPoints.push({y: parseFloat(data)})
                    chart.render();

                })

                socket.on('data2', function (data2) {
                    console.log(data2);
                    // Actualizar el contenido de la etiqueta <p> con la parte 2
                    actualizarParte2(parseFloat(data2));
                });

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
                    data: [{
                            type: "line",
                            indexLabelFontSize: 16,
                            dataPoints: []
                        }]
                });
                chart.render();

            }