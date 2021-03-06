<!doctype>
<?php
session_start();
include 'includes/platform.inc.php';
include 'includes/checklogin.php';

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>

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
            <a class="dropdown-item" href="includes/logout.php">Uitloggen</a>
        </div>
    </li>
</ul>

<div id="page-content-wrapper">
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="list-group list-group-flush">
                <a href="platform.php" class="list-group-item list-group-item-action bg-light">Bestellingen</a>
                <a href="platform2.php" class="list-group-item list-group-item-action bg-light">Afgerond</a>
                <a href="platform3.php" class="list-group-item list-group-item-action bg-light">Koks-overzicht</a>
                <a href="Statistiek.php" class="list-group-item list-group-item-action bg-light">Statistieken</a>
            </div>
        </div>

        <div class="row">
            <table class="table table-bordered">
                <div class="container">
                    <br>
                    <h3>Afgerond</h3>
                    <hr>
                </div>
        </div>
        <!-- Afgeronden bestellingen laten zien -->
        <?php
        $result = getDoneOrders();
        foreach ($result as $key => $row) {
            ?>
            <div class="col-md-3">
                <form method="post" action="platform2.php">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="left">
                        <p>Naam: <?php echo $row["naam"]; ?></p>
                        <p>E-mail: <?php echo $row["email"]; ?></p>
                        <p>Telefoonnummer: <?php echo $row["phonenumber"]; ?></p>
                        <p>Bedrijfsnaam: <?php echo $row["companyname"]; ?></p>
                        <p>Adres: <?php echo $row["adress"]; ?></p>
                        <p>Postcode: <?php echo $row["postcode"]; ?> - <?php echo $row["city"]; ?></p>
                        <p>Bezorgen op <?php echo $row["delivery_time"]; ?></p>
                        <p>Producten: <?php echo $row["products"]; ?></p>
                        <p>Opmerking: <?php echo $row["remarks"]; ?></p>
                        <p>Betalen: <?php echo $row["paymentOption"]; ?></p>
                        <p>Prijs: <?php echo $row["totalPrice"]; ?></p>
                        <p>id: <?php echo $row["Id"]; ?></p>
                        <input type="hidden" name="Id" value="<?php echo $row["Id"]; ?>" />
                        <input type="hidden" name="naam" value="<?php echo $row["naam"]; ?>" />
                        <input type="hidden" name="email" value="<?php echo $row["email"]; ?>" />
                        <input type="hidden" name="phonenumber" value="<?php echo $row["phonenumber"]; ?>" />
                        <input type="hidden" name="companyname" value="<?php echo $row["companyname"]; ?>" />
                        <input type="hidden" name="adress" value="<?php echo $row["adress"]; ?>" />
                        <input type="hidden" name="postcode" value="<?php echo $row["postcode"]; ?>" />
                        <input type="hidden" name="city" value="<?php echo $row["city"]; ?>" />
                        <input type="hidden" name="delivery_time" value="<?php echo $row["delivery_time"]; ?>" />
                        <input type="hidden" name="products" value="<?php echo $row["products"]; ?>" />
                        <input type="hidden" name="remarks" value="<?php echo $row["remarks"]; ?>" />
                        <input type="hidden" name="paymentOption" value="<?php echo $row["paymentOption"]; ?>" />
                        <input type="hidden" name="totalPrice" value="<?php echo $row["totalPrice"]; ?>" />
                        <input align="right" type="submit" name="delete1" style="margin-top:5px;" class="btn btn-danger" value="Verwijderen" />
                    </div>
                </form>
                <br>
            </div>
        <?php } ?>
        </table>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


