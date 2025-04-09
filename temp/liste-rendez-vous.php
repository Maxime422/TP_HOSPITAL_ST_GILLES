<?php
require_once "./PHP/validation.php";
function getData()
{
    try {
        require_once "./PHP/db.php";

        $stmt = $conn->prepare("SELECT id, dateHour, idPatients FROM appointments ORDER BY id ASC");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            echo "<h2>Liste des RDV (trier par orde aphabétique)</h2>";
            echo "<table><tr><th>ID</th><th>Date du RDV</th><th>ID du patient</th></tr>";
            foreach ($result as $row) {
                echo "<tr>
                        <td><a href='rendez-vous.php?id={$row["id"]}'>{$row["id"]}</a></td>
                        <td>{$row["dateHour"]}</td>
                        <td>{$row["idPatients"]}</td>
                      </tr>";
            }

        } else {
            echo "0 results";
        }

    } catch (PDOException $e) {
        $code = $e->getCode();
        $message = $e->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();
        echo "Exception thrown in $file on line $line: [Code $code]$message";
    }
    $conn = null;
}
?>


<!doctype html>
<html lang="fr">

<?php
$titre = "Liste des Rendez-vous - Gestion Patients Saint Gilles - Interface CRM";
$description = "Visualisez et gérez tous les rendez-vous programmés. Une liste détaillée pour suivre les consultations à venir et passées de manière claire et organisée.";
include './PHP/head.php';
?>

<body>
    <?php include "./PHP/header.php"; ?>
    <main class="container">
        <?php getData()?>
    </main>

    <?php
    include './PHP/script-links.php';
    ?>
</body>

</html>
