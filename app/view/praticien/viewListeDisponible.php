
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
      <h3>Liste de mes disponibilités</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">N°</th>
          <th scope = "col">rdv_date</th>
          
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results
          $index=1;
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td></tr>", $index, 
             $element->getRdv_date());
           $index++;
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  