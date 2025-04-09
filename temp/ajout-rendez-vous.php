<?php
require_once "./PHP/validation.php";

if (isset($_POST['idPatients'], $_POST['dateHour'])) {
    $tab = [];

    foreach ($_POST as $key => $value) {
        $tab[$key] = sanitize($value);
    }

    function regexDate($data) // Renamed function for clarity
    {
        $patternText = '/^(\d{4})-(0[1-9]|1[0-2])-(0[1-9]|[1-2]\d|3[0-1])$/';
        return preg_match($patternText, $data);
    }

    function regexID($data)
    {
        return preg_match('/^\d+$/', $data);
    }

    try {
        require_once "./PHP/db.php"; // Include the database connection file
        $idPatients = regexID($tab['idPatients']) ? $tab['idPatients'] : null; // Fixed validation function
        $dateHour = regexDate($tab['dateHour']) ? $tab['dateHour'] : null; // Fixed validation function

        if ($idPatients && $dateHour) { // Ensure both fields are valid
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO appointments (dateHour, idPatients) VALUES (:dateHour, :idPatients)");
            $stmt->bindParam(':dateHour', $dateHour);
            $stmt->bindParam(':idPatients', $idPatients);
            $stmt->execute();
            echo "New records created successfully";
        } else {
            echo "Invalid input data.";
        }
    } catch (PDOException $ex) { // Fixed variable name
        $code = $ex->getCode();
        $message = $ex->getMessage();
        $file = $ex->getFile();
        $line = $ex->getLine();
        echo "Exception thrown in $file on line $line: [Code $code] $message";
    }
    $conn = null;
}
?>

<!doctype html>
<html lang="fr">

<?php
$titre = "Planifier un Rendez-vous - Gestion Patients Saint Gilles - Interface CRM";
$description = "Organisez un nouveau rendez-vous pour un patient. Programmez une consultation en remplissant les informations nécessaires, pour une gestion efficace de votre planning.";
include './PHP/head.php';
?>

<body>
    <?php include "./PHP/header.php"; ?>
    <main class="container">
        <section class="hero">
            <div class="hero__content">
                <h1>Prendre un nouveau rendez-vous</h1>
                <p>Remplissez le formulaire ci-dessous pour fixer un rendez-vous avec l’un de nos professionnels
                    de
                    santé. Veuillez vérifier attentivement les informations avant de valider.</p>
            </div>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                <label for="dateHour">Date du Rdv</label>
                <input type="date" name="dateHour" id="dateHour" required> <!-- Fixed attribute -->

                <label for="idPatients">ID du patient</label>
                <input type="number" name="idPatients" id="idPatients" required> <!-- Fixed attribute -->

                <input type="submit" name="submit" class="cta">
            </form>
        </section>
    </main>

    <?php
    include './PHP/script-links.php';
    ?>
</body>

</html>