<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
    <div class="container">
        <?php
        require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h3>Amélioration du modèle MVC proposé en cours</h3>
        <ul>
            <li>Plutot que de créer des vues séparer pour chaque requête SELECT, nous pouvons simplement créer une seule vue et lui passer en plus du résultat de la requête le titre.</li>
            <li>Nous pourrions utiliser un ORM (Object-Relational Mapping) ce qui permettrait de manipuler les données en utilisant des objets et des requêtes orientées objet plutôt que des requêtes SQL directes.</li>
        </ul>

    </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>