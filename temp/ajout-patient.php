<?php
require_once "./PHP/validation.php";

if (isset($_POST['prenom'], $_POST['nom'], $_POST['birthday'], $_POST['phone'], $_POST['email'], $_POST['submit'])) {
    $tab = [];

    foreach ($_POST as $key => $value) {
        $tab[$key] = sanitize($value);
    }

    try {
        require "db.php"; // Include the database connection file
        $newNameFirst = regexName($tab['prenom']) ? $tab['prenom'] : null;
        $newName = regexName($tab['nom']) ? $tab['nom'] : null;
        $newPhone = regexTel($tab['phone']) ? $tab['phone'] : null;
        $newMail = regexEmail($tab['email']) ? $tab['email'] : null;
        $newDate = regexAge($tab['birthday']) ? $tab['birthday'] : null;



        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO patients (lastName, firstname, birthdate, phone, mail) VALUES (:lastName, :firstname, :birthdate, :phone, :mail)");
        $stmt->bindParam(':firstname', $newNameFirst);
        $stmt->bindParam(':lastName', $newName);
        $stmt->bindParam(':birthdate', $newDate);
        $stmt->bindParam(':phone', $newPhone);
        $stmt->bindParam(':mail', $newMail);
        $stmt->execute();
        echo "New records created successfully";
    } catch (PDOException $e) {
        $code = $e->getCode();
        $message = $e->getMessage();
        $file = $e->getFile();
        $line = $e->getLine();
        echo "Exception thrown in $file on line $line: [Code $code] $message";
    }
    $conn = null;

}
?>

<!doctype html>
<html lang="fr">

<?php
$titre = "Ajouter un Patient - Gestion Patients Saint Gilles - Interface CRM";
$description = "Enregistrez rapidement un nouveau patient dans notre système. Remplissez les informations essentielles pour une prise en charge optimale à l’Hôpital Saint Gilles.";
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
