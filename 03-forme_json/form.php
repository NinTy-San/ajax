<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax - select </title>
    <style>
        form{width:50%; margin:0 auto; padding:20px;}
        select{width:100%;height:30px;border:1px solid #333; margin-bottom:20px}
    </style>
</head>

<body>
    <div style="width:1000px; margin:0; padding:20px;">
        <form>
            <label>Choiosir une personne</label>
            <select onchange="monAjax()" id="personne">
                <option>...</option>
                <option>chevel</option>
                <option>cottet</option>
                <option>grand</option>
                <option>fellier</option>
                <option>lafaye</option>
                <option>durand</option>
            </select>
        </form>
        <hr>
        <div id="resultat"></div>
            <?php
/*
$fichier = file_get_contents('fichier.json');
$tableau = jsaon_decode($fichier); // format array / objet
$tableau = jsaon_decode($fichier, true); // format array / array
rcho '<pre>; var_dump($tableau); eco '</pre>;
 */
?>
            <script>
                function monAjax(){
                    var fichier = 'ajax.php';
                    var valeur = document.getElementById('personne').value;
                    console.log(valeur);
                    var params = 'choix='+valeur;
                    console.log(params);

                    // instanciation de l'objet ajax avec prise en compte d'internet explorer
                    if(window.XMLHttpRequest){
                        var xhttp = new XMLHttpRequest();
                        //console.log(xhttp);

                    }else{
                        // pour internet axplorer
                        var xhttp = new ActiveXObjet("Microsoft.XMLHTTP");
                    }// fin function monAjax()

                    xhttp.open("POST", fichier, true);
                    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');

                    xhttp.onreadystatechange = function(){
                    console.log(xhttp.readyState);
                    console.log(xhttp.status);



                        if(xhttp.readyState == 4 && xhttp.status == 200){
                            // alert('ok');


                            console.log(xhttp.responseText);
                            // on transforme la réponse en objet JSON
                            var reponse = JSON.parse(xhttp.responseText);
                            document.getElementById('resultat').innerHTML = reponse.contenu;

                        } // fin if(xhttp.readyState == 4 &&

                    } // fin if(window.XMLHttpRequest)

                    xhttp.send(params); // on envoie

                }// fin if(window.XMLHttpRequest)
            </script>

    </div>
</body>
</html>
