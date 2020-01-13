<?php
	
	require_once './database.php';
	$conn = getdb();
	$msg = "";

	if (isset($_POST['submit'])) {

		$username = ($_POST['username']);
		$password = ($_POST['password']);
        $hash = password_hash($password, PASSWORD_DEFAULT);

		$query = $conn->prepare("SELECT * FROM user WHERE username='$username'");

		if ($query->rowCount() > 0) {
            $query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
		    if (password_verify($password, $hash)) {
				$row = $query->fetch(PDO::FETCH_ASSOC);
				$_SESSION['username'] = $data['username'];
				$_SESSION['id'] = $data['id'];

				if ($data['is_admin']) {
                    header("Location: ewa.php");
				    // admin
                } else {
                    header("Location: platform.php");
                }

            } else {
			    $msg = "Probeer het nog eens!";
			}
        } else {
            $msg = "Probeer het nog eens!";
		}	
	}
?>