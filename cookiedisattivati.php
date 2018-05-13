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
	<noscript>
			cookie();
	</noscript>
<h2> THE PAGE IS NOT COOKIE ACTIVATED, PLEASE ACTIVATE TO CONTINUE THE NAVIGATION</h2>
<script>	
	
	
	</script>
 <form id="myForm4" action="./home.php" method="POST" >
  <div class="imgcontainer">
     <img src="images.jpg" alt="Avatar" class="avatar">
  </div>
  
<div class="container">
    <script>
    
    
    </script>
    
    <p> <label><b> Username </b></label>
   <button type="button" onClick="ritornaallahome()"  >ritornaallahome()</button>

  </div>

 <div class="container" style="background-color:#f1f1f1"> 
    <button type="reset" class="cancelbtn">Cancel</button>
  

</div>
</form>


  

	
	<div id="footer">
		<small>
	Autore: <a href="mailto:francesco.manigrasso@outlook.it">Francesco Manigrasso</a> 
		</small>
	</div>
</body>
</html>