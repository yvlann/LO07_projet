
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <?php
    
    //$current = ModelPersonne::getOnePersonne("pare");
    //$current = ControllerDoctolib::getOnePersonne($_SESSION['login']);
    /*session_start();
     $login=$_SESSION['login'];
     
  $current = ModelPersonne::getOnePersonne($login);*/
    
    
    if($_SESSION['login']==="vide"){
        echo("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU |</a>");
    } else{
        $status = array(
            ModelPersonne::ADMINISTRATEUR => "administrateur | ",
            ModelPersonne::PRATICIEN => "praticien | ",
            ModelPersonne::PATIENT => "patient | "
        );
        
        try {
            echo ("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU | ". $status[$current->getStatut()] .$current->getPrenom(). " ".$current->getNom() ." |");
        } catch (Exception $ex) {
            echo("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU |</a>");
        }
    }
    
    
    ?>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
    <?php
    if($_SESSION['login']!="vide"&&$current->getStatut()==ModelPersonne::ADMINISTRATEUR){
        echo("<li class=\"nav-item dropdown\">");
        echo("<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">administrateur</a>");
        echo("<ul class=\"dropdown-menu\">");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=specialiteReadAll\">Liste des spécialités</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=specialiteReadId\">Sélection d'une spécialité par son id</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=specialiteCreate\">Insertion d'une nouvelle spécialité</a></li>");
        echo("<li role=\"separator\" class=\"dropdown-divider\"></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=praticienReadAll\">Liste des praticiens avec leur spécialité</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=nombrePraticienParPatient\">Nombre de praticiens par patient</a></li>");
        echo("<li role=\"separator\" class=\"dropdown-divider\"></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=infoAll\">Info</a></li>");
        echo("</ul>");
        echo("</li>");
    }elseif ($_SESSION['login']!="vide"&&$current->getStatut()==ModelPersonne::PRATICIEN) {
        echo("<li class=\"nav-item dropdown\">");
        echo("<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">praticien</a>");
        echo("<ul class=\"dropdown-menu\">");
        
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=viewDisponibilite\">Liste de mes disponibilités</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=disponibiliteAdd\">Ajout de nouvelles disponibilités</a></li>");
        echo("<li role=\"separator\" class=\"dropdown-divider\"></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=viewRdvPatients\">Liste des rendez-vous avec le nom des patients</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=viewMesPatients\">Nombre de mes patients(sans doublon)</a></li>");
        
        echo("</ul>");
        echo("</li>");
    }elseif ($_SESSION['login']!="vide"&&$current->getStatut()==ModelPersonne::PATIENT) {
        echo("<li class=\"nav-item dropdown\">");
        echo("<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">patient</a>");
        echo("<ul class=\"dropdown-menu\">");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=viewMoncompte\">MonCompte</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=viewRdv\">Liste de mes rendez-vous</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"router1.php?action=reserveReadPraticien\">Prendre un RDV avec un praticien</a></li>");
        
        echo("</ul>");
        echo("</li>");
              
    }else {
              
          }
    
    ?>

        
          
          
            
            
                      
        

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=mesUtilisations">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router1.php?action=mesAmeliorations">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=doctolibConnexion">Login</a></li>
            <li><a class="dropdown-item" href="router1.php?action=doctolibInscription">s'inscrire</a></li>
            <li><a class="dropdown-item" href="router1.php?action=doctolibDeconnexion">deconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->

