
<!-- ----- début viewInserted -->
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
    if ($seance) {
     echo ("<h3>Vous avez réservé avec succès </h3>");
     echo("<ul>");
     echo ("<li>RDV  " . $seance->getRdv_date() . "</li>");
    
     
     echo("</ul>");
    } else {
     echo ("<h3>Problème de réservation du RDV</h3>");
     echo ("id = " . $seance->getId());
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    