<?php include("header.php"); ?> 
<?php 

	session_destroy();
	unset($_SESSION['username']);
	//session_start();
	//$_SESSION['message']='You Have Successfully Logged Out';
	header("Location: index.php?message=You Have Successfully Logged Out");
?>
	<div class="row">
      	<div class="col-xs-12 col-smx-6 col-sm-offset-1 col-md-10 col-sm-offset-1 " style="background-color:#eee;padding:20px" >
	    	<!--<h1 >Successfully Logged Out</h1>-->

	    </div>

	 </div>	
<?php include("footer.php"); ?>