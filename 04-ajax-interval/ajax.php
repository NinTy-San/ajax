<?php
// connexion BDD
$pdo = new PDO(
    'mysql:host=localhost;dbname=employees',
    'root',
    '',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8 '));

// query
// SELECT datre_format(birth_date, '%d/%m%Y') FROM employees)
$query = "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 100";
$listeEmployes = $pdo->query($query);

$tab = array();
$tab['nombre'] = '<div><h2> Nombre d\'employés : ' . $listeEmployes->rowCount() . '</h2><hr></div>';
$tab['contenu'] = '';

while ($emplye = $listeEmployes->fetch(PDO::FETCH_ASSOC)) {

    $tab['contenu'] .= '<div class="block">';
    foreach ($emplye as $indice => $valeur) {

        if ($indice == 'gender') {

            $tab['contenu'] .= ($valeur == 'M') ? 'Sexe: Masculin <br>' : 'Sexe: Feminin<br>';

        } elseif ($indice == 'birth_date' || $indice == 'hire_date') {

            $dateFormat = new dateTime($valeur);
            $tab['contenu'] .= ucfirst($indice) . ': ' . $dateFormat->format('d/m/Y') . '<br>';
        } else {

            $tab['contenu'] .= ucfirst($indice) . ': ' . $valeur . '<br>';
        }
    }
    $tab['contenu'] .= '</div>';
} // fin while ($emplye = $listeEmployes->fetch(PDO::FETCH_ASSOC)
echo json_encode($tab);
