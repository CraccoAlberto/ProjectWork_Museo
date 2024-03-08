<html lang="it">
    <head>
        <meta charset="UTF-8">
        <title>Mostra</title>
        <script type="text/javascript" src="./redirect.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script type="text/javascript" src="./login.js"></script>
        <script>
            function loadMostra() {
                $.ajax({
                    url: "./loadMostra.php",
                    type: "GET",
                    dataType: "html",
                    success: function (data) {
                        $("#mostra").html(data);
                    }
                    error: function (data) {
                        echo "Errore, dati non caricati";
                    }
                });
            }
        </script>
    </head>

    <body onload="loadMostra()">
        <h2>Museo "Le meraviglie del '900"</h2>
        <div id="mostra"></div>
        <button onclick="redirect('./homepage.php')">Homepage</button>
        <button onclick="redirect('./prenotazione.php')">Prenota subito</button>
    </body>
</html>