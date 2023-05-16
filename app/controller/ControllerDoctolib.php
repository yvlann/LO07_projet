
<!-- ----- debut ControllerDoctolib -->
<?php

require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';

class ControllerDoctolib {
    
    
    
 // --- page d'acceuil
 public static function doctolibAccueil() {
     session_start();
     if($_SESSION['login']!="vide"){
         $login=$_SESSION['login'];
         $current = ModelPersonne::getOnePersonne($login);
     }
  
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
 
 //Deconnexion
  public static function doctolibDeconnexion() {
     session_start();
     $_SESSION['login']="vide";
     
  
  
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibDeconnexion : vue = $vue");
  require ($vue);
 }
 
 
  // --- page de Connexion
 public static function doctolibConnexion() {
     session_start();
     if($_SESSION['login']!="vide"){
         $login=$_SESSION['login'];
         $current = ModelPersonne::getOnePersonne($login);
     }
     
  
  include 'config.php';
  $vue = $root . '/app/view/doctolib/viewDoctolibConnecte.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
 
   // --- page de Connexion
 public static function doctolibConnexionWrong() {
     session_start();
     if($_SESSION['login']!="vide"){
         $login=$_SESSION['login'];
         $current = ModelPersonne::getOnePersonne($login);
     }
     
  
  include 'config.php';
  $vue = $root . '/app/view/doctolib/viewDoctolibConnecteWrong.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
 
 
 //verifier
  public static function doctolibVerification() {
     session_start();
     $result=ModelPersonne::verifierPersonne($_GET['login'],$_GET['password']);
     if($result!=null){
         $_SESSION['login']=$_GET['login'];
         
         $current = ModelPersonne::getOnePersonne($_SESSION['login']);
     }else{
          header('Location: router1.php?action=doctolibConnexionWrong');//tourner à wrongpage
        exit();
     }
     
  
  include 'config.php';
  $vue = $root . '/app/view/viewDoctolibAccueil.php';
  if (DEBUG)
   echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
  require ($vue);
 }
 

 
 //==================================================================================================
  public static function mesPropositions() {
  include 'config.php';
  $vue = $root . '/public/documentation/mesPropositions.php';
  if (DEBUG)
   echo ("ControllerDoctolib : caveAccueil : vue = $vue");
  require ($vue);
 }
 
}
 ?>
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

