<?php

require_once './database.php';
$conn = getdb();
$msg = "";

if (isset($_POST['Betalen'])) {
    $name = ($_POST['name']);
    $email = ($_POST['email']);
    $phonenumber = ($_POST['phonenumber']);
    $companyname = ($_POST['companyname']);
    $adress = ($_POST['adress']);
    $postcode = ($_POST['postcode']);
    $city = ($_POST['city']);
    $delivery_time = ($_POST['delivery_time']);
    $products = "";
    $remarks = ($_POST['remarks']);
    $paymentOption = ($_POST['paymentOption']);
    $total = ($_POST['totalPrice']);

    $conn->query("INSERT INTO order (name,email,phonenumber,companyname,adress,postcode,city,delivery_time,products,remarks,paymentOption,totalPrice) VALUES ('$name', '$email', '$phonenumber', '$companyname', '$adress', '$postcode', '$city', '$delivery_time', '$products', '$remarks', '$paymentOption', '$total')");
    echo '<script>window.location="Betalen.php"</script>';

}
?>