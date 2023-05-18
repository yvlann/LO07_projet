
<!-- ----- début specialiteInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
  <div class="container">
    <?php
      require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 
      <h5 class="text-danger">Formulaire d'inscription</h5>
      <h6 class="text-danger">              Login déjà existe</h6>
    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='doctolibInscriptionVerification'>
        <div class="row align-items-center">
        <div class="col-1">
          <label for="nom" class="col-form-label">nom：</label>
        </div>
        <div class="col-3">
          <input type="text" id="nom" name="nom" class="form-control">
        </div>
      </div>
        
         <p/>
      <div class="row align-items-center">
        <div class="col-1">
          <label for="prenom" class="col-form-label">prenom：</label>
        </div>
        <div class="col-3">
          <input type="text" id="prenom" name="prenom" class="form-control">
        </div>
      </div>
          <p/>
      <div class="row align-items-center">
        <div class="col-1">
          <label for="adresse" class="col-form-label">adresse：</label>
        </div>
        <div class="col-3">
          <input type="text" id="adresse" name="adresse" class="form-control">
        </div>
      </div>
           <p/>
      <div class="row align-items-center">
        <div class="col-1">
          <label for="login" class="col-form-label">login：</label>
        </div>
        <div class="col-2">
          <input type="text" id="login" name="login" class="form-control">
        </div>
      </div>
            <p/>
      <div class="row align-items-center">
        <div class="col-1">
          <label for="password" class="col-form-label">password：</label>
        </div>
        <div class="col-2">
          <input type="password" id="password" name="password" class="form-control">
        </div>
      </div>
            <p/>
            <p/>
      <label for="statut">Votre statut : </label> <select class="form-control" id='statut' name='statut' style="width: 400px">
            <option value=<?php echo ModelPersonne::ADMINISTRATEUR ?>>administrateur</option>
            <option value=<?php echo ModelPersonne::PRATICIEN ?>>praticien</option>
            <option value=<?php echo ModelPersonne::PATIENT ?>>patient</option>
        </select>
      <p/>
      <label for="specialite">Votre spécialité si vous être praticien : </label> <select class="form-control" id='specialite' name='specialite' style="width: 400px">
            <?php
            foreach ($specialite as $element) {
             echo ("<option value=".$element->getId().">".$element->getLabel()."</option>");
            }
            ?>
        </select>
      </div>
        
        <p/>
        <br>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin specialiteInsert -->



