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
            <label for="">Pays</label>
            <select name="" id="pays">
                <option  value="">Choisir un pays...</option>
                    <option >France</option>
                    <option >Angleterre</option>
                    <option >Espagne</option>
            </select>
            <label for="">Ville</label>
            <select name="" id="ville">
                <option value="">Veuillez choisir un pays...</option>
            </select>
        </form>
    </div>

    <script>
        // evenement :
        document.getElementById('pays').addEventListener('change', function(){

            // fichier cible
            var fichier = 'ajax.php';

            // instanciation de l'objet ajax :
            var xhttp = new XMLHttpRequest();

            // on récupère la valeur du champs pays
            var valeur = this.value;
            console.log(valeur);

            // préparation des paramètres pour POST
            var params = 'pays='+valeur;
            console.log(params);

            //préparation de la requête ajax
            xhttp.open('POST', fichier, true);
                // dans "open()" 3 argument :
                    // - la methode POST ou GET
                    // - le fichier cible
                    // - optionnel, asynchrone ou pas (true/false) c'est un true par défaut




            // en methode POST, la ligne suivante est obligatoire et doit se troouver après la ligne  ".open()"
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhttp.onreadystatechange = function(){
                if(xhttp.status == 200 && xhttp.readyState == 4){
                    console.log(xhttp.responseText);
                    document.getElementById('ville').innerHTML = xhttp.responseText;
                } // if(xhttp.status == 200 &&

            } // xhttp.onreadystatchange = function()

            xhttp.send(params); // on envoie le requête ajax. Les parametres de POST se placent dans la methode ".send(parametres)"

        });// fin document.getElementById('pays')
    </script>
</body>

</html>
