<?php

require './database.php';

function getProducts(){
    $conn = getdb();
    $stmt = $conn->prepare("SELECT `image`, `Name`, `price` FROM `product` WHERE 1");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}
// product in winkelmandje plaatsen
session_start();
if(isset($_POST["addProducts"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {

        $item_array_id = array_column($_SESSION["shopping_cart"], "Id");

        if(!in_array($_POST["Id"], $item_array_id))
        {
            $count = count($item_array_id);
            $item_array = array(
                'Id'               =>     $_POST["Id"],
                'Name'               =>     $_POST["Name"],
                'price'          =>     $_POST["price"],
                'quantity'          =>     $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            foreach ($_SESSION["shopping_cart"] as $key => $p) {
                if ($p['Id'] === $_POST["Id"]) {
                    $_SESSION["shopping_cart"][$key]['quantity'] += $_POST["quantity"];
                }
            }

            echo '<script>window.location="producten.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'Id'               =>     $_POST["Id"],
            'Name'               =>     $_POST["Name"],
            'price'          =>     $_POST["price"],
            'quantity'          =>     $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if(isset($_POST["add"]))
{
    foreach($_SESSION["shopping_cart"] as $key => $values)
    {
        $_SESSION["shopping_cart"][$key]['quantity']++;
    }
}

if(isset($_POST["min"]))
{
    foreach($_SESSION["shopping_cart"] as $key => $values)
    {
        $_SESSION["shopping_cart"][$key]['quantity']--;
    }
}

if(isset($_POST["deleteProducts"]))
{
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["Id"] == $_POST["Id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="producten.php"</script>';
            }
        }

}

if(isset($_POST["payOrder"]))
{
            echo '<script>window.location="gegevensUser.php</script>';

}
?>
