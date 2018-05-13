<!Doctype html>
<html>
 <link rel="stylesheet" type="text/css" href="StyleSheet.css" />
<body>
 	<div class = "header"><h2>Welcome to the auction site</h2>
		</div>

<h1>> PAGE FOR LOGIN</h1>
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
   
   <a href="./registrazione.php" >Registration</a>
   <p>
   <!--   <a href="./errori.php" >errori</a> -->
      <p>
     <a href="./thr.php" >imposta thr</a>
    
</div>
<div class="imgcontainer">
     <img src="images.jpg" alt="Avatar" class="avatar">
  </div>

 
<div class="container" style="float:right  style = font-size:50%>

    <span style="color:red" name="login_failed" id="login_failed" ></span>  
    <script>
    var nome = getCookie("errore");
    var nome2 = getCookie("errore_php");
    if(nome=="si"){
      // alert("cuai");
      
    	document.getElementById("login_failed").innerHTML = "LOGIN failed, if you did not register, register before otherwise try again to put username and password";
        
    }
      
    if(nome=="utente_non_loggato"){
    	document.getElementById("login_failed").innerHTML = "Before logging in you must log in";  
    }
    
    </script>
      <form id="myForm2" action="./loginsql.php" method="POST" >
    <p> <label><b> Username </b></label>
    <input type="text"  id="username"  placeholder="Username" name="username" maxlength="30"  " required>
    <span id = 'username2_error' style = "color: red;"></span>

    <label><b>Password</b></label>
    <input type="password" id ="password2" placeholder="Password" name ="password2" maxlength="128"  "  required>
     <span id = 'password2_error' style = "color: red;"></span>
   <button type="button" onClick="controllo()"  >Login</button>
   <button type="reset" class="cancelbtn">Cancel</button>

 </form>
 <div>
Autore: <a href="mailto:francesco.manigrasso@outlook.it">Francesco Manigrasso</a> 
	
	</div>
 

</div>





</div>

</body>
</html>
