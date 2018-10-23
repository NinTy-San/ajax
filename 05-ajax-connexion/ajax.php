<?php
// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=connexion',
                                'root',
                                '',
                                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'));

// je prepare le tableau array qui contiendra la réponse
$tab = array();
$tab['validation'] = '';
$tab['message'] = '';

// on verifie si les indice dans post existe :
    if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];
        
        // $verif = $pdo->query("SELECT * FROM user WHERE pseudo = '$pseudo' AND mdp = '$mdp'");
        $verif = $pdo->prepare("SELECT * FROM user WHERE pseudo = :pseudo AND mdp = :mdp");
        
        $verif->bindParam(":pseudo", $pseudo, PDO::PARAM_STR);
        $verif->bindParam(":mdp", $mdp, PDO::PARAM_STR);
        $verif->execute();
        if($verif->rowCount() > 0){
            // S'il y a plus de 0 lignes, alors le pseudo et le mdp sont corrects.
            $tab['validation'] .= 'OK';

            $infos = $verif->fetch(PDO::FETCH_ASSOC);
            $tab['message'] .= '<div class="alert alert-success" role="alert">';

                foreach($infos as $indice => $valeur){
                    $tab['message'] .= '<b>' . $indice . ' : </b>' .$valeur. '<br>';
                }
        } else {
            // le psudo ou le mdp est faux ou les deux
            $tab['validation'] .= 'NOK';
            $tab['message'] .= '<div class="alert alert-danger" role="alert"> Attention, le pseudo et/ou le mot de passe sont incorrects<br> Veuillez vérifier vos saisies</div>';
    }

}

echo json_encode($tab);