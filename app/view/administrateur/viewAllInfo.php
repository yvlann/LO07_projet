
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body style="background-color:#FDEBD0;">
    <div class="container">
        <?php
        require $root . '/app/view/fragment/fragmentDoctolibMenu.php';
        include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
        ?>
        <h3>Liste des spécialités</h3>
      
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <?php
                        $cols = $results_spec[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $results_spec[1];             
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
      
      
        <h3>Liste des praticiens</h3>
      
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <?php
                        $cols = $results_pra[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $results_pra[1];             
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
      
        <h3>Liste des patients</h3>
      
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <?php
                        $cols = $results_pat[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $results_pat[1];             
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
      
        <h3>Liste des administrateurs</h3>
      
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <?php
                        $cols = $results_admin[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $results_admin[1];             
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
      
      
        <h3>Liste de tous les rendez-vous</h3>
      
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <?php
                        $cols = $results_rdv[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $results_rdv[1];             
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

  <!-- ----- fin viewAll -->
  
  
  