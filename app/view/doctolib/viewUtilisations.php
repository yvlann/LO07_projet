<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
    <div class="container">
        <?php
        require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h3>Nombre de rendez-vous par spécialité et par ville</h3>
      
        <table class = "table table-striped table-bordered">
          <thead>
                <tr>
                    <?php
                        $cols = $results_spe[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
          <tbody>
                <?php
                    $data = $results_spe[1];             
                    foreach ($data as $row) {
                        echo ("<tr>");
                        foreach ($row as $val) {
                            echo ("<td>$val</td>");
                        }
                        echo ("</tr>");
                    }
                ?>
          </tbody>
        </table>
        
        <h3>Praticiens avec le plus de rendez-vous</h3>
        <table class = "table table-striped table-bordered">
          <thead>
                <tr>
                    <?php
                        $cols = $results_rank[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
          <tbody>
                <?php
                    $data = $results_rank[1];             
                    foreach ($data as $row) {
                        echo ("<tr>");
                        foreach ($row as $val) {
                            echo ("<td>$val</td>");
                        }
                        echo ("</tr>");
                    }
                ?>
          </tbody>
        </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>