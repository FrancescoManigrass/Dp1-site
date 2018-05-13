<?php 
include 'library.php';
secure_session_start();  // la nostra funzione per avviare una sessione php sicura
$conn=dbConnect("aste");
session_valida();

if(mysqli_connect_errno()){
	die("Errore nella connessione al db: ".mysqli_connect_error());
}

if(isset($_POST['thr'])){
	$thr=$_POST['thr'];
	$flag=true;
	if($thr<=1){
		setcookie("errore","thr_errato",time()+ (86400 * 30));
		header("location: ./thr.php");
		$flag=false;
	}
	$email=$_SESSION["email"];
	$controllocarattere=preg_match("/[a-zA-Z]*$/", $thr);
	//setcookie("giusto",$username,time() + (86400 * 30), "/");
	
	if($controllocarattere==TRUE && is_numeric($thr)&&$flag==true){	
		//$sql2 = "SELECT * FROM `utenti` WHERE username = '$username'";
		$sql5= "SELECT * FROM `thr_table` WHERE email ='$email'";
		$link3=interrogazioneatomica($conn,$sql5);
		$riga = mysqli_fetch_array($link3,MYSQL_NUM);
		//setcookie("giusto",mysqli_num_rows($link3),time() + (86400 * 30), "/");
		header("location: ./thr.php");
		$bid=calcolabid();
		setcookie("errore",$bid,time() + (86400 * 30), "/");
		if($thr<$bid){
			setcookie("errore","valore_basso",time() + (86400 * 30), "/");
			header("location: ./thr.php");
			
		}else{
			//setcookie("errore","ciao",time() + (86400 * 30), "/");
		}
		
		if ( (mysqli_num_rows($link3)) == 0 && $thr>=$bid){
			//usurname non presente nel database
			//setcookie("giusto",$username,time() + (86400 * 30), "/");
			
			
			//setcookie("giusto",$tempo1,time() + (86400 * 30), "/");
			$comando3="INSERT INTO `thr_table`( thr ,vincitore,email)
			VALUES
			( '$thr', 'false','$email')";
			header("location: ./thr.php");
			$link3=interrogazioneatomica($conn,$comando3);
			if(link3==false){
				die(mysql_error());
			}
			
			$bid=calcolabid();
			setcookie("errore","no",time() + (86400 * 30), "/");
			header("location: ./thr.php");
			
		}elseif($thr>=$bid && (mysqli_num_rows($link3))!= 0){
		    
			$comando3="UPDATE thr_table SET thr='$thr',vincitore='false' WHERE email='$email'";
			$link3=interrogazioneatomica($conn,$comando3);
			if($link3==false){
				die(mysql_error());
			}
			$bid=calcolabid();
			header("location: ./thr.php");
			
		}
		
		
		
	
		
	}else{
		
		setcookie("errore","thr_errato",time()+ (86400 * 30));
		$flag=false;
		header("location: ./thr.php");
		
	}
	
		
		
	}
	
	
	

		

?>