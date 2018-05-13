    function  controllo() {
    
	var email = document.getElementById("email2").value;
	
	
	var password = document.getElementById("password2").value;

	
if ((email == "") || (email =="undefined")) {
   alert("Il campo email è obbligatorio.");
   document.email2.focus("Il campo email è obbligatorio.");
  
   return false;
}else if ((password == "") ||(password == "undefined")) {
	   alert("Il password è obbligatorio.");
	   document.password2.focus();
	   return false;

}else{
	 document.getElementById("myForm2").submit();
	return true;
}

}
    function getCookie(nome) {
	  var nome = nome + "=";
	  var cookies = document.cookie.split(';');
	  
	  for(var i = 0; i < cookies.length; i++) {
	    var c = cookies[i].trim();
	    
	    if (c.indexOf(nome) == 0) 
	      return c.substring(nome.length, c.length);  
	  }
	}

    function checkPassword () {
    	var password1=document.getElementById("password").value;
    	var password2=document.getElementById("password2").value;
    	
    	if(password1!="" && password2!=""){
    	
    	if ( password1 != password2) {
    			document.getElementById("password_error").innerHTML= "<br\>Passwords are different!<br\>";
    			
    	    	
    			
    		} else {
    			var espressione = new RegExp("[^a-zA-Z0-9\s]");
    			var espressione2 = new RegExp("[0-9\s]");
    			var espressione3 = new RegExp("[a-zA-Z\s]");
    			if ( espressione.exec(password1) != null){
    				document.getElementById("password_error").innerHTML= "<br\> deve contentere solo caratteri e numeri<br\>";
    				document.getElementById("password").value= "";
    				document.getElementById("password2").value= "";
    			
    				
    			}else{
    				document.getElementById("password_error").innerHTML= "";
    				if (espressione2.exec(password1) != null){
        			
        			
    				if(espressione3.exec(password2) != null){
            			        			
    					document.getElementById("password_error").innerHTML = "<br\> password scritte correttamente<br\>";    
            	    	return true;
    			}else{
    				document.getElementById("password_error").innerHTML = "<br\> deve almeno contentenere un carattere<br\>";    
    				document.getElementById("password").value= "";
    				document.getElementById("password2").value= "";
    				return false;
    			}
    			}else{
    				
    				document.getElementById("password_error").innerHTML = "<br\> deve almeno un numero<br\>";
    				document.getElementById("password").value= "";
    				document.getElementById("password2").value= "";
    				return false;
    			}
    			
    	      }
    		}
    }
    }
    

    function checkName() {
    	var username=document.getElementById("username2").value;    	
    //	alert( username);
    	var text =document.getElementById("username2").value;
    	//alert(text);
    	var regexp =  new RegExp("[^a-zA-Z0-9\s]");
    	if ( regexp.exec(text) != null) {
    			document.getElementById("username_error").innerHTML
    			= "<br\>si possono inserire solo caratteri senza caratteri speciali <br\>";
    		//	alert("errore");
    			document.getElementById("username2").value= "";
    			return false;
    		} else {
    			document.getElementById("username_error").innerHTML
    			= "";
    			return true;
    		//	alert("ok");
    		}
    }
    function checkName2() {
    	var username=document.getElementById("username").value; 
    	var lunghezzausername= username.length;
    	if(lunghezzausername>30){
    		document.getElementById("username2_error").innerHTML= "<br\> username troppo lungo , devi sceglierlo piu piccolo<br\>";
    		return false
    	}
    //	alert( username);
    	var text =document.getElementById("username").value;
    	//alert(text);
    	var regexp =  new RegExp("[^a-zA-Z0-9\s]");
    	if ( regexp.exec(text) != null) {
    			document.getElementById("username2_error").innerHTML= "<br\>si possono inserire solo caratteri senza caratteri speciali <br\>";
    		//	alert("errore");
    			document.getElementById("username").value= "";
    			return false;
    		} else {
    			document.getElementById("username2_error").innerHTML= "";
    			return true;
    		//	alert("ok");
    		}
    }
    
    function checkPassword2 () {
    	var password1=document.getElementById("password2").value;
    	var lungezzapassoword=password1.length;
    	if(lungezzapassoword>128){
    		document.getElementById("password2_error").innerHTML= "<br\> la password deve essere minore di 128 caratteri<br\>";
			document.getElementById("password2").value= "";
			return false; 		
    		
    	}    
    			var espressione = new RegExp("[^a-zA-Z0-9\s]");
    			var espressione2 = new RegExp("[0-9\s]");
    			var espressione3 = new RegExp("[a-zA-Z\s]");
    			if ( espressione.exec(password1) != null){
    				document.getElementById("password2_error").innerHTML= "<br\> deve contentere solo caratteri e numeri<br\>";
    				document.getElementById("password2").value= "";
    				return false;
    				
    			
    				
    			}else {
    				document.getElementById("password2_error").innerHTML= "";
    			}
    				if (espressione2.exec(password1) != null){            			        			
    					document.getElementById("password2_error").innerHTML = "<br\> password scritta correttamente<br\>";    
            	    	return true;
    			}else {
    				document.getElementById("password2_error").innerHTML = "<br\> deve almeno contentenere un carattere<br\>";    
    				
    			
    				return false;
    			
    			}
    				if(eespressione3.exec(password1) != null){
    				
    				document.getElementById("password2_error").innerHTML = "<br\> deve almeno un numero<br\>";
    				
    				
    				return false;
    			}
    			
    	      }
    		
    
    
    function checkemail() {
    	var email=document.getElementById("email").value;
    	
    //alert( email);
    	
    	if(email!=""){
       var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    	if ( re.test(email) != true) {
    			document.getElementById("email_error").innerHTML = "<br\>email non valida <br\>";
    			document.getElementById("email").value= "";
    			return false;
    		
    	
    		} else {
    			
    			document.getElementById("email_error").innerHTML= " email scritta correttamente";
    			return true;
    		}
    }
    }
    
    function verifica(){
    	if( checkemail()==true && checkPassword()==true){
    		 document.getElementById("myForm").submit();
    	}
    }
    	
    function controllothr(){
    	
    	var thr=document.getElementById("thr").value;
    	var lunghezzathr=thr.length;
    	var espressione3 = new RegExp("^[a-zA-Z\s]");			
    	if(thr!=""&& espressione3.exec(thr)==null&& !isNaN(thr)){
   		 document.getElementById("myForm3").submit();
   	}else{
   	document.getElementById("thr_failed").innerHTML="<br\>  il campo deve contenere un numero<br\>";	
   	}
   	}  
    
    function cookie(){
    	 if (!navigator.cookieEnabled) {
    		 
    		    location.href = "./cookiedisattivati.php";
    		    //document.write("Il tuo browser non ha i cookie abilitati: JUST DO IT!");
    		    return false;
    		    
    		}else{
    			return true;
    			}    	 
    }
    
    function ritornaallahome(){
    	if(cookie()!=false){
   		 document.getElementById("myForm4").submit();
   	}
    	
    }
    	
    	
    	
    