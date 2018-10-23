<?php
// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=blog',
                                'root',
                                '',
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
                            ));

$tableau = array();
$tableau['message'] = '';

    if (!empty($_POST['mode'])){

        $mode = $_POST['mode'];

    }else{
        $mode ='';
    }
    
    if($mode == 'enregistrer'){
        // enregistrer des articles
        if(!empty($_POST['titre']) && !empty($_POST['categorie']) && !empty($_POST['contenu'])){
            $resultat = $pdo->prepare("INSERT INTO article (titre, categorie, contenu, date_enregistrement) VALUES (:titre, :categorie, :contenu, NOW()) ");

            $resultat->bindParam(":titre", $_POST['titre'], PDO::PARAM_STR); 
            $resultat->bindParam(":categorie", $_POST['categorie'], PDO::PARAM_STR); 
            $resultat->bindParam(":contenu", $_POST['contenu'], PDO::PARAM_STR); 
            $resultat->execute();

            $tableau['message'] = '<div class="alert alert-success"> Votre article a bien été enregistrer</div>';

        }

    } elseif ($mode == 'afficher'){
        // récupération des articles
        $liste = $pdo->query("SELECT titre, categorie, contenu, date_format(date_enregistrement, 'le %d/%m/%Y à %H:%i:%s') AS date_fr FROM article ORDER BY date_enregistrement DESC");

        $tableau['message'] .= '<div class="alert alert-info w-100"> Nombre d\'articles : '. $liste->rowCount() .'</div>';

        while($article_en_cours = $liste->fetch(PDO::FETCH_ASSOC)){
            $tableau['message'] .= '<div class="col-sm-12 mt-5">';
            $tableau['message'] .= '<h3 class="bg-dark text-white p-2">'. $article_en_cours['titre'] .'</h3>';
            $tableau['message'] .= '<hr>Ecrit'. $article_en_cours['date_fr'] .' - Catégorie: <a href="" class="filtre_categorie">'.$article_en_cours['categorie'] .'</a><hr>';
            $tableau['message'] .= '<p>'. $article_en_cours['contenu'] .'</p>';
            $tableau['message'] .= '</div>';
        }
    }

    echo json_encode($tableau);