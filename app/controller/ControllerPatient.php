<?php
require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';

class ControllerPatient {
    
    
    //Cette fonction assure l’affichage des informations sur le visiteur
  public static function viewMoncompte() {
     session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);
  
  
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
     
  $current = ModelPersonne::getOnePersonne($login);
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
    
}

?>