<?php

require_once './database.php';
require_once  "./vendor/autoload.php";
$conn = getdb();
$msg = "";

if (isset($_POST['Betalen']) && ($_POST['paymentOption']) == 'Online Betalen') {
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


    $mollie = new \Mollie\Api\MollieApiClient();
    $mollie->setApiKey("test_dGNuACWnVCVnCfkhdqjsdWgkKQyjcV");
    $payment = $mollie->payments->create([
        "amount" => [
            "currency" => "EUR",
            "value" => $total // You must send the correct number of decimals, thus we enforce the use of strings
        ],
        "description" => $products,
        "redirectUrl" => "http://localhost/Examenproject%20D%C3%B6ner%20corner/Website%20D%C3%B6ner%20corner/Website/Betalen.php",
        "webhookUrl" => "https://webshop.example.org/payments/webhook/",
        "metadata" => [
            "order_id" => "12345",
        ],
    ]);

    $_SESSION["order"] = $payment->id;

    /*$stmt = $conn->prepare("INSERT INTO `order_product`
                                                    (order_id,product_id,quantity)
                                            VALUES ('$naam', '$email', '$phonenumber')");*/

    $stmt = $conn->prepare("INSERT INTO `order` 
                                                    (payment_id,naam,email,phonenumber,companyname,adress,postcode,city,delivery_time,products,remarks,paymentOption,totalPrice) 
                                            VALUES ('$payment->id','$naam', '$email', '$phonenumber', '$companyname', '$adress', '$postcode', '$city', '$delivery_time', '$products', '$remarks', '$paymentOption','$total')");
    $stmt->execute();

    header("Location: " . $payment->getCheckoutUrl(), true, 303);

} elseif (isset($_POST['Betalen']) && ($_POST['paymentOption']) == 'Contant'){

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


    $_SESSION["orderContant"] = $payment->id;

    /*$stmt = $conn->prepare("INSERT INTO `order_product`
                                                    (order_id,product_id,quantity)
                                            VALUES ('$naam', '$email', '$phonenumber')");*/

    $stmt = $conn->prepare("INSERT INTO `order` 
                                                    (payment_id,naam,email,phonenumber,companyname,adress,postcode,city,delivery_time,products,remarks,paymentOption,totalPrice) 
                                            VALUES ('$payment->id','$naam', '$email', '$phonenumber', '$companyname', '$adress', '$postcode', '$city', '$delivery_time', '$products', '$remarks', '$paymentOption','$total')");
    $stmt->execute();

    header("Location: Betalen.php");

}
?>