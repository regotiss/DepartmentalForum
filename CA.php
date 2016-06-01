<?php include("header.php"); ?> 
<?php

      if(session_id() == ''){
           session_start();
      }
	$_SESSION['subject']="ca";
      require "DBConnect.php";
      $result = $conn->query("SELECT * FROM caque");
      
?>
	<div class="row">
      	<div class="col-xs-12 col-smx-6 col-sm-offset-1 col-md-10 col-sm-offset-1 " style="background-color:#eee;padding:20px" >
	    
      		<form action="AskQue.php" method="POST">

      			<div class="text-center">
      					<input type="submit" id="button" name="submit" class="btn btn-success btn-lg" value="Ask Question">
      			</div>
      		</form>
                  <?php if($result->num_rows > 0)
                  { 
                  ?>
                  <table class="table">
                        <tr>
                              <th>Que ID</th>
                              <th>Asked By</th>
                              <th>Asked</th>
                              <th>Question</th>
                              <th>Show Ans</th>
                        </tr>

                        <?php while($row = $result->fetch_assoc()) { ?>
                              <form action="Answer.php">       
                                    <tr>
                                          <td><?php echo $row['qid']; ?></td>
                                          <td><?php echo $row['username']; ?></td>
                                          <td><?php echo $row['question']; ?></td>
                                          <td><?php echo $row['asked']; ?></td>
                                          <td>
                                                <input type="hidden" value=<?php echo $row['qid']; ?> name="qid" />
                                                <input type="submit" id="button" name="more" class="btn btn-success btn-lg" value="More"></td>
                                    </tr>      
                              </form>
                        <?php } 
                        }
                        ?>
                  </table>          
	    </div>

	 </div>	
<?php include("footer.php"); ?>