
<!-- ----- début specialiteInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
    <main  class="min-vh-100">
        <div class="container">
          <?php
            require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
            include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
          ?> 

          <form role="form" method='get' action='router1.php'>
            <div class="form-group">
              <input type="hidden" name='action' value='doctolibVerification'>
              <div class="col-sm-3">        
                  <label for="login">login </label>
              </div>
              <div class="col-sm-6">
                  <input type="text" name='login' size='30' value=''> <br/> <p>
              </div>
              <div class="col-sm-3">
                  <label for="password">password</label>
              </div>
              <div class="col-sm-6">
                  <input type="password" name='password' size='30' value=''><font color="#FF0000">Login ou password faux</font> <br/> 
              </div>
            </div>

              <p/>
              <br>
            <button class="btn btn-primary" type="submit">Go</button>
          </form>
          <p/>
        </div>
    </main>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin specialiteInsert -->



