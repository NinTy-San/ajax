setInterval('monAjax()', 5000);
// setInterval() permet de répéterla fonction fournie en premier argument selon un timer fourni en deuxième argument(en milliseconde). Ici la fonction monAjax() toute les 5 secondes

function monAjax() {
    var fichier = "ajax.php";

    var xhttp = new XMLHttpRequest();

    xhttp.open('POST', fichier, true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function () {
        if (xhttp.status == 200 && xhttp.readyState == 4) {
            console.log(xhttp.responseText);
            var retour = JSON.parse(xhttp.responseText);
            document.getElementById('resultat').innerHTML = retour.nombre + retour.contenu;

        } // fin if(xhttp.status == 200 && xhttp.readystate == 4)

    } // fin xhttp.onreadystatechange = function(){

    xhttp.send();
} // fin function monAjax()