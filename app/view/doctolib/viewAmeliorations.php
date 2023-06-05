<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
    <?php
        require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
    ?>
    <main class="min-vh-100">
        <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h3>Amélioration du modèle MVC proposé en cours</h3>
        <ul>
            <li>Nous pourrions utiliser un ORM (Object-Relational Mapping) ce qui permettrait de manipuler les données en utilisant des objets et des requêtes orientées objet plutôt que des requêtes SQL directes.</li>
        </ul>

    </div>
    </main>
    
</body>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>