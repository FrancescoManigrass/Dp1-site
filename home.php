<?php 
include "library.php";
//https();
secure_session_start();
//session_start();
session_valida();

https();
setcookie("errore","",time()-3600);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="StyleSheet.css" />
    <meta charset="utf-8" />
    <title></title>
     <script src="JavaScript.js"></script>
   
</head>
<body class="carattere">
	<div class = "header"><h2>Welcome to the auction site</h2>
		</div>
		<h1> HOME SITE</h1>
<h2>DATA OF THE BEST OFFER</h2>

<script>
  cookie(); 
  </script>  
    
<div class="vertical-menu">


<a href="./home.php">home</a>
  <p>
  <a href="./login.php" >login</a>
  <p>
   
   <a href="./registrazione.php" >Registration</a>
   <p>
  
      <p>
     <a href="./thr.php" >Set thr</a>
    
</div>
  
  
  
 <noscript>
			Sorry,  you must activate javascript for navigation
	</noscript>
	<script>
cookie();
	</script>
	 
        <table border="1"> 
        <tr>
        <th> Username </th>
           <th> BID </th>

              </tr>
              
<?php
    
      $conn = dbConnect("aste");
      $bid=calcolabid();
      $comando1 = ("SELECT * FROM thr_table ORDER BY thr DESC,tempo DESC" );
      $link1=interrogazioneatomica($conn,$comando1);
     
      if (!$link1){
        die('Query non riuscita');
        
      }
      else{
      	$riga = mysqli_fetch_array($link1,MYSQLI_NUM);      	
      	if($riga[0]!=NULL){
// THR,VINCITORE,TEMPO,EMAIL
// 0 , 1,2,3
// 4,5,6,7 // 2 MASSIMO
 	      	
      	}
      	}
      
			

      	?>  
      	<tr> 
      	<td
      	><?php if($riga[3]!=NULL){
      		echo($riga[3]);
      		}else{
                 echo("No bids");}?>	
      	</td>
      	<td> <?php if($riga[0]!=0){
      		echo($bid);
      		}else{
                 echo("1");
      			

      		}?> </td>
      		 
      		</tr>
      		 </table>
      		 <?php    	
 
      
    
      mysqli_close($conn);
      
    ?>
     <div>
Autore: <a href="mailto:francesco.manigrasso@outlook.it">Francesco Manigrasso</a> 
	
	</div>
 
    </body>
    </html>