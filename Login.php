
<?php include("header.php"); ?> 

<?php
	  function Login()
      {
            require 'DBConnect.php' ;
      
      		session_start();
            if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
            {
                  $result = $conn->query("SELECT * FROM Student WHERE username = '$_POST[username]' AND password = '$_POST[password]'");

                  if($result->num_rows > 0)
                  {
                         $_SESSION['uname']=$_POST['username'];
                  		 header("Location: index.php");
                  }
                  else
                  {
                        echo "<h1 align='center' style='color:red'>Username or Password is incorrect</h1>";
                  }
            }
      }	
      if(isset($_POST['submit']))
      {
            Login();
      }
?>    
	<form name="myform" action="login.php" method="POST" onsubmit="return validateform()">
		<div class="row">
      		<div class="col-xs-12 col-smx-6 col-sm-offset-3 col-md-6 col-sm-offset-3 " style="background-color:#eee;padding:20px" >
      				<div class="page-header">
      					<h1 class="text-center" style="color:blue"> Login Form </h1>
      				</div>
      				  <div class="form-group">
      					<label>User Name:</label>
      					<input class="form-control input-sm" type="text" placeholder="User Name" name="username">
                    </div>
      				<div class="form-group">
      					<label>Password:</label>
      					<input class="form-control input-sm" type="password" placeholder="Password" name="password">
      				</div>
  					<div class="text-center">
      					<input type="submit" id="button" name="submit" class="btn btn-success btn-lg" value="Login">
      				</div>

      	 		</div>
	 		</div>	
	 	</form>
<?php include("footer.php"); ?>
