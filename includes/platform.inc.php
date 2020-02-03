<?php

require './database.php';

function getOrders(){
    $conn = getdb();
    $stmt = $conn->prepare("SELECT `Id`, `naam`, `email`, `phonenumber`, `companyname`, `adress`, `postcode`, `city`, `delivery_time`, `products`, `remarks`, `paymentOption`, `totalPrice`, `Succeed` FROM `order` WHERE `Succeed` = '0' ORDER BY `delivery_time`");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getDoneOrders(){
    $conn = getdb();
    $stmt = $conn->prepare("SELECT `Id`, `naam`, `email`, `phonenumber`, `companyname`, `adress`, `postcode`, `city`, `delivery_time`, `products`, `remarks`, `paymentOption`, `totalPrice`, `Succeed` FROM `order` WHERE `Succeed` = '1' ORDER BY `delivery_time`");
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
    $stmt = $conn->prepare("DELETE FROM `order` WHERE Id = \" $Id \" ");
    $stmt->execute();
    header('Location: ./platform.php');
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
    $stmt = $conn->prepare("DELETE FROM `order` WHERE Id = \" $Id \" ");
    $stmt->execute();
    header('Location: ./platform.php');
}

if(isset($_POST['delete1'])){
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
    $stmt = $conn->prepare("DELETE FROM `order` WHERE Id = \" $Id \" ");
    $stmt->execute();
    header('Location: ./platform2.php');
}

if(isset($_POST['deletekok'])){
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
    $stmt = $conn->prepare("DELETE FROM `order` WHERE Id = \" $Id \" ");
    $stmt->execute();
    header('Location: ./platform3.php');
}

if(isset($_POST['check'])){
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
    $stmt = $conn->prepare("UPDATE `order` SET `Succeed` = '1' WHERE Id = \" $Id \" ");
    $stmt->execute();
    header('Location: ./platform.php');

}

if(isset($_POST['checkkok'])){
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
    $stmt = $conn->prepare("UPDATE `order` SET `Succeed` = '1' WHERE Id = \" $Id \" ");
    $stmt->execute();
    header('Location: ./platform3.php');

}



?>
