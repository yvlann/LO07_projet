
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
    if ($results) {
     echo ("<h3>La nouvelle spécialité a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du spécialité</h3>");
     echo ("label = " . $_GET['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentDoctolibFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    