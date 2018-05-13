<?php 

include "library.php";
secure_session_start();
session_valida();
setcookie("errore","no",time()-3600);
https();
?>

<html lang="it">  <!-- specifica la lingua utilizzata , teoricamene il broswer dovrebbe usare queste informazione per rendere meglio il contenuto -->
<TITLE> LOGIN </TITLE> <!--indica solo un titolo della pagina che non viene visualizzat-->

<link rel="stylesheet" type="text/css" href="StyleSheet.css" />
<head>

 <script src="JavaScript.js"></script>
</head>
<!--  <h1> BENVENUTO NELL'SITO DELLE ASTE</h1> -->

<body>
<noscript>
	Sorry, you must activate javascript for navigation
	</noscript>
<script>
cookie(); 
</script>  
 	<div class = "header"><h2>Benvenuto nel sito di aste</h2>
		</div>
		<h1> PAGE LOGOUT</h1>
<h2> CLICK TO DO IT! </h2>
<div class="vertical-menu">


<a href="./home.php">home</a>
  <p>
  <a href="./login.php" >login</a>
  <p>
   
   <a href="./registrazione.php" >Registration</a>
   <p>
 
      <p>
     <a href="./thr.php" >set thr</a>
    
</div>
  <script>
cookie(); 
</script>  
<form action="./logout.php">
  <div class="imgcontainer" >
     <img src="images.jpg" alt="Avatar" class="avatar">
  </div>
    <button type="submit"   >esci</button>
   </form> 
</body>
</html>