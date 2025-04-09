<?php
$title = "Patient List - Patient Management - Saint Gilles Hospital CRM Interface";
$description = "View all registered patient records. Browse the list, search, and filter patients for simplified and efficient management.";
require_once '../../models/frontend.php';
?>


<?php ob_start(); ?>
<section class="hero">
  <h1>Liste des patients</h1>
  <p>Remplissez le formulaire ci-dessous pour fixer un rendez-vous avec l'un de nos professionnels
    de
    santé. Veuillez vérifier attentivement les informations avant de valider.</p>
</section>
<section class="tableVue">
  <h2>Liste des patients (trier par orde aphabétique)</h2>
  <?php $patients = getPatientsList(); ?>
  <table>
    <tr>
      <th>ID</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Date de naissance</th>
      <th>téléphone</th>
      <th>email</th>
    </tr>
    <?php if (count($patients) > 0) {
      foreach ($patients as $patient) {
        echo "<tr>
        <td><a href='../../../index.php?action=profilPatient&id={$patient->getId()}'>" . htmlspecialchars($patient->getLastName()) . "</a></td>
        <td>{$patient->getFirstName()}</td>
        <td>{$patient->getBirthDate()}</td>
        <td>{$patient->getPhone()}</td>
        <td>{$patient->getMail()}</td>
      </tr>";

      }
    } else {
      echo "<tr><td colspan='6'>Aucun patient dans la base de données</td></tr>";
    }
    ?>
  </table>
</section>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php') ?>
