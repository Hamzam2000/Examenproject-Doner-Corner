<?php

function getdb() {
//database connectie
  $dbc = 'mysql:host=localhost;dbname=dcveen';
  $username = 'root';
  $password = '';
  $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //make the default fetch be an associative array
  ];

  try {
    return $conn = new PDO($dbc, $username, $password, $options);
  } catch(PDOException $e) {

  }
}  
?>