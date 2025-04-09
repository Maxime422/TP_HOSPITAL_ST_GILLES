<?php $title = "Patient Profile - Patient Management - Saint Gilles Hospital CRM Interface";
$description = "View the detailed profile of a specific patient. Access their personal information, medical history, and appointment records in one place.";
require_once '../../models/frontend.php';

$id = $_GET['id'] ?? null;
if (!$id) {
  echo "Erreur : ID patient manquant.";
  exit();
}

$patient = getPatientById($id); // Implémentez cette fonction dans votre modèle
if (!$patient) {
  echo "Erreur : Patient introuvable.";
  exit();
}
?>

<?php ob_start(); ?>
<h1>Profil du patient : <?= htmlspecialchars($patient->getFirstName() . ' ' . $patient->getLastName()) ?></h1>
<p>Email : <?= htmlspecialchars($patient->getMail()) ?></p>
<p>Téléphone : <?= htmlspecialchars($patient->getPhone()) ?></p>
<p>Date de naissance : <?= htmlspecialchars($patient->getBirthDate()) ?></p>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php') ?>