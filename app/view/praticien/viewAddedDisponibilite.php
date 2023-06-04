
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
    if ($results) {
     echo ("<h3>Les nouvelles disponibilités ont été ajouté </h3>");
     echo("<table class = \"table table-striped table-bordered\">");
     echo("<thead>");
     echo("<tr><th scope = \"col\">id</th><th scope = \"col\">patient_id</th><th scope = \"col\">praticien_id</th><th scope = \"col\">rdv_date</th></tr>");
     echo("</thead>");
     echo("<tbody>");
     
     
          // La liste des disponibilités est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%d</td><td>%d</td><td>%s</td></tr>", $element->getId(), 
             $element->getPatient_id(), $element->getPraticien_id(), $element->getRdv_date());
          }
          
     
     echo("</tbody>");
     echo("</table>");
    } else {
     echo ("<h3>Problème d'insertion du disponibilité</h3>");
     
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewAddedDisponibilite -->    

    
    