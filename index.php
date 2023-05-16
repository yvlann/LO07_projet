<?php
session_start();
$_SESSION['login']="ventura";


header('Location: app/router/router1.php?action=truc');

?>

