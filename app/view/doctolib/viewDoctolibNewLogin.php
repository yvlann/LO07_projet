
<!-- ----- début viewAddedDisponibilite -->
<?php
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
  <div class="container">
    <?php
    require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($inserted) {
     echo ("<h3>Vous vous êtes inscrit avec succès </h3>");
     echo("<table class = \"table table-striped table-bordered\">");
     echo("<thead>");
     echo("<tr><th scope = \"col\">id</th><th scope = \"col\">Nom</th><th scope = \"col\">Prenom</th><th scope = \"col\">Adresse</th><th scope = \"col\">Login</th><th scope = \"col\">Password</th><th scope = \"col\">Statut</th><th scope = \"col\">Specialite_id</th></tr>");
     echo("</thead>");
     echo("<tbody>");
     
     
          // Les informations sont dans une variable $inserted             
          
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>", $inserted->getId(), 
             $inserted->getNom(), $inserted->getPrenom(), $inserted->getAdresse(), $inserted->getLogin(), $inserted->getPassword(), $inserted->getStatut(), $inserted->getSpecialite_id());
          
          
     
     echo("</tbody>");
     echo("</table>");
    } else {
     echo ("<h3>Problème d'inscription</h3>");
     
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewAddedDisponibilite -->    

    
    