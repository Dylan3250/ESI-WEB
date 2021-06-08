<button>Serveur es-tu là ?</button>
<p id="answer"></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // let xhttp = new XMLHttpRequest();
    // xhttp.onreadystatechange = function() {
    //     if (this.readyState === 4 && this.status === 200) {
    //         document.getElementById("answer").innerHTML = this.responseText;
    //     }
    // };
    // xhttp.open("GET", "Example01Traitement.php", true);
    // xhttp.send();

    $(document).ready(function () {
        $("button").click(function () {
            $.get("Example01Traitement.php", function (data, status) {
                $("#answer").text(data);
            });
        });
    });
</script>