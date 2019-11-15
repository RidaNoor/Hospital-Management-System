<?php
include('../connection/connection.php');
if(isset($_POST)){
	if(isset($_POST['doc_id'])){
		$doc_name=$_POST['doc_name'];
		$doc_phone=$_POST['doc_phone'];
		$doc_address=$_POST['doc_address'];
		$doc_consult=$_POST['doc_consult'];
		$doc_visit=$_POST['doc_visit'];
		$doc_hos=$_POST['doc_hos'];
		$doc_qual=$_POST['doc_qual'];
		$doc_id=$_POST['doc_id'];

		$selQuery="UPDATE doctor SET `name`='".$doc_name."',`cell_no`='".$doc_phone."',`address`='".$doc_address."',`qualification`='".$doc_qual."',`visit_days`=".$doc_visit.",`consultancy_fee`='".$doc_consult."',`hospital_paid`='".$doc_hos."' WHERE `doctor_id`=".$doc_id;
		$resSel=$con->query($selQuery);
		if($resSel)
			echo "success";
		else{
			echo "failure";
		}
	}
	else{
		$doc_name=$_POST['doc_name'];
		$doc_phone=$_POST['doc_phone'];
		$doc_address=$_POST['doc_address'];
		$doc_consult=$_POST['doc_consult'];
		$doc_visit=$_POST['doc_visit'];
		$doc_hos=$_POST['doc_hos'];
		$doc_qual=$_POST['doc_qual'];

		$selQuery="INSERT INTO doctor(name,cell_no,address,qualification,visit_days,consultancy_fee,hospital_paid) VALUES('".$doc_name."','".$doc_phone."','".$doc_address."','".$doc_qual."',".$doc_visit.",".$doc_consult.",".$doc_hos.")";
		$resSel=$con->query($selQuery);
		if($resSel)
			echo "success";
		else{
			echo "failure";
		}
	}
}

?>