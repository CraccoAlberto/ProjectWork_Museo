function loadMostra(nomeMostra) {
    sessionStorage.setItem('mostra', nomeMostra);
    redirect("./mostra.php");
}