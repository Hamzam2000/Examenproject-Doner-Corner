<?php
	
	require 'database.php';
	require 'includes/register.inc.php';
	
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Döner Corner</title>
  </head>

  <ul class="nav nav-tabs">
      <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="Inlog.php">Inloggen</a>
      </li>
      <li class="nav-item">
          <a class="nav-link active" href="register.php">Registreren</a>
      </li>
  </ul>
	<br>
<div class="row">
 <div class="col-md-6 offset-md-3"> 
<form method="post" action="register.php">
 <img class="mb-4" src="image/logo.png" alt="" width="144" height="72">
 
	<?php if ($msg != "") echo $msg . "<br><br>"; ?>

    <div class="form-group">
      <label for="inputName">Username</label>
      <input name="username" type="text" class="form-control" id="inputName" placeholder="Username" required>
  </div>
    <div class="form-group">
      <label for="inputEmail4">Email</label>
      <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
    </div>
	  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputPassword4">Wachtwoord</label>
      <input name="password" type="password" class="form-control" id="inputPassword4" placeholder="Password" required>
    </div>
	    <div class="form-group col-md-6">
      <label for="inputPassword4">Bevestig Wachtwoord</label>
      <input name="CPassword" type="password" class="form-control" id="inputPassword4" placeholder="Password" required>
    </div>
	</div>
    <label for="inputAddress">Adres</label>
    <input name="adress" type="text" class="form-control" id="inputAddress" placeholder="Adres" required>
  <div class="form-group">
    <div class="form-check">
    </div>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Registreren</button>
</form>
</div>
</div>

  
    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>