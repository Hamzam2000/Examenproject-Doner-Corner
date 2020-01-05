<?php
require './database.php';
$conn = getdb();

	session_start();
	if(isset($_POST['Date'])){
		$date = date($_POST['Date']);
		$id = $_SESSION['id'];
		$sql = 'INSERT INTO `afspraak`(`klant`, `datum`) VALUES ("'.$id.'", "'.$date.'")';
        $result = $conn->query($sql);
		header("Location: Afspraak.php?success");
	}else{
		header("Location: Afspraak.php?fail");
	}

?>