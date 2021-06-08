<?php
$title = "Valves-Erreur";
ob_start();
?>
    <h1>Erreur</h1>
    <p>
        Une erreur est survenue.
        Veuillez réessayer plus tard.
    </p>
    <a href="index.php">Accueil</a>
<?php
$content = ob_get_clean();
require "template.php";
?>