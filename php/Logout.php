<?php
session_start();
session_unset();
session_destroy();
$loggedin = false;
header('Location: index.php');
?>