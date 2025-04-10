<?php
require_once './src/controllers/base-controller.php';
require_once './src/models/frontend.php';

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'patientsList':
      patientsListView();
      break;

    case 'profilPatient':
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        profilPatient();
      } else {
        echo 'Erreur : ID patient manquant.';
      }
      break;

    case 'rdvView':
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        rdvView();
      } else {
        echo 'Erreur : ID patient manquant.';
      }
      break;

    case 'addPatient':
      addPatientView();
      break;

    case 'addRdv':
      addRdvView();
      break;

    case 'rdvList':
      rdvListView();
      break;

    case 'deletePatient':
      deletePatient();
      break;

      

    default:
      echo 'Page introuvable.';
      require 'src/views/frontend/404.php';
      break;
  }
} else {
  require 'src/views/frontend/index-view.php';
}
