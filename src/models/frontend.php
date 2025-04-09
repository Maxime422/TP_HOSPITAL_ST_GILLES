<?php
// model.php

require_once "dbConnect.php";
require_once "../../utils/validation.php";

function addPatient()
{
  if (isset($_POST['prenom'], $_POST['nom'], $_POST['birthday'], $_POST['phone'], $_POST['email'], $_POST['submit'])) {
    $bdd = dbConnect('hospitale2n');
    $tab = [];
    foreach ($_POST as $key => $value) {
      $tab[$key] = sanitize($value);
    }
    $newFirstName = regexTxt($tab['prenom']) ? $tab['prenom'] : null;
    $newLastName = regexTxt($tab['nom']) ? $tab['nom'] : null;
    $newPhone = regexTel($tab['phone']) ? $tab['phone'] : null;
    $newEmail = regexEmail($tab['email']) ? $tab['email'] : null;
    $newDate = regexDate($tab['birthday']) ? $tab['birthday'] : null;
    
    if (!$newFirstName || !$newLastName || !$newPhone || !$newEmail || !$newDate) {
      throw new Exception("Validation failed: Invalid input data");
    }

    $stmt = $bdd->prepare("INSERT INTO patients (lastName, firstname, birthdate, phone, mail) VALUES (:lastName, :firstname, :birthdate, :phone, :mail)");
    $stmt->bindParam(':lastName', $newLastName);
    $stmt->bindParam(':firstname', $newFirstName);
    $stmt->bindParam(':birthdate', $newDate);
    $stmt->bindParam(':phone', $newPhone);
    $stmt->bindParam(':mail', $newEmail);
    $stmt->execute();

    if (!$stmt->execute()) {
      throw new Exception("Failed to execute SQL query");
    }

  } else {
    echo 'Erreur de form';
    return false;
  }
  $bdd = null;
}

