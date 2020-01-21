<?php

include "includes/producten.inc.php";
include "includes/gegevensUser.inc.php";


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
                <h2 class="mb-5">Vul je gegevens in</h2>
            </div>
        </div>
    </div>
</header>
<br>
<div class="container">
    <form method="post" action="gegevensUser.php">
    <div class="row">
        <div class="col-md-6 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Jouw bestelling</span>
            </h4>
            <hr>
                    <table class="table table-bordered">
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>

                        <?php
                        if(!empty($_SESSION["shopping_cart"]))
                        {
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                        {
                            ?>
                            <tr>
                                <input type="hidden" name="Id" value="<?php echo $keys; ?>" />
                                <td><input name="products" type="tel" value="<?php echo $values["Name"]; ?>"/></td>
                                <td><?php echo $values["quantity"]; ?>
                                <td>$ <?php echo $values["price"]; ?></td>
                                <td>$ <?php echo number_format($values["quantity"] * $values["price"], 2); ?></td>
                            </tr>

                            <?php
                            $total = $total + ($values["quantity"] * $values["price"]);
                        }
                        ?>

                    <tr>

                        <td colspan="3" align="right">Total</td>
                        <td align="right"><input name="totalPrice" type="tel" value="<?php echo number_format($total, 2); ?>"/></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </table>
            <div>
                <button onclick="window.location.href = 'producten.php';">Bestelling veranderen</button>
            </div>
            <br>
            <h4 class="mb-3">Betaling</h4>
            <div class="form-group col-6">
                <select name = "paymentOption" id="inputState" class="form-control">
                    <option>...</option>
                    <option>Pinpas</option>
                    <option>Contant</option>
                </select>
            </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code">
                        <button name="Betalen" type="submit" class="btn btn-secondary">Betalen</button>
                </div>
        </div>
        <div class="col-md-6 order-md-1">
            <h4 class="mb-3">Jouw gegevens</h4>
            <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="firstName">Naam</label>
                        <input name="naam" type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="number">Telefoonnummer</label>
                    <input name="phonenumber" type="text" class="form-control" id="address" placeholder="06..." required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="companyname">Bedrijfsnaam <span class="text-muted">(niet verplicht)</span></label>
                    <input name="companyname" type="text" class="form-control" id="companyname" placeholder="">
                    <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input name="adress" type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
                    <div class="invalid-feedback">
                        Please enter your shipping address.
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="postcode">Postcode</label>
                        <input name="postcode" type="text" class="form-control" id="Postcode">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="city">Stad</label>
                        <input name="city" type="text" class="form-control" id="Stad">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deliveryTime">Wanneer wil je je bestelling?</label>
                    <select name="delivery_time" id="deliveryTime" class="form-control" required="">
                        <option selected>Zo snel mogelijk</option>
                        <option>16:00:00</option>
                        <option>16:30:00</option>
                        <option>17:00:00</option>
                        <option>17:30:00</option>
                        <option>18:00:00</option>
                        <option>18:30:00</option>
                        <option>19:00:00</option>
                        <option>19:30:00</option>
                        <option>20:00:00</option>
                        <option>20:30:00</option>
                        <option>21:00:00</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="comment">Opmerking:</label>
                    <textarea name="remarks" class="form-control" rows="5" id="comment"></textarea>
                </div>

                <hr class="mb-4">

                </div>
            </form>
        </div>
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

