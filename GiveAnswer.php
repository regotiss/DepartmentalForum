
<?php include("header.php"); ?> 

<?php
      if(isset($_GET['qid'])){
            if(session_id() == ''){
              session_start();
            }
            $qid=$_GET['qid'];
            require "DBConnect.php";
            $tbl1 = $_SESSION['subject']."que";
            
            $result = $conn->query("SELECT * FROM $tbl1 where qid=$qid");
          if($result->num_rows > 0)
           {
            $row = $result->fetch_assoc();
?>

	<div class="row">
      	<div class="col-xs-12 col-smx-6 col-sm-offset-1 col-md-10 col-sm-offset-1 " style="background-color:#eee;padding:20px" >
	    
      		<form action="GiveAnswer.php" method="POST">
      			
                        <div class="page-header">
                                    <h2 class="text-center" style="color:brown"><?php echo $row['question']; ?></h2>
                        </div>
      			<div class="form-group">
      					<textarea class="form-control" name="ans" rows="5" placeholder="answer"></textarea>
                        </div>
                        <input type="hidden" value=<?php echo $row['qid']; ?> name="qid" />	
      			<div class="text-center">
      					<input type="submit" id="button" name="answer" class="btn btn-success btn-lg" value="Give Answer">
      			</div>
      		</form>
	    </div>
	 </div>
      <?php 
                  } 
            }
      ?>
       </div>     	

<?php       
      if(isset($_POST['answer'])){
            saveAnswer();
      }
      function saveAnswer(){
            require "DBConnect.php";
            if(session_id() == ''){
                  session_start();
            }
            $ans = $_POST['ans'];
            $qid = $_POST['qid'];
            $user = $_SESSION['uname'];
      
            $tbl = $_SESSION['subject'].'ans';
            $query = "INSERT INTO $tbl(username,qid,answer,answered) VALUES ('$user',$qid,'$ans',NOW())";
            if($conn->query($query) === TRUE)
            {
                  
                  header("Location: Answer.php?qid=$qid");

            }
            else
                  echo "<h1 align='center'>Could Save Question</h1>";
      }
?>

<?php include("footer.php"); ?>
