<?php
// Question 1 : ça pourrait suffir car il y a une verification en JS qui est bypassable, mais derrière la valeur envoyée
// est filtrée et retirée de son HTML donc elle est safe.

// Question 2 : GET => Envoyé dans l'URL | POST => Envoyé en POST (mais peut être altéré) | REQUEST récupère le GET/POST/COOKIE

if (isset($_POST["selectMultiple"])) {
    foreach($_POST["selectMultiple"] as $value) {
        echo $value . '<br>';
    }
}
?>

<form action="" method="post">
    Select multiple : <select name="selectMultiple[]" multiple>
        <option value="val1Mult">Val1Mult</option>
        <option value="val2Mult">Val2Mult</option>
    </select><br>
    <button type="submit">Envoyer</button><br><br>
</form>
