<?php
require_once "./PHP/validation.php";

if (isset($_POST['idPatients'], $_POST['dateHour'])) {
    $tab = [];

    foreach ($_POST as $key => $value) {
        $tab[$key] = sanitize($value);
    }

    try {
        require_once "./PHP/db.php";
        $idPatients = regexID($tab['idPatients']) ? $tab['idPatients'] : null;
        $dateHour = regexDate($tab['dateHour']) ? $tab['dateHour'] : null;

        $stmt = $conn->prepare("UPDATE appointments SET idPatients = :idPatients, dateHour = :dateHour WHERE id = :id");
        $stmt->bindParam(':dateHour', $dateHour);
        $stmt->bindParam(':idPatients', $idPatients);
        $stmt->bindParam(':id', $tab['id']);
        $stmt->execute();
        echo "Les enregistrements ont été mis à jour avec succès";
    } catch (PDOException $e) {
        $code = $e->getCode();
        $message = $e->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();
        echo "Exception levée dans $file à la ligne $line : [Code $code] $message";
    }
    $conn = null;
}
?>
<div>
    <?php
    try {
        require_once "./PHP/db.php";

        $stmt = $conn->prepare("SELECT id, dateHour, idPatients FROM appointments ORDER BY id ASC");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            echo "<h2>Liste des RDV (triée par ordre alphabétique)</h2>";
            echo "<table><tr><th>ID</th><th>Date du RDV</th><th>ID du patient</th></tr>";
            foreach ($result as $row) {
                echo "<tr>
                        <td><a href='profil-patient.php?id={$row["id"]}'>{$row["id"]}</a></td>
                        <td>{$row["dateHour"]}</td>
                        <td>{$row["idPatients"]}</td>
                      </tr>";
            }
        } else {
            echo "Aucun résultat trouvé";
        }
    } catch (PDOException $e) {
        $code = $e->getCode();
        $message = $e->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();
        echo "Exception levée dans $file à la ligne $line : [Code $code] $message";
    }
    $conn = null;
    ?>
    <!doctype html>
    <html lang="fr">

    <?php
    $titre = "Gestion Patients Saint Gilles - Interface CRM";
    $description = "Découvrez la solution de gestion des patients de Hôpital Saint Gilles. Une interface intuitive pour suivre, organiser et consulter les informations de vos patients et rendez-vous.";
    include './PHP/head.php';
    ?>

    <body>
        <?php include "./PHP/header.php"; ?>
        <main class="container">

        </main>

        <?php
        include './PHP/script-links.php';
        ?>
    </body>

    </html>