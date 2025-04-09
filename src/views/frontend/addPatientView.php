<?php
$title = "Add Patient - Patient Management - Saint Gilles Hospital CRM Interface";
$description = "Quickly register a new patient in our system. Fill in the essential information to ensure optimal care at Saint Gilles Hospital.";
require_once './src/models/frontend.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  addPatient();
}
?>

<?php ob_start(); ?>
<section class="hero">
  <div class="heroContent">
    <h1>Prendre un nouveau rendez-vous</h1>
    <p>Remplissez le formulaire ci-dessous pour fixer un rendez-vous avec l'un de nos professionnels de santé. Veuillez
      vérifier attentivement les informations avant de valider.</p>
  </div>
  <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" placeholder="Prénom" required>

    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" placeholder="Nom" required>

    <label for="birthday">Date Annivesaire</label>
    <input type="date" name="birthday" id="birthday" required>

    <label for="phone">Téléphone</label>
    <input type="tel" name="phone" id="phone" required>

    <label for="mail">Mail</label>
    <input type="email" name="email" id="email" placeholder="email" required />

    <input type="submit" name="submit" class="cta">
  </form>
</section>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php') ?>
