<?php 
include 'library.php';
setcookie("errore","",time()-3600);
setcookie("giusto","",time()-3600);
secure_session_start(); // la nostra funzione per avviare una sessione php sicura
https();
$conn = dbConnect("aste");
session_valida();

if(!isset($_SESSION['email'])){
	echo(" utente non loggato ") ;
	setcookie("errore","utente_non_loggato",time()+3600);
	header("location: ./login.php");
	
}

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
	Spiacente, deve attivare javascript per la navigazione  
	</noscript>
<script>
cookie(); 
</script>  
 	<div class = "header"><h2>Benvenuto nel sito di aste</h2>
		</div>
		<h1> imposta il tuo thr  </h1>
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
</script>  
 <form id="myForm3" action="./thrsql.php" method="POST" >
  <div class="imgcontainer">
     <img src="images.jpg" alt="Avatar" class="avatar">
  </div>

   <div class="container"> 
<?php 

$email=$_SESSION["email"];
$sql = "SELECT thr , vincitore FROM `thr_table` WHERE email = '$email'";
$link=interrogazioneatomica($conn,$sql);
if(!$link)
	die ("errore query");
if((mysqli_num_rows($link)) == 1 ){
$riga = mysqli_fetch_array($link);
$bid=calcolabid();

echo("<h2> THR ATTUALE DELL'USERNAME</h2>
<table>
  <tr>
    <th>email</th>
    <th>Thr</th>
    <th>BID attuale</th>
    <th>offerta</th>
  </tr>
<tr>  <td>");
    echo($email);
  echo(" </td> <td>"); 
   echo($riga["thr"]);
   echo(" </td> <td>");
   echo($bid);
   echo(" </td> <td>");
   if($riga["vincitore"]=="vero"||$bid==1){
echo("<p style='color:green'>You are the best bidder <p>  ");

}else{
echo("<p style='color:red'> Bid overdue  <p>  ");
}
   echo(" </td>    
  </tr> </table>") ;

 

}else{
echo("No thr set for this user");
}
?>
    

 
    <span style="color:red" id='thr_failed' ></span>  
    <span style="color:green" id='thr_fatto' ></span>  
    <script>
	
        var errore = getCookie('errore');
        var giusto = getCookie('giusto');
        if(errore=="valore_basso"){

    	document.getElementById("thr_failed").innerHTML = "Thr value too low ";
        }else{
        	document.getElementById("thr_failed").innerHTML = "";
        }
       
    	
     
       
    </script>
    
    <p> <label><b> imposta il tuo thr  </b></label>
    <input type="text"  id='thr' name='thr' required>    
  <button type="button"  onClick="controllothr()" >Set the value of your thr</button>
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