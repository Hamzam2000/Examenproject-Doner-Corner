<?php
function getfactuur() {
  $conn = getdb();
  $stmt = $conn->prepare("SELECT id, Onderhoud, Klant, Prijs FROM factuur ORDER BY id DESC");
  $stmt->execute();
  $result = $stmt->fetchAll();
  return $result;
}
?>