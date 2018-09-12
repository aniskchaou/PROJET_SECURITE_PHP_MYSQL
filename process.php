<?php

include 'db_connexion.php';

if (isset($_GET['user_login']) and isset($_GET['user_pass']) )  {
		 query_process_get($_GET['user_login'],$_GET['user_pass']);
}elseif (isset($_POST['user_login']) and isset($_POST['user_pass'])) {
	if ($_POST['captcha_text_input']!=$_POST['captcha_text']) {
		$msg="erreur de code captcha ";
		header("Location: index.php?req_post=&msg_post=".$msg."&type_msg_post=0");
	}else
	{
		$user_login_post=htmlspecialchars($_POST['user_login']);
	     echo "user login ".$user_login_post;
	     $user_pass_post=htmlspecialchars($_POST['user_pass']);
		query_process_post($user_login_post,$user_pass_post);
	}
	   
}





 function query_process_get($user_login,$user_pass)
{
	include 'db_connexion.php';
	try {
	    
	    $stmt = $conn->query("SELECT * FROM users  where login = '".$user_login."' and password = '".$user_pass."' "); 
	    

	    		$req="SELECT * FROM users  where login = ".$user_login." and password= ".$user_pass." ";
	    		
 
		    	 	if ($stmt->rowCount()<1)  {
		    			$msg="utilisateur ".$user_login."n 'est pas trouvé dans la base de données.";
		    			$type_msg=0;
		    			
		    		}else
	                {
		                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			    		   $type_msg=1;
			    			$msg="utilisateur ".$user_login."est trouvé dans la base de données.";
			    		} 
	    	   

	    	             
	    	        }
	    	         header("Location: index.php?req=".$req."&msg=".$msg."&type_msg=".$type_msg);
	    
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
}



 function query_process_post($user_login,$user_pass)
{
	include 'db_connexion.php';
	try {
	    
	     


	    $stmt = $conn->prepare("SELECT * FROM users  where login = ? and password= ? "); 
	    
	    $stmt->execute( array($user_login,$user_pass));

	         
	    	
	    		
	    		$req="SELECT * FROM users  where login = ".$user_login." and password= ".$user_pass." ";
	    		
 
		    	 	if ($stmt->rowCount()<1)  {
		    			$msg="utilisateur ".$user_login."n 'est pas trouvé dans la base de données.";
		    			$type_msg=0;
		    			
		    		}else
	                {
		                  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

			    		   $type_msg=1;
			    			$msg="utilisateur ".$user_login."est trouvé dans la base de données.";
			    		} 
	    	   

	    	             
	    	        }
	    	         header("Location: index.php?req_post=".$req."&msg_post=".$msg."&type_msg_post=".$type_msg);
	    
	}
	catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}
}






?>