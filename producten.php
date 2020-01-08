<?php

include "includes/producten.inc.php";


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

<header class="masthead text-light text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-5">Wat wil je bestellen?</h2>
            </div>
        </div>
    </div>
</header>

<div class="row">
    <div class="col-6">
        <br>
        <h3>Producten</h3>
        <hr>
            <?php
            $result = getProducts();
            foreach ($result as $key => $row) {
            ?>
            <form method="post" action="producten.php">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
                            <h5><?php echo $row["Name"]; ?> - $ <?php echo $row["price"]; ?></h5>
                            <input class= "col-md-2" type="text" name="quantity" class="form-control" value="0"/>
                            <input type="hidden" name="Id" value="<?php echo $key; ?>" />
                            <input type="hidden" name="Name" value="<?php echo $row["Name"]; ?>" />
                            <input type="hidden" name="price" value="<?php echo $row["price"]; ?>" />
                            <input align="right" type="submit" name="addProducts" style="margin-top:5px;" class="btn btn-warning" value="Toevoegen" />
                    </div>

                </form>

            <?php } ?>
    </div>
    <div class="col-6" style="background-color: #e9ecef8a">
        <br>
        <h3>Jouw Bestelling</h3>
        <hr>
        <form method="post" action="producten.php">
        <table class="table table-bordered">
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php
            if(!empty($_SESSION["shopping_cart"]))
            {
                $total = 0;
                foreach($_SESSION["shopping_cart"] as $keys => $values)
                {
                    var_dump($values);
                    ?>
                    <tr>
                        <td><?php echo $values["Name"]; ?></td>
                        <td><?php echo $values["quantity"]; ?></td>
                        <td>$ <?php echo $values["price"]; ?></td>
                        <td>$ <?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                        <td><input type="submit" name="deleteProducts" style="margin-top:5px;" class="btn btn-danger" value="Verwijderen" /></td>

                    </tr>
                    <?php
                    $total = $total + ($values["quantity"] * $values["price"]);
                }
                ?>
                <tr>

                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td><input align="center" type="submit" name="payOrder" class="btn btn-warning" value="Betalen" /></td>
                </tr>
                <?php
            }
            ?>
        </table>
        </form>
    </div>
</div>
<br>
<?php include "footer.php" ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



