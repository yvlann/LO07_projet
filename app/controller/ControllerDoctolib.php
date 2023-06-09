
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
            $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        }  
  
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
 
    //Deconnexion
    public static function doctolibDeconnexion() {
        session_start();
        $_SESSION['login']="vide";

        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibDeconnexion : vue = $vue");
        }
        require ($vue);
    }
 
    // --- page de Connexion
    public static function doctolibConnexion() {
        session_start();
        if($_SESSION['login']!="vide"){
            $login=$_SESSION['login'];
            $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        }
     
        include 'config.php';
        $vue = $root . '/app/view/doctolib/viewDoctolibConnecte.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
 
    // --- page de Connexion wrong
    public static function doctolibConnexionWrong() {
        session_start();
        if($_SESSION['login']!="vide"){
            $login=$_SESSION['login'];
            $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        }
  
        include 'config.php';
        $vue = $root . '/app/view/doctolib/viewDoctolibConnecteWrong.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
    }
 
    //verifier
    public static function doctolibVerification() {
        session_start();
        $result=ModelPersonne::verifierPersonne($_GET['login'],$_GET['password']);
        if($result!=null){
            $_SESSION['login']=$_GET['login'];
            $current = ModelPersonne::getOnePersonne($_SESSION['login']); //$current est instance de ModelPersonne de current login
        } else{
             header('Location: router1.php?action=doctolibConnexionWrong');//tourner à wrongpage
           exit();
        }
  
        include 'config.php';
        $vue = $root . '/app/view/viewDoctolibAccueil.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
      }
 
    // --- page de s'inscrire
    public static function doctolibInscription() {
        session_start();
        if($_SESSION['login']!="vide"){
            $login=$_SESSION['login'];
            $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        }
        $specialite=ModelSpecialite::getAll();
       
  
        include 'config.php';
        $vue = $root . '/app/view/doctolib/viewDoctolibInscription.php';
        
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibAccueil : vue = $vue");
        }
        require ($vue);
        
    }
 
    //verifier si login est valide
    public static function doctolibInscriptionVerification() {
        session_start();
        if($_SESSION['login']!="vide"){
            $login=$_SESSION['login'];
            $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        }
        $existe=ModelPersonne::verifierPersonneExiste($_GET['login']);
        include 'config.php';
        if(NULL==$existe && isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['adresse']) && isset($_GET['login']) && isset($_GET['password'])){
            $id = ModelPersonne::insertPersonne($_GET['nom'], $_GET['prenom'], $_GET['adresse'], $_GET['login'], $_GET['password'], $_GET['statut'], $_GET['specialite']);
            $inserted = ModelPersonne::getOnePersonneId($id);

            $vue = $root . '/app/view/doctolib/viewDoctolibNewLogin.php';
        }else{
            $specialite=ModelSpecialite::getAll();
            $vue = $root . '/app/view/doctolib/viewDoctolibInscriptionWrong.php';
        }
     
        if (DEBUG) {
            echo ("ControllerDoctolib : doctolibInscriptionVerification : vue = $vue");
        }
        require ($vue);
    }
 
    public static function mesUtilisations() {
        session_start();
        $login=$_SESSION['login'];
        $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        
        $results_spe = ModelSpecialite::getSpecialiteNRDVVille();
        $results_rank = ModelSpecialite::getPraticienRankRDV();
        
        include 'config.php';
        $vue = $root . '/app/view/doctolib/viewUtilisations.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : viewUtilisations : vue = $vue");
        }
        require ($vue);
    }
 
    public static function mesAmeliorations() {
        session_start();
        if($_SESSION['login']!="vide"){
            $login=$_SESSION['login'];
            $current = ModelPersonne::getOnePersonne($login); //$current est instance de ModelPersonne de current login
        }
        include 'config.php';
        $vue = $root . '/app/view/doctolib/viewAmeliorations.php';
        if (DEBUG) {
            echo ("ControllerDoctolib : viewAmeliorations : vue = $vue");
        }
        require ($vue);
    }
}
?>

