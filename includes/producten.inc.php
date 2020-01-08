<?php

require './database.php';

function getProducts(){
    $conn = getdb();
    $stmt = $conn->prepare("SELECT `Name`, `price` FROM `product` WHERE 1");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

session_start();
if(isset($_POST["addProducts"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {

        $item_array_id = array_column($_SESSION["shopping_cart"], "Id");

        if(!in_array($_POST["Id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
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
            echo '<script>alert("Item Already Added")</script>';
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
if(isset($_POST["deleteProducts"]))
{
    if($_POST["deleteProducts"] == "delete")
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
}
?>
