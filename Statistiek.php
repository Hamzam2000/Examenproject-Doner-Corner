<?php
session_start();
include 'includes/statistiek.inc.php';

?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard Klant</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>
<ul class="nav nav-pills" style="background-color:#d9d9d9;">
    <li class="nav-item">
        <a class="nav-link active" href="#">Welkom</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?></a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="logout.php">Uitloggen</a>
        </div>
    </li>
</ul>

<div id="page-content-wrapper">
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="platform.php" class="list-group-item list-group-item-action bg-light">Bestellingen</a>
                <a href="Statistiek.php" class="list-group-item list-group-item-action bg-light">Statistieken</a>
            </div>
        </div>

        <body>
        <div id="piechart" style="width: 900px; height: 500px;" ></div>
        <div id="piechart2" style="width: 900px; height: 500px;" ></div>
        </body>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['paymentOption', 'Succeed'],

                    <?php
                    while($row=$res->fetch_assoc())
                    {
                        echo "['".$row['paymentOption']."',".$row['COUNT(Id)']."],";
                    }

                    ?>

                ]);

                var options = {
                    title: 'Meest Gekochte producten',
                    is3D:true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {

                var data = google.visualization.arrayToDataTable([
                    ['paymentOption', 'Succeed'],

                    <?php
                    while($row=$res->fetch_assoc())
                    {
                        echo "['".$row['paymentOption']."',".$row['COUNT(Id)']."],";
                    }

                    ?>

                ]);

                var options = {
                    title: 'Meest Gekochte producten',
                    is3D:true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

                chart.draw(data, options);
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>