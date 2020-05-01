<?php 
include'conf/header.php';
include'database/database.php';

//echo $_POST['ask'];
session_start();
$user=$_SESSION['user'];
if (isset($_POST['ask'])) 
{
	$que=$_POST['que'];

	$query="INSERT into questions(question,user) VALUES ('$que','$user')";
	$insert=mysqli_query($con,$query);
}

$query="SELECT * from questions where user='".$_SESSION['user']."'";

$resulte=mysqli_query($con,$query);


$resulte=mysqli_fetch_all($resulte,MYSQLI_ASSOC);



$query='SELECT * from answers ';

$answers=mysqli_query($con,$query);


$answers=mysqli_fetch_all($answers,MYSQLI_ASSOC);

 /*echo $_GET['id'];
 if (isset($_POST['delete'])) 
 {
 	$id=$_GET['id'];

 	$query='DELETE FROM answers where que_id ='.$id;
 	$delete=mysqli_query($con,$query);

 	$query="UPDATE questions
	       set answerd=0
           where id=".$id;
	$insert=mysqli_query($con,$query);
	<a class="ans"  href="home.php?id=<?php echo $question['id'];?>" name="delete"> Delete</a>

 	
 }*/






?>


	<div class="box">
	    <div class="forent" style="background-image: url('h.jpg');">
	    	<div class="info">
				<img src="asd.jpg" class="profile_pic">
				
		        <label class="username"><?php echo $_SESSION['user']; ?></label> 
	        </div>
		</div>
		
		<div class="ask">
			<form class="ask_form" method="post">
				<label ><h5>Ask</h5></label>
				
				<textarea class="textarea_ask" maxlength="300" name="que" ></textarea>
				
				<input class="ask_btu" type="submit" name="ask" value="Ask">
			</form>
			
		</div>

		<?php foreach ($resulte as $question):?>
		<?php if($question['answerd']==1):?>
				

		<div class="question" style="height: auto;">
			<form>
				<label class="que" style="color:black;"><?php
				{
					echo $question['question'];
			    }
				?></label>
				<br>
				<br>
				<label  class="answer" style="color: black;">
					<?php 
					foreach ($answers as $key) 
					{if ($key['que_id']==$question['id']) 
						{
							echo $key['answer'];
						}
					};

					?>
				</label>

				
			</form>
			
		</div>
		<?php endif;?>
		<?php endforeach;?>
	</div>
	
 <?php 
include'conf/footer.php';

?>




