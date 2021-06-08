<?php
$title = "Tous les messages";
ob_start();
?>
    <h1>Tous les messages</h1>
    <table class="messages">
        <tr>
            <th>Date</th>
            <th>Auteur</th>
            <th>Titre</th>
        </tr>
        <?php foreach ($allMessages as $row) : ?>
            <tr>
                <td><?= htmlspecialchars($row["msg_date"]) ?></td>
                <td><?= htmlspecialchars($row["name"]) ?></td>
                <td><a href="index.php?action=moreDetail&id=<?= $row["id"] ?>"><?= $row["title"] ?></a></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php
$content = ob_get_clean();
require "template.php";
?>