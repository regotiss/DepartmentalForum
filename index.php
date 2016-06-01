<?php include("header.php"); ?> 
<?php include("application.php"); ?>
	<?php if(session_id() == ''){
           session_start();
        }
    if(isset($_SESSION['uname'])){?> 
	<div class="container">
	 <nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">Branches</a>
	    </div>
	    <ul class="nav navbar-nav">
	      
	      <li class="dropdown">
	        <a class="dropdown-toggle" data-toggle="dropdown" href="#">CSE
	        <span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">F.Y.</a></li>
	          <li><a href="#">S.Y.</a></li>
	          <li><a href="TY.php">T.Y.</a></li>
	 
	          <li><a href="#">B.Tech.</a></li>
	        </ul>
	      </li>
	      <li><a href="#">IT</a></li>
	      <li><a href="#">Eln</a></li>
	      <li><a href="#">Ele</a></li>
	      <li><a href="#">Civil</a></li>
	      <li><a href="#">Mech</a></li>
	    </ul>
	  </div>
	</nav>
	</div>
	<?php } ?>
	<?php if(!empty($_GET['message']))
	{
		$message=$_GET['message'];
		echo "<h1 align='center'>$message</h1>";
	} ?> 
	<div class="container">
	  <br>
	  <div id="myCarousel" class="carousel slide myslide" data-ride="carousel">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	     <li data-target="#myCarousel" data-slide-to="2"></li>
		 <li data-target="#myCarousel" data-slide-to="3"></li>
		 <li data-target="#myCarousel" data-slide-to="4"></li>
	    </ol>

	    <div class="row">

      	<div class="col-xs-12 col-smx-6 col-sm-offset-1 col-md-10 col-sm-offset-1 " style="background-color:#eee;margin-bottom:70px" >
	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">
	    	<div class="item active">
	        <img src="img/frontgate.jpg" alt="WCE" width="460" height="345">
	      </div>
	      <div class="item ">
	        <img src="img/cse.jpg" alt="CSE" width="460" height="345">
	      </div>

	      <div class="item">
	        <img src="img/eln.jpg" alt="ELN" width="460" height="345">
	      </div>

	      <div class="item">
	        <img src="img/mech.jpg" alt="Mech" width="460" height="345">
	      </div>

	      <div class="item">
	        <img src="img/civil.jpg" alt="Civil" width="460" height="345">
	      </div>
	   	</div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>
	</div>
	</div>
	
	<?php include("footer.php"); ?> 