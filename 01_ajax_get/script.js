/* 
Statue de la requête Ajax : (readyState)
-----------------------------------------

0 - L'objet AJAX à été instancieé mais pas encore appelé
1 - On envoie l'objet (la requête) Ajax
2 - La requête a été reçue
3 - Le serveur traite la requête et commence à envoyer les données
4 - La requête est finie, nous avons reçu la réponse

Statut http : (status)
-----------------------

- 200 - tout est OK


ajax.onreadystatchange -> permet de décomposer les différentes étapes de la requête afin de déclencher notre code une fois la requête finie.

ajax.responseText - > contient la totalité de la réponse passée à notre objet ajax.

*/

document.getElementById('bouton').addEventListener('click', function () {
    var xhttp = new XMLHttpRequest(); // instanciation de l'objet XMLHttpRequest

    xhttp.onreadystatechange = function () {
        console.log(xhttp.readyState);
        console.log(xhttp.status);

        if (xhttp.readyState == 4 && xhttp.status == 200) {
            console.log(xhttp.responseText); // affiche la réponse dans la console

            document.getElementById('titre').textContent = xhttp.responseText;
        } // fin  if (xhttp.readyState == 4
    } // fin  xhttp.onreadystatechange

    xhttp.open('GET', 'infos.txt', true); // on prépare la requête ajax
    xhttp.send(); // on l'envoie

}); //fin document.getElementById('bouton')