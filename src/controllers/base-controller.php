<?php
require_once './src/models/frontend.php';
function patientsListView()
{
  $patients = getPatientsList();
  require('./src/views/frontend/patients-list-view.php');
}

function profilPatient()
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
  $patients = getPatientsList();
  require './src/views/frontend/add-patient-view.php';
}
