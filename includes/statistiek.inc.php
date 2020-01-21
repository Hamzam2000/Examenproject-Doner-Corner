<?php

require './database.php';

$dbhandle = new mysqli('localhost','root','','dcveen');
echo $dbhandle->connect_error;
$query = "SELECT `paymentOption`, COUNT(Id) FROM `order` group by `paymentOption`";
$res = $dbhandle->query($query);
$query2 = "SELECT `paymentOption`, COUNT(Id) FROM `order` group by `paymentOption`";
$res2 = $dbhandle->query($query2);



?>