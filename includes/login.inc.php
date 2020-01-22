<?php
	
	require_once './database.php';
	$conn = getdb();
	$msg = "";

	if (isset($_POST['submit'])) {

		$email = ($_POST['email']);
		$password = ($_POST['password']);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $conn->query("SELECT * FROM user WHERE email = '$email'");

		if ($query->rowCount() > 0) {
			$data = $query->fetch(PDO::FETCH_ASSOC);
		    if (password_verify($password, $hash)) {
				$row = $query->fetch(PDO::FETCH_ASSOC);
				$_SESSION['email'] = $data['email'];
                $_SESSION['username'] = $data['username'];
				$_SESSION['id'] = $data['id'];

				if ($data['is_admin']) {
                    header("Location: ./platform.php");
				    // admin
                } else if ($data['is_admin'] == null){
                    $_SESSION['logged'] = true;
                    header("Location: ./index.php");
                } else {
				    echo '<h6> Je moet eerste inloggen. </h6>';
                }

            } else {
			    $msg = "Probeer het nog eens!";
			}
        } else {
            $msg = "Probeer het nog eens!";
		}	
	}
?>