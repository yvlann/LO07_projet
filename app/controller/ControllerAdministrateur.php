
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
     
  $current = ModelPersonne::getOnePersonne($login);
  $results = ModelSpecialite::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewAllSpecialite.php';
  if (DEBUG)
   echo ("ControllerVin : vinReadAll : vue = $vue");
  require ($vue);
 }
 
 
  public static function specialiteReadId() {
      session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);
  $results = ModelSpecialite::getAllId();
  

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewIdSpecialite.php';
  require ($vue);
 }

 // Affiche un specialite particulier (id)
 public static function specialiteReadOne() {
     session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);
  $vin_id = $_GET['id'];
  $results = ModelSpecialite::getOne($vin_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewAllSpecialite.php';
  require ($vue);
 }
 
 
 
  // Affiche le formulaire de creation d'un specialite
 public static function specialiteCreate() {
     session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);
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
     
  $current = ModelPersonne::getOnePersonne($login);
  // ajouter une validation des informations du formulaire
  $results = ModelSpecialite::insert(
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
     
  $current = ModelPersonne::getOnePersonne($login);
  $results = ModelPersonne::getAllPraticien();
  $results_spec = ModelSpecialite::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewAllPraticien.php';
  if (DEBUG)
   echo ("ControllerVin : vinReadAll : vue = $vue");
  require ($vue);
 }
 
 
  // --- Nombre de praticiens par patient
  public static function nombrePraticienParPatient() {
      session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);
  $results = ModelPersonne::getAllPatient();
  $results_num = ModelRDV::getPraticienNb();
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewNombrePraticien.php';
  if (DEBUG)
   echo ("ControllerVin : vinReadAll : vue = $vue");
  require ($vue);
 }
 
 
  public static function infoAll() {
      session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);
  $results_spec = ModelSpecialite::getAll();
  $results_pra = ModelPersonne::getAllPraticien();
  $results_pat = ModelPersonne::getAllPatient();
  $results_admin = ModelPersonne::getAllAdministrateur();
  $results_rdv = ModelRDV::getAllRdvOccupied();
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewAllInfo.php';
  if (DEBUG)
   echo ("ControllerVin : vinReadAll : vue = $vue");
  require ($vue);
 }
 

 
}
?>
<!-- ----- fin ControllerAdministrateur -->


