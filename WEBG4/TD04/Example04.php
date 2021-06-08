<?php
if (isset($_GET["ue"])) {
    $ue = $_GET["ue"];
    $ues = [
        "webg2" => (object)["ects" => 5,
            "aas" => ["Développement WEB I"]],
        "webg4" => (object)["ects" => 4,
            "aas" => ["Développement WEB II", "Ergonomie"]],
        "webg5" => (object)["ects" => 3,
            "aas" => ["Développement WEB III"]]
    ];
    echo json_encode($ues[$ue]);
    exit();
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<input type="text" id="ue" placeholder="UE">
<button>Détail</button>
<table id="horaire">
    <tr>
        <th>ECTS</th>
        <td><span id="ects"></span></td>
    </tr>
    <tr>
        <th>AAs</th>
        <td><span id="aas"></span></td>
    </tr>
</table>
<script>
    $(document).ready(function () {
        $("button").click(function () {
            let ue = $("#ue").val();
            $.get("Example04.php?ue=" + ue, function (jsData, status) {
                console.log(jsData);
                let ue = JSON.parse(jsData);
                $("#ects").text(ue.ects);
                $("#aas").text(ue.aas);
            });
        });
    });
</script>
