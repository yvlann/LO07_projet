<!-- ----- debut ControllerPatient -->



<?php
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';

class ControllerPatient {
    
    
    //Cette fonction assure l’affichage des informations sur le visiteur
  public static function viewMoncompte() {
     session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
  
  
  include 'config.php';
  $vue = $root . '/app/view/patient/viewMonCompte.php';
  if (DEBUG)
   echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
  require ($vue);
 }
 
 //Liste de mes rendez-vous
   public static function viewRdv() {
     session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
  $results=ModelRDV::getPatientRdv($current->getId());
  $persons=array();
  foreach ($results as $patientRdv) {
      $index=$patientRdv->getPraticien_id();
      $rdv_date=$patientRdv->getRdv_date();
      $persons[$rdv_date]=ModelPersonne::getOnePersonneId($index);
  }
  
  include 'config.php';
  $vue = $root . '/app/view/patient/viewMonRdv.php';
  if (DEBUG)
   echo ("ControllerPraticien : viewDisponibilite : vue = $vue");
  require ($vue);
 }
 
 //Affiche un premier formulaire avec la liste des praticiens
   public static function reserveReadPraticien() {
      session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
  $disponible_id = ModelRDV::getDisponibiliteId();//get disponible praticien_id
  $personnes=array();
  foreach ($disponible_id as $element) {
      $personnes[$element]=ModelPersonne::getOnePersonneId($element);
  }

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewPraticien.php';
  require ($vue);
 }
 
 //Affiche un seconde formulaire avec la liste des seances
    public static function reserveReadSceance() {
      session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
  
  $seance=ModelRDV::getDisponibilite($_GET['id']);
  

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewSceance.php';
  require ($vue);
 }
 
 //Affiche un formulaire si avec succes
     public static function reserveSuccess() {
      session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
  
  $seance=ModelRDV::updateRdv($_GET['id'],$current->getId());
  

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patient/viewUpdateSuccess.php';
  require ($vue);
 }
    
}

?>


<!-- ----- fin ControllerPatient -->
