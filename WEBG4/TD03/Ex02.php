<form action="" method="post">
    Text : <input type="text" name="text"><br>
    Radio : <input type="radio" name="r1"><br>
    Checkbox : <input type="checkbox" name="checkbox"><br>
    Select simple : <select name="selectSimple">
        <option value="val1">Val1</option>
        <option value="val2">Val2</option>
    </select><br>
    Select multiple : <select name="selectMultiple[]" multiple>
        <option value="val1Mult">Val1Mult</option>
        <option value="val2Mult">Val2Mult</option>
    </select><br>
    Textarea : <textarea name="textarea">Text à afficher</textarea><br><br>
    <button type="submit">Envoyer</button><br><br>
</form>

<?php
echo "<pre>"; var_dump($_GET); echo "</pre>";
echo "<pre>"; var_dump($_POST); echo "</pre>";
echo "<pre>"; var_dump($_REQUEST); echo "</pre>";