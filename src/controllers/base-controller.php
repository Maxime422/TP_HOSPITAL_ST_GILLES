<?php
require_once './src/models/frontend.php';
function patientsListController()
{
  $patients = getPatientsList();
  require('./src/views/frontend/patients-list-view.php');
}

function profilPatientController()
{
  $patients = getPatientById($_GET['id']);
  require './src/views/frontend/profil-patient-view.php';
}

function rdvView()
{
  $patients = getRdvById($_GET['id']);
  require './src/views/frontend/rdv-view.php';
}

function rdvListView()
{
  $patients = getRdvList();
  require './src/views/frontend/rdv-list-view.php';
}

function addPatientView()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prenom'], $_POST['nom'], $_POST['birthday'], $_POST['phone'], $_POST['email'], $_POST['submit'])) {
      addPatient($_POST);
    } else
      throw new Exception('Formulaire incomplet');
  }
  require './src/views/frontend/add-patient-view.php';
}

function addRdvView()
{
  $patients = addRdv();
  require './src/views/frontend/add-rdv-view.php';
}

function deletePatient()
{
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    dropPatient($_GET['id']);
    header('Location: index.php?action=patientsList');
    exit();
  } else {
    echo 'Erreur : ID patient manquant.';
  }
}


function deleteRdv()
{
  if (isset($_GET['id']) && $_GET['id'] > 0) {
    dropRdv($_GET['id']);
    header('Location: index.php?action=rdvList');
    exit();
  } else {
    echo 'Erreur : ID rdv manquant.';
  }
}
