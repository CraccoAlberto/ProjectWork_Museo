function register() {
    var nome = document.getElementById("name").value;
    var cognome = document.getElementById("surname").value;
    var recapito = document.getElementById("recapito").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var xmlreq = new XMLHttpRequest();
    xmlreq.open("POST", "./queryRegister.php", true);
    xmlreq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlreq.onreadystatechange = function() {
        if (xmlreq.readyState == 4 && xmlreq.status == 200) {
            var response = xmlreq.responseText;
            if (response == "Logged in") {
                CreateSession(username);
                redirect("homepage.html");
            } else {
                alert("Utente già registrato");
                redirect("login.html");
            }
        }
    }
}

function CreateSession(username) {
    sessionStorage.setItem("Utente", username);
}