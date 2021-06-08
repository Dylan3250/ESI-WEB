<?php
if (isset($_GET["name"])) {
    $name = $_GET["name"];
    echo "Bonjour $name !";
    exit();
}
?>

<input type="text" id="name">
<button>Envoyer</button>
<p id="answer"></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("button").click(function () {
            let name = $("#name").val();
            $.get("Example02.php?name=" + name, function (data, status) {
                $("#answer").text(data);
            });
        });
    });
</script>
