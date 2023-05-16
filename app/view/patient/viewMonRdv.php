
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
  <div class="container">
      <?php
      require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      
      
      ?>
      <h3>Liste de mes rendez-vous</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">rdv_date</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results             
          foreach ($results as $element) {
              $date=$element->getRdv_date();
           printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",  
             $persons[$date]->getNom(), $persons[$date]->getPrenom(), $element->getRdv_date());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  