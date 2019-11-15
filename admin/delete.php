<?php
include('../connection/connection.php');
if(isset($_GET['test_id'])){
	$delQuery="DELETE FROM lab WHERE test_id=".$_GET['test_id'];
	$resQuery=$con->query($delQuery);
	if($resQuery){
		echo "<script>alert('Test Deleted Successfully !');location.href='lab_test_registration.php';</script>";
	}
}

if(isset($_GET['doc_id'])){
	$delQuery="DELETE FROM doctor WHERE doctor_id=".$_GET['doc_id'];
	$resQuery=$con->query($delQuery);
	if($resQuery){
		echo "<script>alert('Doctor\'s Information Deleted Successfully !');location.href='doctor_registration.php';</script>";
	}
}

if(isset($_GET['exp_id'])){
	$delQuery="DELETE FROM expanse WHERE ctgy_id=".$_GET['exp_id'];
	$resQuery=$con->query($delQuery);
	if($resQuery){
		echo "<script>alert('Expanse\'s Information Deleted Successfully !');location.href='expanse_registration.php';</script>";
	}
}
?>