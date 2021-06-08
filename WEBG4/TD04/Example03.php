<?php
if (isset($_GET["ue"])):
    $ue = $_GET["ue"];
    $ues = [
        "webg2" => (object)["ects" => 5,
            "aas" => ["Développement WEB I"]],
        "webg4" => (object)["ects" => 4,
            "aas" => ["Développement WEB II", "Ergonomie"]],
        "webg5" => (object)["ects" => 3,
            "aas" => ["Développement WEB III"]]
    ];
    ?>

    <table>
        <tr>
            <th>ECTS</th>
            <td><?= $ues[$ue]->ects ?></td>
        </tr>
        <tr>
            <th>AAs</th>
            <td><?= implode(', ', $ues[$ue]->aas); ?></td>
        </tr>
    </table>

    <?php exit();
endif ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<input type="text" id="ue" placeholder="UE">
<button>Détail</button>
<div id="answer"></div>
<script>
    $(document).ready(function () {
        $("button").click(function () {
            let ue = $("#ue").val();
            $.get("Example03.php?ue=" + ue, function (data, status) {
                $("#answer").html(data);
            });
        });
    });
</script>

