<?php
$title = htmlspecialchars($oneMessage['title']);
ob_start();
?>
    <h1><?= htmlspecialchars($oneMessage['title']) ?></h1>
    <p><?= htmlspecialchars($oneMessage['content']) ?></p>
<?php
$content = ob_get_clean();
require "template.php";
?>