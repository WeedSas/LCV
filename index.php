<?php
if (!isset($_SESSION)) {
    session_start();
}

include "config.php";
$_SESSION['borne'] = "la_croix_valmer";

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Application interactive La Croix Valmer</title>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="stylesheet" href="styles/animations.css">
    <script src="scripts/jquery.js"></script>
    <script src="scripts/script.js"></script>
</head>

<body>
    <?php
    include 'template/header.php';
    include 'template/menu.php';
    include 'template/footer.php';
    ?>
</body>

</html>