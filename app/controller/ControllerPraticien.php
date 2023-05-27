
<!-- ----- debut ControllerPraticien -->

<?php
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';

class ControllerPraticien {
    // Liste de mes disponibilités   
    public static function viewDisponibilite() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results=ModelRDV::getDisponibilite($current->getId());

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListeDisponible.php';
        if (DEBUG) {
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        }
        require ($vue);
    }
 
    //Ajout de nouvelles disponibilités
    public static function disponibiliteAdd() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAddDisponibilite.php';
        require ($vue);
    }

    //si le date déjà existe
    public static function disponibiliteAddWrong() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAddDisponibiliteWrong.php';
        require ($vue);
    }
 
 
    // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function disponibiliteAdded() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $pid=$current->getId();
        $date_rdv=$_GET['date_rdv'];
        $nombre=$_GET['nombre'];
        $check=ModelRDV::checkDisponibilite($date_rdv,$pid);
  
        if($check||$nombre>14){//de 10h à 23h il y a 14 sceance
            header('Location: router1.php?action=disponibiliteAddWrong');//tourner à wrongpage
            exit();
        }

        // ajouter une validation des informations du formulaire
        $results=array();
        for($i=0;$i<$nombre;$i++){
            $date_rdv_aj=$date_rdv." à ".($i+10)."h00";
            $results[$i]=ModelRDV::insertDisponibilite(0,$current->getId(),$date_rdv_aj);
        }
        for($i=0;$i<$nombre;$i++){
            $results[$i]=ModelRDV::getRdv($results[$i]);
        }
  
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAddedDisponibilite.php';
        require ($vue);
    }
 
    //Liste de mes rendez-vous avec le nom des patients  
    public static function viewRdvPatients() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results=ModelRDV::getMesRdv($current->getId());
        $persons=array();

        //trouver tous mes RDV
        foreach ($results as $patientRdv) {
            $index=$patientRdv->getPatient_id();
            $rdv_date=$patientRdv->getRdv_date();
            $persons[$rdv_date]=ModelPersonne::getOnePersonneId($index);
        }

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListePatientRdv.php';
        if (DEBUG) {
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        }
        require ($vue);
    }
 
    //Liste de mes patients sans doublon
    public static function viewMesPatients() {
        session_start();
        $login=$_SESSION['login'];
     
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        $results=ModelRDV::getMesRdv($current->getId());
        $persons=array();
        foreach ($results as $patientRdv) {
            $index=$patientRdv->getPatient_id();

            $persons[$index]=ModelPersonne::getOnePersonneId($index);
        }

        include 'config.php';
        $vue = $root . '/app/view/praticien/viewListePatient.php';
        if (DEBUG) {
            echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
        }
        require ($vue);
    }
}


?>
<!-- ----- fin ControllerPraticien -->


