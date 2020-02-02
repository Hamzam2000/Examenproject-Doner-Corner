<?php

include "includes/producten.inc.php";
include "includes/gegevensUser.inc.php";
require_once __DIR__ . "/vendor/autoload.php";


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSS -->
    <link rel="stylesheet" href="Css/Index.css">
    <!-- AJAX -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Döner Corner</title>
</head>
<body>

<?php include "header.php" ?>
<?php $msg=" Bestelling is geplaatst ";


if ($_SESSION["order"] == "contant") {
    // Bestelling wordt contant afgerekend\
    session_destroy();
} else {
    // Get Mollie payment and check if its paid
    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey("test_dGNuACWnVCVnCfkhdqjsdWgkKQyjcV");
    $payment = $mollie->payments->get($_SESSION["order"]);
    
    if ($payment->isPaid())
    {
        $msg = "bestelling gelukt";
        session_destroy();

    } else{
        
        $msg = "bestelling mislukt";
        
    }
    
}


?>

<header class="masthead text-light text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-5"><?php echo $msg; ?></h2>

            </div>
        </div>
    </div>
</header>
<br>

<?php include "footer.php" ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>