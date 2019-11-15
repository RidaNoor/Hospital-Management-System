<?php
include('../connection/connection.php');
if(isset($_POST)){
	if(isset($_POST['test_id'])){
		$test_name=$_POST['test_name'];
		$test_amount=$_POST['test_amount'];
		$test_notes=$_POST['test_notes'];
		$test_id=$_POST['test_id'];
		$selQuery="UPDATE lab SET test_name='".$test_name."',amount=".$test_amount.",note='".$test_notes."' WHERE test_id=".$test_id;
		$resSel=$con->query($selQuery);
		if($resSel)
			echo "success";
		else{
			echo "failure";
		}
	}
	else{
		$test_name=$_POST['test_name'];
		$test_amount=$_POST['test_amount'];
		$test_notes=$_POST['test_notes'];

		$selQuery="INSERT INTO lab(test_name,amount,note) VALUES('".$test_name."',".$test_amount.",'".$test_notes."')";
		$resSel=$con->query($selQuery);
		if($resSel)
			echo "success";
		else{
			echo "failure";
		}
	}
}

?>