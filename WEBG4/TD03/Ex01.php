<form action="" method="post">
    <input name="name">
    <button type="submit">OK</button>
</form>

<?php
if (isset($_POST['name'])) {
    echo '<h1>Bonjour (avec html) : ' . $_POST['name'] . ' !</h1>';
    echo '<h1>Bonjour (sans html) : ' . htmlspecialchars($_POST['name']) . ' !</h1>';
}
?>