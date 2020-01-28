<?php

	require_once './database.php';
	$conn = getdb();
	$msg = "";

	if (isset($_POST['submit'])) {

		$email = ($_POST['email']);
		$password = ($_POST['password']);

        $query = $conn->query("SELECT * FROM user WHERE email='. $email .'");

		if ($query->rowCount() > 0) {
			$data = $query->fetch(PDO::FETCH_ASSOC);
		    if (password_verify($password, $data['password'])) {
				$row = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['email'] = $data['email'];
				$_SESSION['id'] = $data['id'];

				if ($data['is_admin']) {
                    header("Location: ./platform.php");
				    // admin
                } else{
                    header("Location: ./index.php");
                }

            } else {
			    $msg = "Probeer het nog eens!";
			}
        } else {
            $msg = "Probeer het nog eens!";
		}
	}

?>