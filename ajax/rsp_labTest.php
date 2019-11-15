<?php
include('../connection/connection.php');
if(empty($_POST)){
	$id=$_GET['id'];
	$selQuery="SELECT * FROM patient where patient_id='".$id."'";
	$resSel=$con->query($selQuery);
	$row=$resSel->fetch_assoc();
	echo $row['name'].",".$row['age'].",".$row['father_name'].",".$row['cell_no'].",".$row['address'].",".$row['doctor_id'].",".$row['dieses'];
}

if(isset($_POST['pt_id'])){
	$check="";

		$test_id=$_POST['pt_test'];
		$name=$_POST['pt_name'];
		$pt_address=$_POST['pt_address'];
		$pt_phone=$_POST['pt_phone'];
		$parent=$_POST['pt_ws'];
		$pt_age=$_POST['pt_age'];
		$pt_doc=$_POST['pt_doc'];
		$disease=$_POST['pt_dis'];
		$getAmountQuery="SELECT consultancy_fee,hospital_paid FROM doctor WHERE doctor_id=".$pt_doc;
		$resGetAmount=$con->query($getAmountQuery);
		$resAmount=$resGetAmount->fetch_assoc();
		$profit=$resAmount['consultancy_fee']-$resAmount['hospital_paid'];
	if($_POST['pt_id']!='undefined'){
		$selData="SELECT amount FROM lab WHERE test_id=".$_POST['pt_test'];
		$resData=$con->query($selData);
		$res=$resData->fetch_assoc();
		$amount=$res['amount'];
		$patient_id=$_POST['pt_id'];
		// error_log($patient_id." = ".$amount);
		$insQuery="INSERT INTO `tests`(`patient_id`,`test_id`,`name`,`age`,`father_name`,`address`,`doctor`,`dieses`,`cell_no`,`amount`) VALUES ( '".$patient_id."',".$test_id.",'".$name."',".$pt_age.",'".$parent."','".$pt_address."',".$pt_doc.",'".$disease."','".$pt_phone."','".$amount."')";
		$res=$con->query($insQuery);
		if($res){
			$updQuery="UPDATE `patient` SET `amount` = `amount` + ".$amount.",`profit` = `profit` + ".$profit." WHERE `patient_id` = ".$patient_id;
			// echo $updQuery;die;
			$resUpd=$con->query($updQuery);
			if($resUpd){
			$selQuery="SELECT t.NAME AS patient_name,t.age,t.father_name,t.address,t.cell_no,d.NAME AS doctor_name,t.dieses,t.patient_id,t.unique_id FROM tests AS t INNER JOIN doctor AS d ON t.doctor=d.doctor_id order by t.date desc";
              $result=$con->query($selQuery);
              $data=$result->fetch_assoc();
						$res='<h2 align="center">Waleed Hospital</h2>';
						$res .= '<p>Name <u>'.$data['patient_name'].'</u> Age <u>'.$data['age'].'</u> S/O W/O <u>'.$data['father_name'].'</u> Cell No <u>'.$data['cell_no'].'</u><br/>';
			            $res .= 'Address <u>'.$data['address'].'</u> <br/>Doctor <u>'.$data['doctor_name'].'</u> Dieses <u>'.$data['dieses'].'</u> ID <u>'.$patient_id.'</u><br/>
			             <br/><br/><br/><br/><br/><br/><br/><br/>
			              <div>                
			                <div style="float:left;width:50%;">Unique ID  '.$data['unique_id'].'</div>
			                <div align="right" style="float:right;width:50%;">Total Fee: Rs '.$amount.'</div>
			              </div>
			              <div style="clear:both;"></div>
			           </p>';
			           $check=$res;
			}
			else
				$check="failure";
		}
	}
	else{
		$today=date('ymd');
				$selData="SELECT amount FROM lab WHERE test_id=".$_POST['pt_test'];
		$resData=$con->query($selData);
		$res=$resData->fetch_assoc();
		$amount=$res['amount'];

					$pt_name=$_POST['pt_name'];
					$pt_age=$_POST['pt_age'];
					$pt_address=$_POST['pt_address'];
					$pt_doc=$_POST['pt_doc'];
					$pt_dis=$_POST['pt_dis'];
					$pt_ws=$_POST['pt_ws'];
					$pt_phone=$_POST['pt_phone'];


				$selData="SELECT count(*) as total_test FROM tests";
		$resData=$con->query($selData);
		$res=$resData->fetch_assoc();
		$id=$res['total_test']+1;

		$test_id=$_POST['pt_test'];
		$name=$_POST['pt_name'];
		$parent=$_POST['pt_ws'];
		$pt_age=$_POST['pt_age'];
		$doctor=$_POST['pt_doc'];
		$disease=$_POST['pt_dis'];
					
					$insQuery="INSERT INTO `tests`(`patient_id`,`test_id`,`name`,`age`,`father_name`,`address`,`doctor`,`dieses`,`cell_no`,`amount`) VALUES ( '".$id."',".$test_id.",'".$name."',".$pt_age.",'".$parent."','".$pt_address."',".$doctor.",'".$disease."','".$pt_phone."','".$amount."')";
					$res=$con->query($insQuery);

					if($res){
						$selQuery="SELECT t.NAME AS patient_name,t.age,t.father_name,t.address,t.cell_no,d.NAME AS doctor_name,t.dieses,t.patient_id,t.unique_id FROM tests AS t INNER JOIN doctor AS d ON t.doctor=d.doctor_id order by t.date desc";
              			$result=$con->query($selQuery);
              			$data=$result->fetch_assoc();
						$res='<h2 align="center">Waleed Hospital</h2>';
						$res .= '<p>Name <u>'.$data['patient_name'].'</u> Age <u>'.$data['age'].'</u> S/O W/O <u>'.$data['father_name'].'</u> Cell No <u>'.$data['cell_no'].'</u><br/>';
			            $res .= 'Address <u>'.$data['address'].'</u> <br/>Doctor <u>'.$data['doctor_name'].'</u> Dieses <u>'.$data['dieses'].'</u> ID <u>'.$data['unique_id'].'</u><br/>
			             <br/><br/><br/><br/><br/><br/><br/><br/>
			              <div>                
			                <div style="float:left;width:50%;">Unique ID  '.$data['unique_id'].'</div>
			                <div align="right" style="float:right;width:50%;">Total Fee: Rs '.$amount.'</div>
			              </div>
			              <div style="clear:both;"></div>
			           </p>';
			           $check=$res;
					}
					else
						$check = "failure";
	}

	echo $check;
}
?>