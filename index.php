<?php
session_start();
$_SESSION['login']="pare";


header('Location: app/router/router1.php?action=truc');

?>

