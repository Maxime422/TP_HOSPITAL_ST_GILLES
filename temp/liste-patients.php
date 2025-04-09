<?php
require_once "./PHP/validation.php";

function getData()
{
    try {
        require_once "./PHP/db.php";

        $stmt = $conn->prepare("SELECT id, lastName, firstName, birthDate, phone, mail FROM patients ORDER BY id ASC");
        $stmt->execute();


        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            echo "<h2>Liste des patients (trier par orde aphabétique)</h2>";
            echo "<table><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Date de naissance</th><th>téléphone</th><th>email</th></tr>";
            foreach ($result as $row) {
                echo "<tr>
            <td>{$row["id"]}</td>
            <td><a href='profil-patient.php?id={$row["id"]}'>{$row["lastName"]}</a></td>
            <td>{$row["firstName"]}</td>
            <td>{$row["birthDate"]}</td>
            <td>{$row["phone"]}</td>
            <td>{$row["mail"]}</td>
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
$titre = "Liste des Patients - Gestion Patients Saint Gilles - Interface CRM";
$description = "Consultez l'ensemble des dossiers patients enregistrés. Parcourez la liste, recherchez et filtrez les patients pour une gestion simplifiée et efficace.";
include './PHP/head.php';
?>

<body>
    <?php include "./PHP/header.php"; ?>
    <main class="container">
        <?php getData(); ?>
    </main>

    <?php
    include './PHP/script-links.php';
    ?>
</body>

</html>
