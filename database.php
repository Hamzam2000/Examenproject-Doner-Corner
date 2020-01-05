<?php

function getdb() {
//database connectie
  $dbc = 'mysql:host=localhost;dbname=dcveen';
  $username = 'root';
  $password = '';
  $options = [];

  try {
    return $conn = new PDO($dbc, $username, $password, $options);
  } catch(PDOException $e) {

  }
}  
?>