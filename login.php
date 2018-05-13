<?php 
include 'library.php';

secure_session_start(); // la nostra funzione per avviare una sessione php sicura
$conn = dbConnect("s243887");
session_valida();
https();

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

<!--  <h1> PAGINA RELATIVA AL LOGIN</h1> -->
<noscript>
	Spiacente, deve attivare javascript per la navigazione  
	</noscript>
<script>
cookie(); 
</script>  
<h1>  </h1>
 	<div class = "header"><h2>Welcome to the auction site</h2>
		</div>
		<h1> PAGE FOR LOGIN</h1>
<h2> PLEASE INSERT THE DATA REQUIRED</h2>
<div class="vertical-menu">


<a href="./home.php">home</a>
  <p>
  <a href="./login.php" >login</a>
  <p>
   
   <a href="./registrazione.php" >Registration</a>
   <p>
 <a href="./thr.php" >set thr</a>
   <p>
   
     
  
</div>
  <div class="imgcontainer">
     <img src="images.jpg" alt="Avatar" class="avatar">
  </div>
	
 <form id="myForm2" action="./loginsql.php" method="POST" >

  <div class="container">
    <span style="color:red" name="login_failed" id="login_failed" ></span>  
    <script>
    var nome = getCookie("errore");
    var nome2 = getCookie("errore_php");
    if(nome=="si"){
    
      
    	document.getElementById("login_failed").innerHTML = "LOGIN failed, if you did not register, register before otherwise try again to put username and password";
        
    }
      
    if(nome=="utente_non_loggato"){
    	document.getElementById("login_failed").innerHTML = "Before logging in you must log in";  
    }
    
    </script>
    
    <p> <label><b>Selecting  email for the website</b></label>
    <input type="text"  id="email2"  placeholder="email" name="email2" maxlength="50" required>
    <span id = 'email2_error' style = "color: red;"></span>

    <label><b>  Selecting  password for the website</b></label>
    <input type="password" id ="password2" placeholder="Password" name ="password2" maxlength="128" required>
     <span id = 'password2_error' style = "color: red;"></span>
   <button type="button" onClick="controllo()">Login</button>

  </div>

 <div class="container" style="background-color:#f1f1f1"> 
    <button type="reset" class="cancelbtn">Cancel</button>
  
	<small>
	Autore: <a href="mailto:francesco.manigrasso@outlook.it">Francesco Manigrasso</a> 
		</small>
	</div>
	
</form>
<script>

</script>

  
		
	
	



<?php 
if(isset($_SESSION['email'])){
echo("USER e password corretti ") ;
setcookie("errore","no",time()+3600);
header("location:./loginfatto.php");
}






?>

	
	<div id="footer" float="down">
	
</body>
</html>