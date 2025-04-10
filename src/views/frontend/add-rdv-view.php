<?php
$title = "Add a New Appointment - Patient Management - Saint Gilles Hospital CRM Interface";
$description = "Easily schedule a patient consultation by entering the key details — streamline your calendar and stay organized.";
require_once './src/models/frontend.php';
?>


<?php ob_start(); ?>
<section class="hero">
  <div class="heroContent">
    <h1>Prendre un nouveau rendez-vous</h1>
    <p>Remplissez le formulaire ci-dessous pour fixer un rendez-vous avec l'un de nos professionnels
      de
      santé. Veuillez vérifier attentivement les informations avant de valider.</p>
  </div>
  <form action="" method="post">
    <label for="dateHour">Date du Rdv</label>
    <input type="date" name="dateHour" id="dateHour" required>

    <label for="idPatients">ID du patient</label>
    <input type="number" name="idPatients" id="idPatients" required>

    <input type="submit" name="submit" class="cta">
  </form>

  <?php $content = ob_get_clean(); ?>

  <?php require_once('template.php') ?>
