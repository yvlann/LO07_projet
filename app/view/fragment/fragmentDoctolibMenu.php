
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
  <div class="container-fluid">
    <?php
    
    
    
    
    //$current = ModelPersonne::getOnePersonne("pare");
    //$current = ControllerDoctolib::getOnePersonne($_SESSION['login']);
    
    if($_SESSION['login']==="vide"){
        echo("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU|||</a>");
    
    }else{
        
        switch ($current->getStatut()) {
    
        case ModelPersonne::ADMINISTRATEUR :
            echo("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU|administrateur|".$current->getPrenom()." ".$current->getNom()."|</a>");
            break;
        case ModelPersonne::PRATICIEN :
            echo("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU|administrateur|".$current->getPrenom()." ".$current->getNom()."|</a>");
            break;
        case ModelPersonne::PATIENT :
            echo("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU|praticien|".$current->getPrenom()." ".$current->getNom()."|</a>");
            break;
        
            
        default :
            echo("<a class=\"navbar-brand\" href=\"router1.php?action=DoctolibAccueil\">BOULET-XU|||</a>");
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
    
    
    //menu admin
    if($current->getStatut()===ModelPersonne::ADMINISTRATEUR){
    
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
        
        
        
        //menu praticien
    }elseif ($current->getStatut()===ModelPersonne::PRATICIEN) {
        
        echo("<li class=\"nav-item dropdown\">");
        echo("<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">praticien</a>");
        echo("<ul class=\"dropdown-menu\">");
        
        echo("<li><a class=\"dropdown-item\" href=\"\">Liste de mes disponibilités</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"\">Ajout de nouvelles disponibilités</a></li>");
        echo("<li role=\"separator\" class=\"dropdown-divider\"></li>");
        echo("<li><a class=\"dropdown-item\" href=\"\">Liste des rendez-vous avec le nom des patients</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"\">Nombre de mes patients(sans doublon)</a></li>");
        
        echo("</ul>");
        echo("</li>");
              
        
        //menu patient
    }elseif ($current->getStatut()===ModelPersonne::PATIENT) {
        
        echo("<li class=\"nav-item dropdown\">");
        echo("<a class=\"nav-link dropdown-toggle\" role=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\">patient</a>");
        echo("<ul class=\"dropdown-menu\">");
        echo("<li><a class=\"dropdown-item\" href=\"\">MonCompte</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"\">Liste de mes rendez-vous</a></li>");
        echo("<li><a class=\"dropdown-item\" href=\"\">Prendre un RDV avec un praticien</a></li>");
        
        echo("</ul>");
        echo("</li>");
              
    }else {
              
          }
    
    ?>

        
          
          
            
            
                      
        

        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=mesPropositions">Proposez une fonctionnalité originale</a></li>
            <li><a class="dropdown-item" href="router1.php?action=mesPropositions">Proposez une amélioration du code MVC</a></li>
          </ul>
        </li>
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=mesPropositions">Login</a></li>
            <li><a class="dropdown-item" href="router1.php?action=mesPropositions">s'inscrire</a></li>
            <li><a class="dropdown-item" href="router1.php?action=mesPropositions">deconnexion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->

