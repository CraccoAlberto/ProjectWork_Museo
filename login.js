function login() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var xmlreq = new XMLHttpRequest();
    xmlreq.open("POST", "./queryLogin.php", true);
    xmlreq.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlreq.onreadystatechange = function() {
        if (xmlreq.readyState == 4 && xmlreq.status == 200) {
            var response = xmlreq.responseText;
            if (response == "Logged in") {
                CreateSession(username);
                window.location.href = "homepage.php";
            } else {
                alert("Username o password invalido");
                document.getElementById("username").value = "";
                document.getElementById("password").value = "";
            }
        }
    }
}

function CreateSession(username) {
    sessionStorage.setItem("Utente", username);
}