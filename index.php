<?php
require_once './src/controllers/BaseController.php';
require_once './src/models/frontend.php';

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'patientsList':
      require 'src/views/frontend/patientsListView.php';
      break;

    case 'profilPatient':
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        require 'src/views/frontend/profilPatientView.php';
      } else {
        echo 'Erreur : ID patient manquant.';
      }
      break;

    case 'addPatient':
      require 'src/views/frontend/addPatientView.php';
      break;

    case 'addRdv':
      require 'src/views/frontend/addRdvView.php';
      break;

    case 'rdvList':
      require 'src/views/frontend/rdvListView.php';
      break;

    default:
      echo 'Page introuvable.';
      require 'src/views/frontend/404.php'; // Créez une page 404 si nécessaire
      break;
  }
} else {
  require 'src/views/frontend/indexView.php'; // Page d'accueil par défaut
}
