<?php
$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: liste-patients.php");
    exit();
} else {
    try {
        require_once "./PHP/db.php";
        $stmt = $conn->prepare("SELECT id, lastName, firstName, birthDate, phone, mail FROM patients WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $newNameFirst = $result['firstName'];
            $newName = $result['lastName'];
            $newPhone = $result['phone'];
            $newMail = $result['mail'];
            $newDate = $result['birthDate'];
        } else {
            echo "No results found.";
        }
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

<?php
require_once "./PHP/validation.php";

if (isset($_POST['prenom'], $_POST['nom'], $_POST['birthday'], $_POST['phone'], $_POST['email'], $_POST['submit'])) {
    $tab = [];

    foreach ($_POST as $key => $value) {
        $tab[$key] = sanitize($value);
    }

    try {
        require_once "./PHP/db.php";
        $newNameFirst = regexName($tab['prenom']) ? $tab['prenom'] : null;
        $newName = regexName($tab['nom']) ? $tab['nom'] : null;
        $newPhone = regexTel($tab['phone']) ? $tab['phone'] : null;
        $newMail = regexEmail($tab['email']) ? $tab['email'] : null;
        $newDate = regexAge($tab['birthday']) ? $tab['birthday'] : null;

        if ($newNameFirst && $newName && $newPhone && $newMail && $newDate) {
            $stmt = $conn->prepare("UPDATE patients SET lastName = :lastName, firstName = :firstName, birthDate = :birthDate, phone = :phone, mail = :mail WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':firstName', $newNameFirst, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $newName, PDO::PARAM_STR);
            $stmt->bindParam(':birthDate', $newDate, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $newPhone, PDO::PARAM_STR);
            $stmt->bindParam(':mail', $newMail, PDO::PARAM_STR);
            $stmt->execute();
        } else {
            echo "Invalid input data.";
        }
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
$titre = "Gestion Patients Saint Gilles - Interface CRM";
$description = "Découvrez la solution de gestion des patients de Hôpital Saint Gilles. Une interface intuitive pour suivre, organiser et consulter les informations de vos patients et rendez-vous.";
include './PHP/head.php';
?>

<body>
    <?php include "./PHP/header.php"; ?>
    <main class="container">
        <section>
            <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) . '?id=' . htmlspecialchars($id) ?>" method="post">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Prénom"
                    value="<?= htmlspecialchars($newNameFirst ?? '') ?>" required>

                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Nom" value="<?= htmlspecialchars($newName ?? '') ?>"
                    required>

                <label for="birthday">Date Anniversaire</label>
                <input type="date" name="birthday" id="birthday" value="<?= htmlspecialchars($newDate ?? '') ?>"
                    required>

                <label for="phone">Téléphone</label>
                <input type="tel" name="phone" id="phone" value="<?= htmlspecialchars($newPhone ?? '') ?>" required />

                <label for="mail">Mail</label>
                <input type="email" name="email" id="email" placeholder="email"
                    value="<?= htmlspecialchars($newMail ?? '') ?>" required />

                <input type="submit" name="submit" class="cta">
            </form>
        </section>
    </main>

    <?php include './PHP/script-links.php'; ?>
</body>

</html>