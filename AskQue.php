<?php
	

	function askquestion(){

		if(session_id() == ''){
           session_start();
        }
		require "DBConnect.php";
		$que = $_POST['question'];
		$tbl = $_SESSION['subject'].'que';
		$username = $_SESSION['uname'];

    $result = $conn->query("SELECT * FROM $tbl where question='$que'");
    if($result->num_rows > 0)
    {

        $row = $result->fetch_assoc();
        header("location:Answer.php?qid=".$row['qid']);
    }   
    else{
        $query = "INSERT INTO $tbl(username,asked,question) VALUES ('$username',NOW(),'$que')";
        if($conn->query($query) === TRUE)
        {

                  $nextpage = strtoupper($_SESSION['subject']).".php";
                  header("Location: ".$nextpage);

        }
        else
             echo "<h1 align='center'>Could Save Question</h1>";
    } 
		
	}
	if(isset($_POST['ask']))
  {

            askquestion();
            
  }


    

?>
<?php include("header.php"); ?> 

	<div class="row">
      	<div class="col-xs-12 col-smx-6 col-sm-offset-1 col-md-10 col-sm-offset-1 " style="background-color:#eee;padding:20px" >
	    
      		<form action="AskQue.php" method="POST">
      			<div class="page-header">
      					<h1 class="text-center" style="color:blue"> Ask Question </h1>
      			</div>
      			<div class="form-group">
      					<textarea class="form-control" name="question" rows="5" placeholder="question"></textarea>
                 </div>	
      			<div class="text-center">
      					<input type="submit" id="button" name="ask" class="btn btn-success btn-lg" value="Post Question">
      			</div>
      		</form>
	    </div>
	 </div>	
<?php include("footer.php"); ?>