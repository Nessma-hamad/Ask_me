<?php 
include'conf/header.php';
include'database/database.php';
session_start();
$user=$_SESSION['user'];



//$query='SELECT * from questions where  user ='.$user;
$query="SELECT * from questions where user='".$_SESSION['user']."'";

$resulte=mysqli_query($con,$query);
$total=mysqli_num_rows($resulte);


$resulte=mysqli_fetch_all($resulte,MYSQLI_ASSOC);

//print_r($resulte);

?>

 <div class="QS">

		<label style="color: black; "><h4>Questions <?php echo $total;?> </h4></label>
		<?php foreach ($resulte as $question):?>
		<div class="Q">
			
			<form >
				<label class="q" style=""><?php echo $question['question'];?> </label>
				<?php 
					$id=$question['id'];
				?>
                
				<a class="ans" href="answer.php?id=<?php echo $id ;?>" >Answer></a>
            
			</form>
		
		  
	    </div>
	    <?php endforeach;?>
	    


	
</div>



<?php 
include'conf/footer.php';

?>
