<?php
include 'library.php';
secure_session_start();  // la nostra funzione per avviare una sessione php sicura
$conn=dbConnect("s243887");
session_valida();

if(mysqli_connect_errno())
	die("Errore nella connessione al db: ".mysqli_connect_error());


if(isset($_POST['email'], $_POST['password'], $_POST['password2'])) {
	echo("post2");
	$email = $_POST['email'];
	$password1 = $_POST['password'];
	$password2 = $_POST['password2'];
	
	
	$dimemail=strlen($email);
	$dimpassword1=strlen($password1);
	$dimpassword2=strlen($password2);
	// controlliamo che i campi non sono vuoti
	
	if ($dimemail<50 && $dimpassword1<128 &&
			$dimpassword2<128 )
	{
		echo("ciao");
		if (
				$email == TRUE && 
				$password1 == TRUE && 
				$password2 == TRUE )
		{
			echo("ciao2");
			// controlliamo se i campi sono stati scritti correttamente
			$mail1 = preg_match("/^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/",$email); 
			
			$mail2=preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email);
			
			$controllopassword1= preg_match("/[^a-zA-Z0-9]*$/",$password1);
		
			$controllopassword2= preg_match("/[^a-zA-Z0-9]*$/",$password2);
			
			$controllocarattere=preg_match("/[a-zA-Z]*$/", $password1);
			
			$controllonumero=preg_match("/[0-9]*$/",$password1);
			
			
			
			$password1=nl2br(htmlentities($password1));
			$password1=mysqli_real_escape_string($conn,$password1);
			$password2=nl2br(htmlentities($password2));
			$password2=mysqli_real_escape_string($conn,$password2);
			
			
			
			$mail=filter_var($email, FILTER_VALIDATE_EMAIL);
			$assword1=filter_var($password1, FILTER_SANITIZE_STRING);
			$assword2=filter_var($password2, FILTER_SANITIZE_STRING);
			
			if ( $controllocarattere== TRUE && $controllonumero== TRUE ) {
			setcookie("errore","CONTROLLO 2");
			
			echo("ciao5");			
			
				if ( $mail1 == TRUE && $mail2==TRUE) {
		// controlliamo se l'mail è presente già nel database
		            echo("email == true");		            
					$sql = "SELECT * FROM `utenti` WHERE email = '$email'";
					echo("controllo2 ok");
				
					$link=interrogazioneatomica($conn,$sql);
					
				    if(!$link) 
						die ("Mail già occupata");
				    
				    if ((mysqli_num_rows($link)) >0) {
				    	$errore= "gia presente una riga nel nostro sistema";
				    	setcookie("errore_php",$errore);
				    	setcookie("errore","si");
				    	header("location: ./registrazione.php");
				    	
				    }
					setcookie("errore","CONTROLLO3");
					
				
					
					if ($assword1 == TRUE && $assword2== TRUE && $controllopassword1==TRUE && $controllopassword2==TRUE ) {
						if ( (mysqli_num_rows($link)) == 0  ) {
			// controlliamo che le password siano identiche
							if ( $password1 == $password2 ) {
			// criptiamo la password con md5
								
								$pass_md5 = md5($password1);
								$pass_sha1 = sha1($password1);
								$comando3="INSERT INTO `utenti`( email , password)
									VALUES 
									( '$email', '$pass_sha1' )";
								$link3=interrogazioneatomica($conn,$comando3);
								if(link3==false){
										die(mysql_error());
								}								
								echo $email.": ";
			// mandiamo una mail con la riuscita registazione
			// mail ($mail, "Registrazione OK", "Complimenti registrazione effettuata con successo", "From: tuamail@host.formato");
								
								echo " Registrazione effettuata con successo.";
								$_SESSION["email"]=$email;
								$_SESSION["time"]=time();
								setcookie("errore","1");
								header("location:./home.php");
							} else {
								$errore= " Le password non corrispondono";
								setcookie("errore_php",$errore);
								setcookie("errore","2");
								header("location: ./registrazione.php");
								
							}
				
						} else {
							$errore= " Indirizzo email già utilizzato.";
							setcookie("errore_php",$errore);
							setcookie("errore","email_error");
							header("location: ./registrazione.php");
						}
						
					}else{
						$errore= "le password non possono contenere espressioni regolari";
						setcookie("errore_php",$errore);
						setcookie("errore","4");
						header("location: ./registrazione.php");
						
						
					}
					
					
					 
				} else {
					$errore= "La tua email non è scritta correttamente, per la registrazione.";
					setcookie("errore_php",$errore);
					setcookie("errore","email_error");
					header("location: ./registrazione.php");
				}
			} else {
				$errore= "Il campo nome o cognome non è scritto correttamente.";
				setcookie("errore_php",$errore);
				setcookie("errore","6");
				header("location: ./registrazione.php");
			}
		} else {
			$errore= "Tutti i campi sono obbligatori.";
			setcookie("errore_php",$errore);
			setcookie("errore","7");
			header("location: ./registrazione.php");
		}
	} else {
		$errore= "un campo inserito ha superato il limite max di dimensione";
		setcookie("errore_php",$errore);
		setcookie("errore","8");
		header("location: ./registrazione.php");
	}
} else {
	$errore=  "registration.php: richiesta non valida";
	setcookie("errore_php",$errore);
	setcookie("errore","9");
	header("location: ./registrazione.php");
}
?>