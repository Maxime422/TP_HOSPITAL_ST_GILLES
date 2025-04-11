<?php
/************** Require **************/
require_once "./src/models/db-connect.php";
require_once "./src/utils/validation.php";
require_once "./src/utils/objects.php";


/************** Patients **************/
function addPatient($post)
{
  // Login to dataBase
  $bdd = dbConnect('hospitale2n');

  // Sanitize all inputs
  $tab = [];
  foreach ($post as $key => $value) {
    $tab[$key] = sanitize($value);
  }
  // Regex all inputs
  $newFirstName = regexTxt($tab['prenom']) ? $tab['prenom'] : null;
  $newLastName = regexTxt($tab['nom']) ? $tab['nom'] : null;
  $newPhone = regexTel($tab['phone']) ? $tab['phone'] : null;
  $newEmail = regexEmail($tab['email']) ? $tab['email'] : null;
  $newDate = regexDate($tab['birthday']) ? $tab['birthday'] : null;

  if (!$newFirstName || !$newLastName || !$newPhone || !$newEmail || !$newDate) {
    throw new Exception("Validation failed: Invalid input data");
  }
  // Insert intro the patients table
  $stmt = $bdd->prepare("INSERT INTO patients (lastName, firstname, birthdate, phone, mail) VALUES (:lastName, :firstname, :birthdate, :phone, :mail)");
  $stmt->bindParam(':lastName', $newLastName);
  $stmt->bindParam(':firstname', $newFirstName);
  $stmt->bindParam(':birthdate', $newDate);
  $stmt->bindParam(':phone', $newPhone);
  $stmt->bindParam(':mail', $newEmail);
  $stmt->execute();

  $bdd = null;
}

function getPatientsList()
{
  // Login to dataBase
  $bdd = dbConnect('hospitale2n');

  // Select all patients intro the patients table
  $stmt = $bdd->prepare("SELECT id, lastName, firstName, birthDate, phone, mail FROM patients ORDER BY id ASC");
  $stmt->execute();

  // FetchAll data of patients and create foreach patient a new Object Patient
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

function getPatientById($id)
{
  // Login to dataBase
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

function dropPatient($id)
{
  // Login to dataBase
  $bdd = dbConnect('hospitale2n');

  // Préparer la requête pour supprimer le patient
  $stmt = $bdd->prepare("DELETE FROM patients WHERE id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  // Exécuter la requête
  $stmt->execute();

  $bdd = null;
}

/************** Appointments **************/
function addAppointment($post)
{
  // Login to dataBase
  $bdd = dbConnect('hospitale2n');

  // Sanitize all inputs
  $tab = [];
  foreach ($post as $key => $value) {
    $tab[$key] = sanitize($value);
  }
  // Regex all inputs
  $idPatients = regexID($tab['idPatients']) ? $tab['idPatients'] : null;
  $dateHour = regexDate($tab['dateHour']) ? $tab['dateHour'] : null;

  if (!$idPatients || !$dateHour) {
    throw new Exception("Validation failed: Invalid input data");
  }
  // Insert intro the appointments table
  $stmt = $bdd->prepare("INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)");
  $stmt->bindParam(':dateHour', $dateHour);
  $stmt->bindParam(':idPatients', $idPatients);
  $stmt->execute();

  $bdd = null;
}


function getAppointmentList()
{
  // Login to dataBase
  $bdd = dbConnect('hospitale2n');

  // Select all appointments intro the appointments table
  $stmt = $bdd->prepare("SELECT id, dateHour, idPatients FROM appointments ORDER BY id ASC");
  $stmt->execute();

  // FetchAll data of appointments and create foreach appointment a new Object Appointment
  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $patients = [];

  foreach ($result as $row) {
    $patients[] = new Appointment(
      $row['id'],
      $row['dateHour'],
      $row['idPatients'],
    );
  }

  $bdd = null;
}

function getAppointmentById($id)
{
  // Login to dataBase
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

function dropAppointment($id)
{
  // Login to dataBase
  $bdd = dbConnect('hospitale2n');

  // Préparer la requête pour supprimer le patient
  $stmt = $bdd->prepare("DELETE FROM appointments WHERE id = :id");
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  // Exécuter la requête
  $stmt->execute();

  $bdd = null;
}
