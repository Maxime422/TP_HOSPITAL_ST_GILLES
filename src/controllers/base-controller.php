<?php
/************** Require **************/
require_once './src/models/frontend.php';

/************** Patients **************/
function addPatientController()
{
  // If POST request and required fields are set, add patient
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prenom'], $_POST['nom'], $_POST['birthday'], $_POST['phone'], $_POST['email'], $_POST['submit'])) {
      addPatient($_POST);
    } else
      throw new Exception('Incomplete patient form.');
  }
  require './src/views/frontend/patient-add-view.php';
}

function patientsListController()
{
  $patients = getPatientsList();
  require('./src/views/frontend/patients-list-view.php');
}

function profilPatientController()
{
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    $patients = getPatientById($_GET['id']);
  }
  require './src/views/frontend/patient-profil-view.php';
}
function deletePatientController()
{
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    dropPatient($_GET['id']);
    header('Location: index.php?action=addPatient');
    exit();
  } else {
    echo 'Erreur : ID patient manquant.';
  }
}


/************** Appointments **************/
function addAppointmentController()
{
  // If method Post and isset, addRdv()
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['idPatients'], $_POST['dateHour'], $_POST['submit'])) {
      addAppointment($_POST);
    } else
      throw new Exception('Formulaire Rdv incomplet');
  }

  require './src/views/frontend/appointment-add-view.php';
}

function appointmentIdController()
{
  $patients = getAppointmentById($_GET['id']);
  require './src/views/frontend/appointment-view.php';
}

function listAppointmentController()
{
  $appointments = getAppointmentList();
  require './src/views/frontend/appointment-list-view.php';
}

function deleteAppointmentController()
{
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    dropAppointment($_GET['id']);
    header('Location: index.php?action=listAppointment');
    exit();
  } else {
    echo 'Erreur : ID rdv manquant.';
  }
}
