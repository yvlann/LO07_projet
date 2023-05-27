
<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';

class ControllerAdministrateur {
    // --- Liste des specialite
    public static function specialiteReadAll() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results = ModelSpecialite::getAll(); //$results sont touts les instances ModelSpecialite
        
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllSpecialite.php';
        if (DEBUG) {
            echo ("ControllerVin : vinReadAll : vue = $vue");
        }
        require ($vue);
    }
 
    //liste des id spécialité
    public static function specialiteReadId() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results = ModelSpecialite::getAllId(); //$results sont touts les ids ModelSpecialite
  
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewIdSpecialite.php';
        require ($vue);
    }

    // Affiche un specialite 
    public static function specialiteReadOne() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $vin_id = $_GET['id'];
        $results = ModelSpecialite::getOne($vin_id); //$results est une instance ModelSpecialite id=$vin_id

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllSpecialite.php';
        require ($vue);
    }
 
    // Affiche le formulaire de creation d'un specialite
    public static function specialiteCreate() {
        session_start();
        $login=$_SESSION['login'];

        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/specialiteInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'un nouveau specialite.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function specialiteCreated() {
        session_start();
        $login=$_SESSION['login'];

        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        // ajouter une validation des informations du formulaire
        $results = ModelSpecialite::insert(  //$results est NULL ou id
            htmlspecialchars($_GET['label'])
        );
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/specialiteInserted.php';
        require ($vue);
    }
 
    // --- Liste des praticiens avec leur spécialité 
    public static function praticienReadAll() {
        session_start();
        $login=$_SESSION['login'];

        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results = ModelPersonne::getAllPraticien();  //$results sont touts les instances ModelPersonne dont statut=1
        $results_spec = ModelSpecialite::getAll(); //$results_spec sont touts les instances ModelSpecialite
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllPraticien.php';
        if (DEBUG) {
            echo ("ControllerVin : vinReadAll : vue = $vue");
        }
        require ($vue);
    }
 
    // --- Nombre de praticiens par patient
    public static function nombrePraticienParPatient() {
        session_start();
        $login=$_SESSION['login'];

        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results = ModelPersonne::getAllPatient(); //$results sont touts les instances ModelPersonne dont statut=2
        $results_num = ModelRDV::getPraticienNb(); //$results_num est une hashliste signifie chaque patient a combien de praticiens

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewNombrePraticien.php';
        if (DEBUG) {
            echo ("ControllerVin : vinReadAll : vue = $vue");
        }
        require ($vue);
   }
 
 //affichier tous les infos
    public static function infoAll() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results_spec = ModelSpecialite::getAll();
        $results_pra = ModelPersonne::getAllPraticien();
        $results_pat = ModelPersonne::getAllPatient();
        $results_admin = ModelPersonne::getAllAdministrateur();
        $results_rdv = ModelRDV::getAllRdvOccupied();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllInfo.php';
        if (DEBUG) {
            echo ("ControllerVin : vinReadAll : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerAdministrateur -->


