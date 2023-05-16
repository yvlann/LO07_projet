
<!-- ----- début viewAddDisponibilite -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
  <div class="container">
    <?php
      require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='disponibiliteAdded'>        
        <h5>rdv_date : </h5><input type="date" name="date_rdv" value="" min="2023-05-15" max="2024-12-31"><br/> 
        
        
        <h5>rdv_nombre : </h5><input type="text" name='nombre' size='30' value='5'> <br/> 
            
      </div>
        
        <p/>
        <br>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewAddDisponibilite -->



