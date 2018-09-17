<html>
<head>
    <title>Projet Securite PHP + MYSQL</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body>
<?php
header('X-Xss-Protection:0');
?>
<?php include "process.php" ?>
  <?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
//print_r($_SESSION['captcha']) ;
//echo str_replace("/p-captcha.php"," /projet_securite_php_mysql/simple-php-captcha.php",$_SESSION['captcha']['image_src']);
?> 
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="http://localhost/projet_securite_php_mysql/index.php">Acceuil</a></li>
    <li class="breadcrumb-item active" aria-current="page">index</li>
  </ol>
</nav>
<br>
<br>

  <div class="row justify-content-md-center">
	<div class="col-md-4">
  	<form class="form-horizontal" method="get" action="process.php">
   					 <fieldset>

   						   <div class="jumbotron">
   								 <div class="container">
   									 <h5>Formulaire non protégé</h5>
   							 <!-- Text input-->
   							 <div class="form-group">
   							   <label class="col-md-4 control-label" for="user_login">Login</label>  
   							   <div class="col-md-6">
   							   <input id="user_login" name="user_login" type="text" placeholder="Login" class="form-control input-md">
   								 
   							   </div>
   							 </div>

   							 <!-- Password input-->
   							 <div class="form-group">
   							   <label class="col-md-4 control-label" for="user_pass">Mot De Passe</label>
   							   <div class="col-md-6">
   							 	<input id="user_pass" name="user_pass" type="password" placeholder="Mot De Passe" class="form-control input-md">
   								 
   							   </div>
   							 </div>

   							 <!-- Button -->
   							 <div class="form-group">
   							   <label class="col-md-4 control-label" for="connexion_bt"></label>
   							   <div class="col-md-4">
   							 	<button id="connexion_bt" name="connexion_bt" class="btn btn-primary">Connexion</button>
   							   </div>
   							 </div>
   								 </div>
   							 <!--</div>

   							 <!-- Form Name -->

                             	 
   						 </fieldset>
   				 </form>
	</div>
 
	<div class="col-md-4">
  	<form class="form-horizontal" method="post" action="process.php">
   			 <fieldset>
     	 
   				 <div class="jumbotron">
   						 <div class="container">
   							 <!-- Form Name -->
   				 <h5>Formulaire  protégé</h5>
   				 <!-- Text input-->
   				 <div class="form-group">  
   				   <div class="row">
   							 <div class="col-md">
   								 <label class="col-md-4 control-label" for="user_login">Login</label>
   								 <input id="user_login1" name="user_login" type="text" placeholder="Login" class="form-control input-md">
   							 </div>
                 <br>
   							 <div class="col-md">
   							         	<?php echo '<img src="' .str_replace("/p-captcha.php"," /projet_securite_php_mysql/simple-php-captcha.php",$_SESSION['captcha']['image_src']) . '" alt="CAPTCHA code">';     	?>   
   							 </div>
   					 
   				   </div>
   				 </div>
   				 <!-- Password input-->
   				 <div class="form-group">
   					 <div class="row">
   					   <div class="col-md">
   							 <label class="control-label" for="user_pass">Mot De Passe</label>
   						 <input id="user_pass1" name="user_pass" type="password" placeholder="Mot De Passe" class="form-control input-md">
   					   </div>
   						 <div class="col-md">
   							 <label class="col-md-4 control-label" for="captcha_text">Catpcha</label>
   							 <input id="captcha_text" name="captcha_text_input" type="text" placeholder="Captcha" class="form-control input-md">
   						 <input name="captcha_text" type="hidden"  value="<?php echo $_SESSION['captcha']['code'] ?>"
   						 </div>
   					 </div>

   				   
   				 </div>

   				 <!-- Button -->
   				 <div class="form-group">
   				   <label class="col-md-4 control-label" for="connexion_bt"></label>
   				   <div class="col-md-4">
   				 	<button id="connexion_bt1" name="connexion_bt" class="btn btn-primary">Connexion</button>
   				   </div>
   				 </div>

   						 </div>
   				 </div>

   			 </fieldset>
   		 </form>
	</div>
  </div>
</div>

<div class="row">

    <div class="col-md-6">
   	 <div class="accordion" id="accordionExample">
  <div class="card">
	<div class="card-header" id="headingOne">
  	<h5 class="mb-0">
    	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      	Injection SQL
    	</button>
			
  	</h5>
	</div>

	<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
  	<div class="card-body">
		L'injection SQL est une méthode d'attaque très connue. C'est un vecteur d'attaque extrêmement puissant quand il est bien exploité. Il consiste à modifier une requête SQL en injectant des morceaux de code non filtrés, généralement par le biais d'un formulaire.
   	 <div class="form-group">
   				   <label class="col-md-4 control-label" for="connexion_bt"></label>
   				   <div class="col-md-4">
   				 	 <button onclick="injectionSQL()" id="connexion_bt" name="connexion_bt" class="btn btn-primary">Tester</button>
   				   </div>
   	 </div>
  	</div>
	</div>
  </div>
  <div class="card">
	<div class="card-header" id="headingTwo">
  	<h5 class="mb-0">
    	<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
   		 Faille XSS
    	</button>
  	</h5>
	</div>
	<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
  	<div class="card-body">
		XSS (plus officiellement appelée Cross-Site Scripting) est une faille permettant l'injection de code HTML ou JavaScript dans des variables mal protégées
   		 <div class="form-group">
   				   <label class="col-md-4 control-label" for="connexion_bt"></label>
   				   <div class="col-md-4">
   				 	<button onclick="failleXSS()" id="connexion_bt" name="connexion_bt" class="btn btn-primary">Tester</button>
   				 

             </div>
   	 </div>
  	</div>
	</div>
  </div>
<br><br>
</div>
    </div>
    
    <div class="col-md-6">
    
   		 
   		 <div class="card text-center">
   			   <div class="card-header">
   				 Erreur
   			   </div>
   			   <div class="card-body">
   				 
   									 <?php
   						   if(isset($_GET["msg_post"])and isset($_GET["req_post"]) and isset($_GET["type_msg_post"]) )
   							{
   							 if($_GET["type_msg_post"]==1)
   							 {
   							 ?>
   								 <div class="alert alert-success" role="alert">
   								  <?php echo  $_GET["req_post"]."<br>".$_GET["msg_post"]  ?>
   								 </div>

   							 <?php }else{ ?>
   								 <div class="alert alert-danger" role="alert">
   								   <?php echo  $_GET["req_post"]."<br>".$_GET["msg_post"]  ?>
   								 </div>
   								 <?php
   							}
   						}
   						 ?>
   						 
   						 <?php
   						   if(isset($_GET["msg"])and isset($_GET["req"]) and isset($_GET["type_msg"]) )
   							{
   							 if($_GET["type_msg"]==1)
   							 {
   							 ?>
   								 <div class="alert alert-success" role="alert">
   								  <?php echo  $_GET["req"]."<br>".$_GET["msg"]  ?>
   								 </div>

   							 <?php }else{ ?>
   								 <div class="alert alert-danger" role="alert">
   								   <?php echo  $_GET["req"]."<br>".$_GET["msg"]  ?>
   								 </div>
   								 <?php
   							}
   						}
   						 ?>
   				 
   			   </div>
   			   <div class="card-footer text-muted">
   				 
   			   </div>
   			 </div>
   		 
   	 
    </div>

</div>

<script type="text/javascript" src="ind.js" ></script>
</body>
</html>
