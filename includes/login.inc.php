<?php
	
	require_once './database.php';
	$conn = getdb();
	$msg = "";

	if (isset($_POST['submit'])) {

		$username = ($_POST['username']);
		$password = ($_POST['password']);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $conn->prepare("SELECT * FROM user WHERE username < :username");
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->execute();

		if ($query->rowCount() > 0) {
			$data = $query->fetch(PDO::FETCH_ASSOC);
		    if (password_verify($password, $hash)) {
				$row = $query->fetch(PDO::FETCH_ASSOC);
				$_SESSION['username'] = $data['username'];
				$_SESSION['id'] = $data['id'];

				if ($data['is_admin']) {
                    header("Location: ./platform.php");
				    // admin
                } else {
                    $_SESSION['logged'] = true;
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