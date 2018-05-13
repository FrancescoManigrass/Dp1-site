<?php
include "library.php";
//https();
secure_session_start();
https();
session_valida();
//session_start();
session_unset();
session_destroy();

header("location: ./login.php");
?>