<?php
/************** Require **************/
require_once './src/controllers/base-controller.php';
require_once './src/models/frontend.php';

/************** Get Action **************/
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    // Patient routes
    case 'addPatient':
      addPatientController();
      break;

    case 'listPatient':
      patientsListController();
      break;

    case 'profilPatient':
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        profilPatientController();
      } else {
        // Error: missing or invalid patient ID.
        echo 'Erreur : ID patient manquant.';
      }
      break;

    case 'deletePatient':
      deletePatientController();
      break;

    // Appointment routes
    case 'idAppointment':
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        appointmentIdController();
      } else {
        // Error: missing or invalid appointment ID.
        echo 'Erreur : ID patient manquant.';
      }
      break;

    case 'addAppointment':
      addAppointmentController();
      break;

    case 'listAppointment':
      listAppointmentController();
      break;

    case 'deleteAppointment':
      deleteAppointmentController();
      break;

    // Default 404
    default:
      http_response_code(404);
      require './src/views/frontend/404.php';
      break;
  }
}
// Index page
else {
  require './src/views/frontend/index-view.php';
}
