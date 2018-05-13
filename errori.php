<?php
include 'library.php';

secure_session_start(); // la nostra funzione per avviare una sessione php sicura
session_valida();
$conn = dbConnect("aste");
foreach($_COOKIE as $amico)
{
	echo $amico . "<br/>";
}

?>