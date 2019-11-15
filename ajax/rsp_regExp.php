<?php
include("../connection/connection.php");
	if(isset($_POST['exp_amount'])){
		$insExpRegQuery="INSERT INTO expanse_reg(expanse_ctgy,expanse_title,expanse_amount) VALUES (".$_POST['exp_cat'].",'".$_POST['exp_title']."',".$_POST['exp_amount'].")";
		$resInsExpReg=$con->query($insExpRegQuery);
		if($resInsExpReg){
			echo "success";
		}
		else{
			echo "failure";
		}
	}
	elseif(isset($_POST['exp_id'])){
		$updateExpQuery="UPDATE expanse SET expanse_ctgy='".$_POST['exp_cat']."' WHERE ctgy_id=".$_POST['exp_id'];
		$resUpdateExpQuery=$con->query($updateExpQuery);
		if($resUpdateExpQuery){
			echo "success";
		}
		else{
			echo "failure";
		}
	}
	else{
		$insExpQuery="INSERT INTO expanse(expanse_ctgy) VALUES ('".$_POST['exp_cat']."')";
		$resInsExp=$con->query($insExpQuery);
		if($resInsExp){
			echo "success";
		}
		else{
			echo "failure";
		}
	}

	// if(isset($_POST['exp_amount']))
?>