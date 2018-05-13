<?php

include "library.php";
secure_session_start();
$conn=dbConnect("$db");
session_valida();
setcookie("errore","");

if(isset($_SESSION['email2'])){
	header("location: ./loginfatto.php");
}else if (isset($_POST['email2']) && isset($_POST['password2']) && !empty($_POST['email2']) && !empty($_POST['password2'])) {
	// L'utente ha appena fatto il login

	if (!utentevalido($_POST["email2"], $_POST["password2"],$conn)){

		setcookie("errore","si",time()+3600);
		header("location: ./login.php");

	}else{
		//alert("login fatto");
		echo("email e password corretti ") ;
		setcookie("errore"," user e password corretti",time()+3600);
		header("location:./loginfatto.php");
			
	}
}
?>