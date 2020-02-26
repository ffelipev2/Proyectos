
$(document).ready(function () {
    showGraph();
});


function showGraph()
{
    {
        $.post("data.php",
                function (data)
                {
                    console.log(data);
                    var tempe = [];
                    var hora = [];

                    for (var i in data) {
                        tempe.push(data[i].temperatura);
                        hora.push(data[i].hora);
                    }

                    var chartdata = {
                        labels: hora,
                        datasets: [
                            {
                                label: 'Temperaturas',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: tempe
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
    }
}
