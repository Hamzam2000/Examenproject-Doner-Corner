<?php

require './database.php';

function getOrders(){
    $conn = getdb();
    $stmt = $conn->prepare("SELECT `naam`, `email`, `phonenumber`, `companyname`, `adress`, `postcode`, `city`, `delivery_time`, `products`, `remarks`, `paymentOption`, `totalPrice`, `Succeed` FROM `order` WHERE `Succeed` = '0' ORDER BY `delivery_time`");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getDoneOrders(){
    $conn = getdb();
    $stmt = $conn->prepare("SELECT `naam`, `email`, `phonenumber`, `companyname`, `adress`, `postcode`, `city`, `delivery_time`, `products`, `remarks`, `paymentOption`, `totalPrice`, `Succeed` FROM `order` WHERE `Succeed` = '1' ORDER BY `delivery_time`");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

?>
