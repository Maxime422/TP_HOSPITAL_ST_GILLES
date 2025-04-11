<?php
$title = "Appointment Details - Patient Management - Saint Gilles Hospital CRM Interface";
$description = "View detailed information about a specific appointment. Access patient details, consultation notes, and appointment history in one place.";
require_once './src/models/frontend.php';
?>


<?php ob_start(); ?>
<section class="hero">
  <h1>Liste des rendez-vous</h1>
  <p>Remplissez le formulaire ci-dessous pour fixer un rendez-vous avec l'un de nos professionnels
    de
    santé. Veuillez vérifier attentivement les informations avant de valider.</p>
</section>
<section class="tableVue">
  <h2>Liste des rendez-vous (trier par orde aphabétique)</h2>
  <table>
    <tr>$patients =
      <th>ID</th>
      <th>Date</th>
      <th>ID patient</th>
    </tr>
    <?php if (count($appointments) > 0) {
      foreach ($appointments as $rdv) {
        echo "<tr>
      <td>{$rdv->getId()}</td>
      <td>{$rdv->getDate()}</td>
      <td><a href=\"index.php?action=rdvView&id={$rdv->getId()}\">Consulter</a></td>
    </tr>";
      }
    } else {
      echo "<tr><td colspan='6'>Aucun rdv dans la base de données</td></tr>";
    }
    ?>
  </table>
</section>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php') ?>
