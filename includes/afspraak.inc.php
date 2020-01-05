<?php 

function getAfspraak() {
  $conn = getdb();
  $stmt = $conn->prepare("SELECT id, klant, datum FROM afspraak ORDER BY id DESC");
  $stmt->execute();
  $result = $stmt->fetchAll();
  return $result;
}
?>