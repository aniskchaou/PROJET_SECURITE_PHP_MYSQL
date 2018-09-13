<html>
<head>
<title>sucess</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
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
</body>
</html>