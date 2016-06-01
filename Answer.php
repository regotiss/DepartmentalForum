<?php
	if(isset($_GET['qid'])){
		if(session_id() == ''){
           session_start();
        }
		$qid=$_GET['qid'];
		require "DBConnect.php";
		$tbl1 = $_SESSION['subject']."que";
		$tbl2 = $_SESSION['subject']."ans";
		$result = $conn->query("SELECT * FROM $tbl1 where qid=$qid");
	    if($result->num_rows > 0)
	     {
	     	$row = $result->fetch_assoc();
?>
<?php include("header.php"); ?> 

	<div class="row">
      	<div class="col-xs-12 col-smx-6 col-sm-offset-1 col-md-10 col-sm-offset-1 " style="background-color:#eee;padding:20px" >
	    	<form action="GiveAnswer.php">
      			<div class="text-center">
      					<input type="hidden" value=<?php echo $_GET['qid']; ?> name="qid" />
      					<input type="submit" id="button" name="answer" class="btn btn-success btn-lg" value="Post Answer">
      			</div>
      		</form>
      		<ul class="subjects">
		    	<li><label style="width:100%;margin-left:20px;">
		    		<div >
		    			Question : <?php echo $row['question']; ?>
		    		</div>

		    	</label>
		    		<h4 align="right">Asked By : <b><?php echo $row['username']; ?> </b>
		    			Asked On : <?php echo $row['asked']; ?></br></h4>
		    		<ul>
		   			<?php 
		    			$result1 = $conn->query("SELECT * FROM $tbl2 where qid=$qid");
						if($result1->num_rows > 0)
						{
						    while($row1 = $result1->fetch_assoc()){

		    			?>
		    			<li><div class="ans">
		   					User : <?php echo $row1['username']; ?><br>
		   					Date and Time : <?php echo $row1['answered']; ?><br>
		    				Answer : <p><?php echo $row1['answer']; ?></p>
		    			</div></li>
		    			<?php }  
		    				}
		    			?>
		    		</ul>
		    	</li>

	    	</ul>
	    </div>
	    <?php } 
			}
	    ?>
	 </div>	
<?php include("footer.php"); ?>