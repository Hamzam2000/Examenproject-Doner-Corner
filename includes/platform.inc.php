<?php

require './database.php';

$dbhandle = new mysqli('localhost','root','','cloudstorage');
echo $dbhandle->connect_error;
$query = "SELECT `fileMime`, COUNT(fileId) FROM file group by `fileMime`";
$res = $dbhandle->query($query);


?>
