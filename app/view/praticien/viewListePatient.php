
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
      <h3>Liste de mes patients</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results             
          foreach ($persons as $element) {
              
           printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",  
             $element->getNom(), $element->getPrenom(), $element->getAdresse());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  