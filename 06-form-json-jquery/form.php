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

<?php
    
    $fichier = file_get_contents('fichier.json');
    // $tableau = jsaon_decode($fichier); // format array / objet
    $tableau = json_decode($fichier, true); // format array / array
    // echo '<pre>; var_dump($tableau); echo '</pre>;
    
?>
        <form method="POST" action="ajax.php" id="form">
            <label>Choiosir une personne</label>
            <select id="personne" name="choix">
                <option>...</option>
                <?php 
                    foreach($tableau as $valeur){
                        echo '<option>'.$valeur['nom'].'</option>';
                    }
                ?>
            </select>
        </form>
        <hr>
        <div id="resultat"></div>


          <script
			  src="https://code.jquery.com/jquery-3.3.1.min.js"
			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			  crossorigin="anonymous">
        </script>
        <script>
            $(document).ready(function(){
                $('#personne').on('change', function(){
                    var fichier = 'ajax.php';
                    var valeur = $(this).val();
                    console.log(valeur);
                    var params = 'choix=' + valeur;
                  
                    
                    var fichier = $('#form').attr('action');
                    var methode = $('#form').attr('method');
                    var params = $('#form').serialize();
                    console.log(fichier);
                    console.log(valeur);
                    console.log(params);

                    // avec la méthode jQuery post()
                    $.post(fichier, params, function(response){
                        $("#resultat").html(response.contenu);
                    }, 'json');
                    
                    // Ordre des argument avec .post()
                    
                    // 1 seul param
                    /* 
                    $.post('fichier_cible', 'param=valeur', 'function en cas de success', 'type de données');
                    */
                    
                    // avec plusieurs params 
                    
                    /*
                    $.post('fichier_cible', {param1: 'valeur1', param2: valeur2, ...} , 'function en cas de success', 'type de données');
                    */
                    
                    // avec la méthode jQuery ajax()
                    // $.ajax({
                    //     url: fichier, // le fichier cible
                    //     type: methode, // la méthode utilisée
                    //     data: params, // les argument a fournir
                    //     success: function(response){
                    //         console.log(response);
                    //         $("#resultat").html(response.contenu);
                    //     }, // la fonction qui doit s'exécuter lors de la reussite de la comunication ajax
                    //     dataType: 'json' // Le format des données attendues.
                    // });
                });
            });
        </script>

    </div>
</body>
</html>
