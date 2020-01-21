<?php

require_once './database.php';
$conn = getdb();
$msg = "";

if (isset($_POST['Betalen'])) {
    $naam = ($_POST['naam']);
    $email = ($_POST['email']);
    $phonenumber = ($_POST['phonenumber']);
    $companyname = ($_POST['companyname']);
    $adress = ($_POST['adress']);
    $postcode = ($_POST['postcode']);
    $city = ($_POST['city']);
    $delivery_time = date($_POST['delivery_time']);
    $products = ($_POST['products']);
    $remarks = ($_POST['remarks']);
    $paymentOption = ($_POST['paymentOption']);
    $total = ($_POST['totalPrice']);

    $stmt = $conn->prepare("INSERT INTO `order` (naam,email,phonenumber,companyname,adress,postcode,city,delivery_time,products,remarks,paymentOption,totalPrice) VALUES ('$naam', '$email', '$phonenumber', '$companyname', '$adress', '$postcode', '$city', '$delivery_time', '$products', '$remarks', '$paymentOption','$total')");
    $stmt->execute();
    header("Location: Betalen.php");

}
?>