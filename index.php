<html>
<head>
	<title>Projet Securite PHP + MYSQL</title>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
<?php
header('X-Xss-Protection:0');

?>



<table width="1300" >

<?php include "process.php" ?>
	<tr>
        <!-- unprotected form -->
		<td>
				<form class="form-horizontal" method="get" action="process.php">
						<fieldset>

								<!-- Form Name -->
								<legend>Formulaire non protégé</legend>

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
							</fieldset>
					</form>
					


		</td>

        <!-- protected form -->
		<td>

<?php
session_start();
include("simple-php-captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
   
			<form class="form-horizontal" method="post" action="process.php">
				<fieldset>
                  
					<!-- Form Name -->
					<legend>Formulaire  protégé</legend>

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
                    <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">';         ?>
                    
					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="captcha_text">Catpcha</label>  
					  <div class="col-md-4">
					  <input id="captcha_text" name="captcha_text_input" type="text" placeholder="Captcha" class="form-control input-md">
					  <input name="captcha_text" type="hidden"  value="<?php echo $_SESSION['captcha']['code'] ?>"
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="connexion_bt"></label>
					  <div class="col-md-4">
					    <button id="connexion_bt" name="connexion_bt" class="btn btn-primary">Connexion</button>
					  </div>
					</div>


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

				</fieldset>
			</form>

		</td>
	</tr></table>		
</body>
</html>