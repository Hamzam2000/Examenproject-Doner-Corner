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

if(isset($_POST['delete'])){
    $conn = getdb();
    $Id = $_POST['Id'];
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $companyname = $_POST['companyname'];
    $adress = $_POST['adress'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $delivery_time = $_POST['delivery_time'];
    $products = $_POST['products'];
    $remarks = $_POST['remarks'];
    $paymentOption = $_POST['paymentOption'];
    $totalPrice = $_POST['totalPrice'];
    $stmt = $conn->prepare("DELETE FROM `order` WHERE Id = ?");
    $stmt->bindParam(1, $Id, PDO::PARAM_INT);
    if ($stmt->execute()) {
        header("Location: ./platform.php");
        exit();
    } else {
        header("Location: ./platform.php");
        exit();
    }
}

if(isset($_POST['check'])){
    $conn = getdb();

}



?>
