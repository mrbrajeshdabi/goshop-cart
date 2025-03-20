<?php

session_start();

$_SESSION['_aut_ui_'];
session_destroy();
header("Location:login.php");

?>