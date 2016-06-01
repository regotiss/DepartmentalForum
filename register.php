<?php include("header.php"); ?> 
<?php     
      
      
      function NewUser()
      {
            require 'DBConnect.php' ;
      
            if(session_id() == ''){
                  session_start();
            }
            $name = $_POST['name'];
            $username = $_POST['username'];
            $mobile = $_POST['mobile'];
            $branch = $_POST['branch'];
            $email = $_POST['email'];
            $year = $_POST['year'];
            $password =  $_POST['password'];
            $query = "INSERT INTO Student(name,username,email,password,mobileno,year,branch) VALUES ('$name','$username','$email','$password','$mobile','$year','$branch')";
            if($conn->query($query) === TRUE)
            {
                  $_SESSION['uname']=$username;
                  header("Location: index.php");

            }
            else
                  echo "<h1 align='center'>Could Not Register</h1>";
      }

      function SignUp()
      {
            require 'DBConnect.php' ;
      

            if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
            {
                  $result = $conn->query("SELECT * FROM Student WHERE username = '$_POST[username]' AND password = '$_POST[password]'");

                  if($result->num_rows > 0)
                  {
                        echo "<h1 align='center'>SORRY...YOU ARE ALREADY REGISTERED USER...</h1>";
                  }
                  else
                  {
                        newuser();
                  }
            }
      }
      if(isset($_POST['submit']))
      {

            SignUp();
      }
?>    
	<form name="myform" action="register.php" method="POST" onsubmit="return validateform()">
		<div class="row">
      		<div class="col-xs-12 col-smx-6 col-sm-offset-3 col-md-6 col-sm-offset-3 " style="background-color:#eee;padding:20px" >
      				<div class="page-header">
      					<h1 class="text-center" style="color:blue"> Registration Form </h1>
      				</div>

      				<div class="form-group">
      					<label>Full name:</label>
      					<input class="form-control input-sm" type="text" placeholder="Full Name" name="name">
      				</div>
      				<div class="form-group">
      					<label>Mobile Number:</label>
      					<input class="form-control input-sm" type="text" placeholder="Mobile Number" name="mobile">
      				</div>
      				<div class="form-group">
      					<label>Email ID:</label>
      					<input class="form-control input-sm" type="email" placeholder="Email ID" name="email">
      				</div>
      				<div class="form-group">
      					<label>Branch:</label>
      					<input class="form-control input-sm" type="text" placeholder="Branch" name="branch">
      				</div>
      				<div class="form-group">
      					<label>Year:</label>
      					<input class="form-control input-sm" type="text" placeholder="Year" name="year">
      				</div>
                    <div class="form-group">
      					<label>User Name:</label>
      					<input class="form-control input-sm" type="text" placeholder="User Name" name="username">
                    </div>
      				<div class="form-group">
      					<label>Password:</label>
      					<input class="form-control input-sm" type="password" placeholder="Password" name="password">
      				</div>
                    <div class="form-group">
      					<label>Re-enter Password:</label>
      					<input class="form-control input-sm" type="password" placeholder="Re-Password" name="pass1">
      				</div>	
      				<div class="text-center">
      					<input type="submit" id="button" name="submit" class="btn btn-success btn-lg" value="Sign Up">
      				</div>

      	 		</div>
	 		</div>	
	 	</form>
<?php include("footer.php"); ?>

<script>
    
        function validateform()
    {
       if(document.myform.name.value==null ||document.myform.name.value=="")
       {
        alert("Name must be filled...");
        document.myform.name.focus();
        return false;
       }
        
          
        if((document.myform.mobile.value.search(/[a-zA-Z]/))>-1)
        {
            alert("Mobile Number must be conatin only digits");
            document.myform.mobile.focus();
            return false;
        }
        if(document.myform.mobile.value.length!=10)
        {
            alert("Number Must be 10 Digit..");
            document.myform.mobile.focus();
            return false;
        }


        if(document.myform.branch.value==null ||document.myform.branch.value=="")
        {
        alert("Branch must be filled...");
        document.myform.branch.focus();
        return false;
        }
         if(document.myform.year.value==null ||document.myform.year.value=="")
      {
        alert("Year must be filled...");
        document.myform.year.focus();
        return false;
      }

      if((document.myform.year.value.search(/[a-zA-Z]/))<-1)
      {
            alert("year must be conatin only strings");
            document.myform.year.focus();
            return false;
      }

      if(document.myform.username.value==null ||document.myform.username.value=="")
      {
        alert("username must be filled...");
        document.myform.username.focus();
        return false;
      }

      if(document.myform.password.value.length<6)
      {
            alert("Password must  be conatin at least 6 digits");
            document.myform.password.focus();
            return false;
      }
      if(document.myform.password.value.search(/[a-zA-Z]/)==-1 ||document.myform.password.value.search(/[0-9]/)==-1)
      {
            alert("Password must  be combination of numbers and characters..");
            document.myform.password.focus();
            return false;
      }
      if(document.myform.password.value!==document.myform.pass1.value)
      {
            alert("Password must be same...");
            document.myform.pass1.focus();
            return false;
      }
       

        alert("You Are Successfully SignIn");
    }
</script>


