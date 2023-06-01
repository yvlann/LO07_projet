
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
        <h3>Liste de mes rendez-vous</h3>
      
        <table class = "table table-striped table-bordered">
            <thead>
                <tr>
                    <?php
                        $cols = $results[0];
                        foreach ($cols as $col) {
                            echo ("<th scope='col'>$col</th>");
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $results[1];             
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
  
  
  