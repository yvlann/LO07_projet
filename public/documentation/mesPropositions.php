 
<!-- ----- debut de la page cave_acceuil -->
<?php 
//dirname(dirname(__DIR__)) . "/";
include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentCaveHeader.html'; ?>
<body>
  <div class="container">
    <?php
    include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentCaveMenu.html';
    include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentCaveJumbotron.html';
    



    echo ("<ul>");
    echo ("<li>On peut utiliser le fonction 'getMany' dans les models pour afficher des attributs en général en changeant le parametre \$query</li>");
    echo ("<li></li>");
    echo ("</ul>");
    
    ?>
      
     
      
      
  </div>   
  
  
  <?php
  include dirname(dirname(__DIR__)) .'/app/view/fragment/fragmentCaveFooter.html';
  ?>

  <!-- ----- fin de la page cave_acceuil -->

</body>
</html>