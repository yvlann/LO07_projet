
<!-- ----- debut ControllerDoctolib -->
<?php

require_once '../model/ModelSpecialite.php';
require_once '../model/ModelPersonne.php';
require_once '../model/ModelRDV.php';

class ControllerDoctolib {
    
    
    
 // --- page d'acceuil
 public static function doctolibAccueil() {
     session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);
  
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

