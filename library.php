<?php
  function dbConnect($db) {
  	$conn = mysqli_connect("localhost", "s243887", "rriatica", "s243887");
    if (!$conn)
      die("Errore nella connessione al database (" . mysqli_connect_errno() . "): " . mysqli_connect_error());
    if (!mysqli_set_charset($conn, "utf8"))
      die('Errore nel caricamento del set di caratteri utf8: ' . mysqli_error($conn));
    return $conn;
  }
  
  function login($email, $password, $conn) {
  
  	$comando1= "SELECT email , password FROM utenti WHERE email = '" . $email ."' AND password ='". $password . "'";
  	$comando2= "SELECT email , password FROM utenti WHERE username = '" . $email . "'";
  	$link = mysqli_query($conn,$comando1);
  	var_dump($conn);
  	
  	$message = mysqli_error($conn);
  	echo "$message";
  	if(!$link) {
  		die("Errore nella query: " . mysqli_error($link));
  		//setcookie("errore","qui");
  		
  	};
  	$riga = mysqli_fetch_array($link);
  	$db_email=$riga["email"];
  	$db_password=$riga["password"];
  	echo($db_email);
  	echo($db_password);
  
 
  	if ((mysqli_num_rows($riga)) == 1) { // se l'utente esiste
  	
  		// verifichiamo che non sia disabilitato in seguito all'esecuzione di troppi tentativi di accesso errati.
  		// 		} else {
  		if($db_password == $password)
  		{ // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
  			// Password corretta!
  			$user_browser = $_SERVER['HTTP_USER_AGENT']; // recupero
  			// parametro 'user-agent' relativo all'utente corrente.
  			//$username = preg_replace("/[^0-9]+/", "", $username); // ci proteggiamo da un attacco XSS	
  			//$email = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email); // ci proteggiamo da un attacco XSS
  			$_SESSION["email"] = $email;
  			//$_SESSION['login_string'] = hash('sha512', $password.$user_browser);
  			//$_SESSION["login_string"]=md5($password.$user_browser);
  			$_SESSION["time"]=time();
  			// Login eseguito con successo.
  			return true;
  		}  		// 		}
  	} else {
  		// L'utente inserito non esiste.
  		echo "L'utente inserito non esiste<br>";
  		return false;
  	}
  }
  

  function utenteValido($email, $password) {
    $conn = dbConnect("s243887");
   // $email = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $email); // protezione xss
    $email=nl2br(htmlentities($email));
  	$email=mysqli_real_escape_string($conn,$email);
  	$dimemail=strlen($email);
  	$dimpassword=strlen($password);
  	if ($dimemail>50 && $dimpassword>128  ){
  		echo("errore dimensione");
		setcookie("errore","errore dimensione");
  		return false;
  		
  	}
  	
  	$mail1 = preg_match("/^[_a-z0-9+-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$/",$email); 
			
  	$controllopassword1= preg_match("^[a-zA-Z0-9]*$",$password);
  	$controllocarattere=preg_match("[a-zA-Z]*$", $password);
  	$controllonumero=preg_match("[0-9]*$",$password);
  	$assword1=filter_var($password, FILTER_SANITIZE_STRING);
  	if($mail1!=TRUE){
  	
  		$errore= " l'username non puo contentere caratteri speciali";
  		setcookie("errore_php",$errore);
  		setcookie("errore","1");
  		header("location: ./login.php");
  		header("location: ./login.php");
  		
  	
  	}
  
  	if($controllopassword1==TRUE){
  		$errore= " la password non puo contentere caratteri speciali";
  		setcookie("errore_php",$errore);
  		setcookie("errore","2");
  		header("location: ./login.php");
  	
  	
  	
  	}
  	if(	$controllocarattere==TRUE){
  		$errore= " la password deve contenere almeno un carattere";
  		setcookie("errore_php",$errore);
  		setcookie("errore","3");
  		header("location: ./login.php");
  		
  	
  	
  	}
  	if($controllonumero==TRUE){
  		$errore= " la password deve contenere almeno un numero";
  		setcookie("errore_php",$errore);
  		setcookie("errore",$password);
  		header("location: ./login.php");
  		
  	
  	
  	}
  	if($assword1!=TRUE){
  		$errore= "la password non puo contentere caratteri speciali";
  		setcookie("errore_php",$errore);
  		setcookie("errore","5");
  		header("location: ./login.php");	
  	
  		 
  	}
  	
  	
  	$password=nl2br(htmlentities($password));
  	$password=mysqli_real_escape_string($conn,$password);
  	$pass_md5 = md5($password);
  	$pass_sha1 = sha1($password);
  	$comando1= "SELECT email , password FROM utenti WHERE email = '" . $email . "'";
  	 
   // $risposta = mysqli_query($conn, "SELECT username , password FROM utenti WHERE username = '" . $utente . "'");
    try {
    	mysqli_autocommit($conn,false);
    	$risposta=mysqli_query($conn,$comando1);
    	if(!$risposta)
    		throw new Exception("comando1 fallito");
    
    	if (!mysqli_commit($conn)) {
    		// per avere il corretto messaggio di errore
    		//mysqli_commit convalida la tranzazione , se non ci riesce errore
    		throw Exception("Commit fallita");
    	}
    } catch (Exception $e) {
    	mysqli_rollback($conn);
    	//se ce stata un eccezione lancio rollbak
    	mysqli_close($conn);
    	return false;
    
    
    }
    mysqli_autocommit($conn,true);// rimeto il commit nello stato iniziale
    
    if (!$risposta)
      die("Errore nella query: " . mysqli_error());

    if (mysqli_num_rows($risposta) == 0){
    	mysqli_close($conn);
    	return false;    	 
     

    } 
    $riga = mysqli_fetch_array($risposta);
    $pass_sha1 = sha1($password);
   if(($riga['email']!=$email) ||( $riga['password']!=$pass_sha1)){
   	mysqli_close($conn);
   	return false; 
   
   }else{
   	$_SESSION["email"]=$email;
   	$_SESSION["time"]=time();
   	return true;
   }  
   
  }
  
  function https(){
  	if ( !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
  	// La richiesta e' stata fatta su HTTPS
  } else {
  	// Redirect su HTTPS
  	// eventuale distruzione sessione e cookie relativo
  	$redirect = 'https://' . $_SERVER['HTTP_HOST'] .
  	$_SERVER['REQUEST_URI'];
  	header('HTTP/1.1 301 Moved Permanently');
  	header('Location: ' . $redirect);
  	exit();
  }
  }
//Funzione per controllare periodo inattivita sessione 
function session_valida() {
	if(isset($_SESSION['email'])){
	$nuovo=0;
	$t=time();
	$diff=0;
	if( isset($_SESSION["time"])) {
	$t0=$_SESSION["time"];
	$diff=$t-$t0;
	} else
		$nuovo=true;
	
	if( $nuovo||$diff>120 ) {
		session_unset();
		session_destroy();
		header("location:./login.php");
		return false;
	} else {
		$_SESSION["time"]=time();
		return true;
	}
}
}
  
  
  function secure_session_start(){
setcookie("errore_php"," ");
  		$session_name = 'sec_session_id'; // nome random della sessione
  		$secure = false; // usa il protocollo 'https'
  		$httponly = true; // impedisce a javascript di accedere all'id di sessione
  		//ini_set('session.use_only_cookies', 1); // Forza la sessione al solo uso dei cookie.
  		$cookieParams = session_get_cookie_params(); // Legge i parametri del corrente cookie.
  		//session_set_cookie_params(
  		session_set_cookie_params( $cookieParams["lifetime"],
  		$cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
  		// lifetime: la durata del cookie
  		// path: il percorso dove l'informazione e' archiviata
  		// domain: dominio di validita'
  		// secure: cookie attraverso connesione sicura
  		// httponly: non attaccabile con XSS
  		//session_set_cookie_params(120);
  		session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
  		session_start(); // Avvia la sessione php.
  		//session_regenerate_id(); // Rigenera la sessione e cancella quella creata
  	}
  	
  	function interrogazioneatomica($conn,$comando1){
  		
  		try {
  			mysqli_autocommit($conn,false);
  			$risposta=mysqli_query($conn,$comando1);
  			if(!$risposta)
  				throw new Exception("comando1 fallito");
  		
  			if (!mysqli_commit($conn)) {
  				// per avere il corretto messaggio di errore
  				//mysqli_commit convalida la tranzazione , se non ci riesce errore
  				throw Exception("Commit fallita");
  			}
  		} catch (Exception $e) {
  			mysqli_rollback($conn);
  			//se ce stata un eccezione lancio rollbak
  			mysqli_close($conn);
  			return false;
  		
  		
  		}
  		mysqli_autocommit($conn,true);// rimeto il commit nello stato iniziale
  		return $risposta;
  		
  		
  	}
  	
  	
  	function calcolabid(){
	setcookie("errore","1");
  		//secure_session_start(); // la nostra funzione per avviare una sessione php sicura
  		$conn = dbConnect("s243887");
  		//session_valida();
  		$sql ="SELECT * FROM `thr_table` ORDER BY thr DESC,tempo ASC" ;
		$sql67 ="SELECT COUNT(*) as numero FROM `thr_table` " ;
		$link67=interrogazioneatomica($conn,$sql67);
		$riga67 = mysqli_fetch_array($link67,MYSQLI_NUM);
  		$link3=interrogazioneatomica($conn,$sql);
		if(!$link3){
		die("errore query");
		}
		setcookie("errore","2");
  		$riga = mysqli_fetch_array($link3,MYSQLI_NUM);// riga[0] contiene max(thr)
  		$riga2 = mysqli_fetch_array($link3,MYSQLI_NUM);
		
		
  		// THR,VINCITORE,TEMPO,USER
  		// 0 , 1,2,3
  		// 4,5,6,7 // 2 MASSIMO
  	
  		//$sql2 = "SELECT username FROM `thr_table` WHERE username!='$riga[0] AND thr =(select MAX(THR) FROM `thr_table` ) ";// secondo  massimo
  	setcookie("errore","3");
  		if($riga[3]!=NULL){
		 setcookie("errore","4");
  			$sql = "SELECT * FROM `thr_table` WHERE email = '$riga[3]'";
  			$vero="vero";
  			setcookie("errore",$riga[1]);
  			$comando3="UPDATE `thr_table` SET  vincitore='vero' WHERE email ='$riga[3]' AND tempo='$riga[2]'";
  			$link3=interrogazioneatomica($conn,$comando3);
				setcookie("errore","4");
  			if($link3==false){
  				die(mysql_error());
  			}
			setcookie("errore","ritorno 1",time() + (86400 * 30), "/");
  				
  			$falso="false";
  			$comando4="UPDATE `thr_table` SET vincitore='false'  WHERE email !='$riga[3]' AND tempo!='$riga[2]'";
  			$link4=interrogazioneatomica($conn,$comando4);
				setcookie("errore","5");
  			if($link4==false){
  				die(mysql_error());
  			}
  			//$riga = mysqli_fetch_array($link3,MYSQLI_NUM);
  			if($riga2[0]==0){
  				return 1;
  			}
  			if($riga2[0]==$riga[0]){
  				return $riga2[0];
  			}
  			return number_format($riga2[0],2)+0.01;
  		}
  	
  	
  	
  	}
  	
  	
  	 
  	 
  	
  
  
?>