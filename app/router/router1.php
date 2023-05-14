
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
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


 case "vinReadAll" :
 case "vinReadOne" :
 case "vinReadId" :
 case "vinCreate" :
 case "vinCreated" :
  ControllerPraticien::$action();
  break;

 case "producteurReadAll" :
 case "producteurReadOne" :
 case "producteurReadId" :
 case "producteurCreate" :
 case "producteurCreated" :
 case "producteurReadRegion" :
 case "producteurNombreRegion" :
  ControllerProducteur::$action();
  break;



 // Tache par défaut
 default:
  $action = "doctolibAccueil";
  ControllerDoctolib::$action();
}
?>
<!-- ----- Fin Router1 -->

