<?php
    include('../configuration/conection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Data Graph using BD Agrotic</title>
        <style type="text/css">
            BODY {
                width: 550PX;
            }
            #chart-container {
                width: 100%;
                height: auto;
            }
        </style>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/Chart.min.js"></script>
    </head>|
    <body>
                <section class="content pb-3 mb-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="row mb-2">
                                    <div class="col-md-6 col-sm-12">
                                        <h6 class="subtittles-resgitrer">Precios productos históricos</h6>
                                        <select class="form-control-registrer bg-light border-1 px-4" name="searchProduct" id="searchProduct" style="height: 30px;" required>
                                        <option value="" selected>Seleccione un producto...
                                            <?php
                                            $result = $mysqli->query('SELECT * FROM history_producst_dane ORDER BY product ASC');
                                            while ($row = $result->fetch_assoc()) { ?>
                                                    <option value="<?php echo $row['product']; ?>"><?php echo $row['product']; ?>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5 col-sm-12">
                                        <h6 class="subtittles-resgitrer">Fecha inicial</h6>
                                        <input type="date" class="form-control-registrer border-0 bg-light px-4" placeholder="Seleccione fecha inicial" style="height: 30px;" id="searchDates" name="searchDates" required>
                                        <h6 class="subtittles-resgitrer">Fecha Final</h6>
                                        <input type="date" class="form-control-registrer border-0 bg-light px-4" placeholder="Seleccione fecha final" style="height: 30px;" id="searchDates2" name="searchDates2" required>
                                    
                                    </div>
                                    <div class="col-md-1 col-sm-12 ">
                                        <h6 class="subtittles-resgitrer"><p></p> </h6>
                                        <li onclick="searchQuery()" style="list-style:none" ><button  class="btn btn-primary px-0 btn-sm-square-search"><i class="bi bi-search"></i></button></li>
                                    </div>

                                </div>
                                <hr>
                                <div id="chart-container">
                                    <canvas id="graphCanvas"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- DONUT CHART -->
                    </div>
                    <!-- /.col (RIGHT) -->
                </section>
            <script>
        $(function searchQuery() {
            $('li').click(function() {
                $(document).ready(function () {
                    showGraph();
                });
                function showGraph()
                {
                    {
                        var search_Product = document.getElementById("searchProduct").value;
                        var search_Date = document.getElementById("searchDates").value;
                        var search_Date2 = document.getElementById("searchDates2").value;
                        alert("Producto seleccionado : " + search_Product);
                        $.post("data.php?Producto=" + search_Product + "&Fecha=" + search_Date + "&Fecha2=" + search_Date2,
                            function (data)
                            {
                                console.log(data);
                                var name = [];
                                var marks = [];
                                var dates = [];
                                for (var i in data) {
                                    name.push(data[i].product);
                                    marks.push(data[i].price);
                                    dates.push(data[i].updatedate);
                                }
                                var chartdata = {
                                    labels: dates,
                                    datasets: [
                                        {
                                            label: 'Producto Vs Precio',
                                            backgroundColor: '#091E3E',
                                            borderColor: '#85A633',
                                            hoverBackgroundColor: '#CCCCCC',
                                            hoverBorderColor: '#85A633',
                                            data: marks
                                        }
                                    ]
                                };
                                var graphTarget = $("#graphCanvas");
                                var barGraph = new Chart(graphTarget, {
                                    type: 'bar',
                                    data: chartdata
                                });
                            }
                        );
                    }
                }
            });
        });
    </script>
    
        <script>
        var xValues = ['ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic'];
        var yValues = [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15, 8];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    label: 'Ventas',
                    backgroundColor: "rgba(133,166,51,1.0)",
                    borderColor: "rgba(9,30,62,0.1)",
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: true
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 6,
                            max: 16
                        }
                    }],
                },
                title: {
                    display: true,
                    text: "Inventario Agrotic 2022"
                }
            }
        });
    </script>
    
    </body>
</html>