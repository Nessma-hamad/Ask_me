<?php 
include'conf/header.php';
include'database/database.php';

if (isset($_POST['submit'])) 
{
	$answer= $_POST['answer'];
	$que_id=$_GET['id'];

	$query="SELECT que_id from answers ";
	$ids=mysqli_query($con,$query);
	$ids=mysqli_fetch_all($ids,MYSQLI_ASSOC);

	foreach ($ids as $key ) 
	{
		if ($que_id==$key['que_id']) 
		{
			$query="UPDATE answers
			         set answer= '$answer'
    				 where que_id=
			         ".$que_id;
			$insert=mysqli_query($con,$query);

            
			         
		}

		
	}
	$foun=0;
	foreach ($ids as $key ) 
	{
		
		if ($que_id!=$key['que_id'])
		{
          $foun=0;
		}
		else
	    {
			$foun=1;
			header("location:question.php");
			exit();
		}

	

	}

	if ($foun==0)
    {
		$query="INSERT INTO answers(que_id,answer) VALUES ('$que_id','$answer') ";

	$insert=mysqli_query($con,$query);

	$query="UPDATE questions
			         set answerd= 1
    				 where id=".$que_id
			         ;
	$insert=mysqli_query($con,$query);

	
    }
	

	
header("location:question.php");
}




$id=$_GET['id'];


echo $_GET['id'];



$query='SELECT question from questions where id='.$id;
$resulte=mysqli_query($con,$query);

$resulte=mysqli_fetch_assoc($resulte);



?>
<div class="answer_blok">
		<form method="post">
			<label  ><h3><?php echo $resulte['question']; ?></h3></label>
			<br>
			<textarea class="yourans" name="answer"></textarea>
			<br>
			<input type="submit" name="submit" class="ans_btu" value="Answer" >
			<input type="hidden" name="id" value="<?php echo $_GET['id'] ;?>">
			
		</form>
		
	</div>



<?php 
include'conf/footer.php';

?>