
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerPraticien.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerDoctolib.php');
require ('../controller/ControllerAdministrateur.php');
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];


// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
    case "specialiteReadAll" :
    case "specialiteReadOne" :
    case "specialiteReadId" :
    case "specialiteCreate" :
    case "specialiteCreated" :
    case "praticienReadAll" :
    case "nombrePraticienParPatient" :
    case "infoAll" :
        ControllerAdministrateur::$action();
        break;

    case "viewDisponibilite" :
    case "disponibiliteAdd" :
    case "disponibiliteAdded" :
    case "disponibiliteAddWrong" :
    case "viewRdvPatients" :
    case "viewMesPatients" :
        ControllerPraticien::$action();
        break;

    case "viewMoncompte" :
    case "viewRdv" :
    case "reserveReadPraticien" :
    case "reserveReadSceance" :
    case "reserveSuccess" :
        ControllerPatient::$action();
        break;

    case "doctolibDeconnexion" :
    case "doctolibVerification" :
    case "doctolibConnexion" :
    case "doctolibConnexionWrong" :
    case "doctolibInscription" :
    case "doctolibInscriptionVerification" :
    case "mesUtilisations" :
    case "mesAmeliorations" :
        ControllerDoctolib::$action();
        break;

    default:
        $action = "doctolibAccueil";
        ControllerDoctolib::$action();
}
?>
<!-- ----- Fin Router1 -->

