 
<!-- ----- debut de la page cave_acceuil -->
<?php 
//dirname(dirname(__DIR__)) . "/";
include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentDoctolibHeader.html'; ?>
<body>
  <div class="container">
      
    <?php
    include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentDoctolibMenu.php';
    include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentDoctolibJumbotron.html';
    


    echo ("<h5>Proposez une amélioration du code MVC</h5>");
    echo ("<ul>");
    echo ("<li>On peut utiliser le fonction 'getMany' dans les models pour afficher des attributs en général en changeant le parametre \$query</li>");
    echo ("<li></li>");
    echo ("</ul>");
    
    ?>
      
     
      
      
  </div>   
  
  
  <?php
  include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentDoctolibFooter.html';
  ?>

  <!-- ----- fin de la page cave_acceuil -->

</body>
</html>