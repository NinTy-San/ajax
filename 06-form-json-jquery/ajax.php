<?php
// json_encoded() - transforme un tableau array en format json
// json_encoded() - transforme un format json en tableau/objet ou array/array

$tab = array();
$tab['contenu'] = '';

if (!empty($_POST['choix'])) {
    $nom = $_POST['choix'];

    // on récupère le contenu du fichier json
    $fichier = file_get_contents('fichier.json');
    $json = json_decode($fichier, true);

    foreach ($json as $ligne) {
        if ($ligne['nom'] == $nom) {
            $tab['contenu'] .= '<table style="border-collapse:collapse; width:100%; margin:35px;" border="1">';
            $tab['contenu'] .= '<tr>';
            $tab['contenu'] .= '<td style="padding:10px">' . $ligne['nom'] . '</td>';
            $tab['contenu'] .= '<td style="padding:10px">' . $ligne['prenom'] . '</td>';
            $tab['contenu'] .= '<td style="padding:10px">' . $ligne['sexe'] . '</td>';
            $tab['contenu'] .= '<td style="padding:10px">' . $ligne['service'] . '</td>';
            $tab['contenu'] .= '<td style="padding:10px">' . $ligne['dateEmbauche'] . '</td>';
            $tab['contenu'] .= '<td style="padding:10px">' . $ligne['salaire'] . '</td>';
            $tab['contenu'] .= '<td style="padding:10px">' . $ligne['idEmploye'] . '</td>';
            $tab['contenu'] .= '</tr>';
            $tab['contenu'] .= '</table>';

        } // fin  if ($ligne['nom'] == $nom)

    } // fin foreach ($json as $ligne)
}
// on transform la variable tableau array en format json pour la réponse ajax
echo json_encode($tab);
