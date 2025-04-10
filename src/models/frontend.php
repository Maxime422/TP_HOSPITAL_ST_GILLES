<?php
// model.php

require_once "./src/models/db-connect.php";
require_once "./src/utils/validation.php";
require_once "./src/utils/objects.php";


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

  } else {
    echo 'Erreur de form';
    return false;
  }
  $bdd = null;
}

function addRdv()
{
  if (isset($_POST['idPatients'], $_POST['dateHour'], $_POST['submit'])) {
    $bdd = dbConnect('hospitale2n');
    $tab = [];
    foreach ($_POST as $key => $value) {
      $tab[$key] = sanitize($value);
    }

    $idPatients = regexID($tab['idPatients']) ? $tab['idPatients'] : null;
    $dateHour = regexDate($tab['dateHour']) ? $tab['dateHour'] : null;

    if (!$idPatients || !$dateHour) {
      throw new Exception("Validation failed: Invalid input data");
    }

    $stmt = $bdd->prepare("INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)");
    $stmt->bindParam(':dateHour', $dateHour);
    $stmt->bindParam(':idPatients', $idPatients);
    $stmt->execute();

  } else {
    echo 'Erreur de form';
    return false;
  }
  $bdd = null;
}


function getPatientsList()
{
  $bdd = dbConnect('hospitale2n');

  $stmt = $bdd->prepare("SELECT id, lastName, firstName, birthDate, phone, mail FROM patients ORDER BY id ASC");
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $patients = [];

  foreach ($result as $row) {
    $patients[] = new Patient(
      $row['id'],
      $row['lastName'],
      $row['firstName'],
      $row['birthDate'],
      $row['phone'],
      $row['mail']
    );
  }

  $bdd = null;
  return $patients;
}


function getRdvList()
{
  $bdd = dbConnect('hospitale2n');

  $stmt = $bdd->prepare("SELECT id, dateHour, idPatients FROM appointments ORDER BY id ASC");
  $stmt->execute();

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $patients = [];

  foreach ($result as $row) {
    $patients[] = new Rdv(
      $row['id'],
      $row['dateHour'],
      $row['idPatients'],
    );
  }

  $bdd = null;
  return $patients;
}

function getPatientById($id)
{
  $bdd = dbConnect('hospitale2n');
  $stmt = $bdd->prepare("SELECT id, lastName, firstName, birthDate, phone, mail FROM patients WHERE id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $bdd = null;

  if ($result) {
    return new Patient(
      $result['id'],
      $result['lastName'],
      $result['firstName'],
      $result['birthDate'],
      $result['phone'],
      $result['mail']
    );
  }
  return null;
}

function getRdvById($id)
{
  $bdd = dbConnect('hospitale2n');
  $stmt = $bdd->prepare("SELECT id, lastName, firstName, birthDate, phone, mail FROM patients WHERE id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  $bdd = null;

  if ($result) {
    return new Patient(
      $result['id'],
      $result['lastName'],
      $result['firstName'],
      $result['birthDate'],
      $result['phone'],
      $result['mail']
    );
  }
  return null;
}
