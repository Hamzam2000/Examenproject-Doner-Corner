<?php
	
	require_once './database.php';
	$conn = getdb();
	$msg = "";

	if (isset($_POST['submit'])) {

		$username = ($_POST['username']);
		$password = ($_POST['password']);

		$query = $conn->query("SELECT * FROM user WHERE username='$username'");
		if ($query->rowCount() > 0) {
			
			$data = $query->fetch(PDO::FETCH_ASSOC);
		    if (md5($password) == $data['password']) {
				$row = $query->fetch(PDO::FETCH_ASSOC);
				$_SESSION['username'] = $data['username'];
				$_SESSION['id'] = $data['id'];
				header("Location: platform.php");
            } else {
			    $msg = "Probeer het nog eens!";
			}
        } else {
            $msg = "Probeer het nog eens!";
		}	
	}
?>