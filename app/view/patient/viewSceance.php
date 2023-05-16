
<!-- ----- début viewId -->
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
  <div class="container">
      <?php
      require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>
      
      <h3>Sélection d’une séance</h3>

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='reserveSuccess'>
        <label for="id">Séance : </label> <select class="form-control" name='id' style="width: 500px">
            <?php
            foreach ($seance as $periode) {
             echo ("<option value=".$periode->getId().">".$periode->getRdv_date()."</option>");
            }
            ?>
        </select>
      </div>
      <p/><br/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewId -->