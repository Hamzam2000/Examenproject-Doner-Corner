<?php

require './database.php';

$dbhandle = new mysqli('localhost','root','','dcveen');
echo $dbhandle->connect_error;
$query = "SELECT `paymentOption`, COUNT(Id) FROM `order` group by `paymentOption`";
$res = $dbhandle->query($query);

$dbhandle2 = new mysqli('localhost','root','','dcveen');
echo $dbhandle2->connect_error;
$query2 = "SELECT `products`, COUNT(Id) FROM `order` group by `products`";
$res2 = $dbhandle2->query($query2);

$dbhandle3 = new mysqli('localhost','root','','dcveen');
echo $dbhandle3->connect_error;
$query3 = "SELECT `delivery_time`, COUNT(Id) FROM `order` group by `delivery_time`";
$res3 = $dbhandle3->query($query3);

function getUsers() {
    $conn = getdb();
    $stmt = $conn->prepare("SELECT `id`, `username`, `email`, `create_time` FROM user ORDER BY `create_time`");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

?>