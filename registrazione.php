<?php 
include 'library.php';

secure_session_start(); // la nostra funzione per avviare una sessione php sicura
https();
session_valida();
$conn = dbConnect("aste");


//$db_selected = mysqli_select_db($conn,"s243887");
//if(!$db_selected)
//	die ("Non si puo' usare il database: " . mysql_errno() );
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html lang="it">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<TITLE> LOGIN </TITLE> <!--indica solo un titolo della pagina che non viene visualizzat-->
		<script type="text/javascript">
		
		</script>
	<link href="StyleSheet.css" rel="stylesheet" type="text/css">
	 <script src="JavaScript.js"></script>
</head>
<body>

	 	<div class = "header"><h2>Welcome to the auction site</h2>
		</div>
		<h1> PAGE FOR REGISTRATION</h1>
<h2> PLEASE INSERT THE DATA REQUIRED</h2>
	<noscript>
			Sorry, you must activate javascript for navigation
	</noscript>
	<script>
cookie(); 
</script>  

<noscript>
  <h2> THE PAGE IS NOT COOKIE ACTIVATED, PLEASE ACTIVATE TO CONTINUE THE NAVIGATONE</h2>
 
  </noscript>
	
	
	<div class="vertical-menu">


<a href="./home.php">home</a>
  <p>
  <a href="./login.php" >login</a>
  <p>
   
   <a href="./registrazione.php" >Registrazione</a>
   <p>
          <p>
     <a href="./thr.php" >imposta thr</a>
   
    
</div>
 <form  id="myForm" action="./registrazionesql.php" method="POST" >
  <div class="imgcontainer">
     <img src="images.jpg" alt="Avatar" class="avatar">
  </div>
  
<div class="container">

    <span style="color:red" name="login_failed" id="login_failed" ></span>  
   
    <p> <label><b>Selecting your email for the website </b></label>
    <input type="text"  id='email'  name='email' placeholder="email" maxlength="50"  onchange="checkemail();"required>
    <p>
     <span id = 'email_error' style = "color: red;"></span>
     <script>
     var nome=getCookie("errore");
      if(nome== "email_error"){      
    	  document.getElementById("email_error").innerHTML = "<br\>email not valid <br\>";
        nome="56666";
    }
      </script>
        

    <label><b>Selecting you password for the website</b></label>
    <input type="password" id ='password' placeholder="password" name ='password' maxlength="128"    required>
     <span id = 'password_error' style = "color: red;"></span>
     <script>
       if(nome== "4" ||nome=="2"  ){
      // alert("cuai");
      
    	  document.getElementById("password_error").innerHTML = "<br\> not valid password <br\>";
        
    }
       </script>
    
    <label><b>Repeat the password</b></label>
    <input type="password" id ='password2' placeholder="password" name ='password2' maxlength="128"  onchange="checkPassword();"
			      required>

   <button type="button"  onClick="verifica()" >Complete the registration</button>
    
    <button type="reset" class="cancelbtn">Cancel</button>
  </div>

 <div class="container" style="background-color:#f1f1f1"> 
   
  <div id="footer">
		<small>
	Autore: <a href="mailto:francesco.manigrasso@outlook.it">Francesco Manigrasso</a> 
		</small>
	</div>

</div>
</form>
<script>


//var nome = getCookie('errore_php');

 // alert("cuai");
 
//	document.getElementById("login_failed").innerHTML = nome;
   
//}

</script>

  
		
	
	
<?php

/*if( (isset($_POST['username'], $_POST['password'])) /*|| (login_check($conn))*/ /* )
{
	$email = $_POST['userna'];
	$password = $_POST['password']; // Recupero la password criptata.
	$dimemail=strlen($email);
	$dimpassword=strlen($password);
	if ($dimemail<50 && $dimpassword<128)
	{
		if ($email == TRUE && $password == TRUE)
		{
			$mail=filter_var($email, FILTER_VALIDATE_EMAIL);
			$assword=filter_var($password, FILTER_SANITIZE_STRING);
			if ($mail == TRUE && $assword == TRUE) {
				
				$password=md5($password);
				if(login($email, $password, $conn) == true) {
	//////////////// Login eseguito /////////////////////////////////////////////
					$_SESSION['time']= time();
					echo "Login eseguito";
					header("location:./lobjectList.php");
					
	//////////////// Login uscita /////////////////////////////////////////////
 				} else {
					// Login fallito
					$errore= "nome utente o password errata"."<br>";
					setcookie("errore_php",$errore);
					header("location: ./index.php");
				}
			} else {
				$errore= "Il campo email o password non è scritto correttamente.";
				setcookie("errore_php",$errore);
				header("location: ./index.php");
			}
		} else {
			$errore= "email o password non inserita";
			setcookie("errore_php",$errore);
			header("location: ./index.php");
		}
	} else {
		$errore= "email o password inserita ha superato il limite max di dimensione";
		setcookie("errore_php",$errore);
		header("location: ./index.php");
	}
} else {
	// Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
	$errore= "plogin.php: richiesta non valida";
	setcookie("errore_php",$errore);
	header("location: ./index.php");
}

*/
?>
<?php 
if(isset($_SESSION['email'])){
echo("USER e password corretti ") ;
setcookie("errore","no",time()+3600);
header("location:./loginfatto.php");
}







?>
	
	
</body>
</html>