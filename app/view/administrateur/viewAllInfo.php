
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
      <h3>Liste des spécialités</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">label</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results             
          foreach ($results_spec as $element) {
           printf("<tr><td>%d</td><td>%s</td></tr>", $element->getId(), 
             $element->getLabel());
          }
          ?>
      </tbody>
    </table>
      
      
      <h3>Liste des praticiens</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite_id</th>
          
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results             
          foreach ($results_pra as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(), $element->getAdresse(), $element->getLogin(), $element->getPassword(), $element->getStatut(), $element->getSpecialite_id() );
          }
          ?>
      </tbody>
    </table>
      
      <h3>Liste des patients</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite_id</th>
          
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results             
          foreach ($results_pat as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(), $element->getAdresse(), $element->getLogin(), $element->getPassword(), $element->getStatut(), $element->getSpecialite_id() );
          }
          ?>
      </tbody>
    </table>
      
      <h3>Liste des administrateurs</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">login</th>
          <th scope = "col">password</th>
          <th scope = "col">statut</th>
          <th scope = "col">specialite_id</th>
          
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results             
          foreach ($results_admin as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%d</td></tr>", $element->getId(), 
             $element->getNom(), $element->getPrenom(), $element->getAdresse(), $element->getLogin(), $element->getPassword(), $element->getStatut(), $element->getSpecialite_id() );
          }
          ?>
      </tbody>
    </table>
      
      
        <h3>Liste de tous les rendez-vous</h3>
      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          
          <th scope = "col">patient_id</th>
          <th scope = "col">praticien_id</th>
          <th scope = "col">rdv_date</th>
          
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialiste est dans une variable $results             
          foreach ($results_rdv as $element) {
           printf("<tr><td>%d</td><td>%d</td><td>%d</td><td>%s</td></tr>", $element->getId(), 
             $element->getPatient_id(), $element->getPraticien_id(), $element->getRdv_date());
          }
           ?>
      </tbody>
    </table>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  