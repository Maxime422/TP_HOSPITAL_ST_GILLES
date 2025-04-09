<?php
$title = "Patient List - Patient Management - Saint Gilles Hospital CRM Interface";
$description = "View all registered patient records. Browse the list, search, and filter patients for simplified and efficient management.";
?>


<?php ob_start(); ?>
<h1>Forum Communautaire NovaTalk</h1>
<p>Bienvenue sur NovaTalk, l'espace d'échange et de discussion entre passionnés de technologie, de création et de
  culture numérique. Rejoins la communauté, partage tes idées, pose tes questions et développe ton réseau !</p>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php') ?>
