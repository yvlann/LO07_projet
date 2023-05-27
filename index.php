<?php
    session_start();
    $_SESSION['login']="vide"; //$_SESSION['login'] est vide avant tout, et le $_SESSION['login'] est le seul session pour identifier
    header('Location: app/router/router1.php?action=truc');


