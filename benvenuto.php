<?php 
include 'library.php';

secure_session_start(); // la nostra funzione per avviare una sessione php sicura
$conn = dbConnect("aste");
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

<h1>Welcome to the online auction site</h1>
<div class="vertical-menu">


	<noscript>
		Sorry, you must activate javascript for navigation
	</noscript>
	<script>
cookie(); 
</script>  
	
<a href="./home.php">home</a>
  <p>
  <a href="./login.php" >login</a>
  <p>
   
   <a href="./registrazione.php" >Registrazione</a>
   <p>
    <a href="./errori.php" >errori</a>
      <p>
     <a href="./thr.php" >imposta thr</a>
    
</div>
	

   


</body>
</html>