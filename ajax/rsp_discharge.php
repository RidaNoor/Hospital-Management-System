<?php
include('../connection/connection.php');

if(empty($_POST)){
	$id=$_GET['id'];
	$selQuery="SELECT `date` FROM patient where patient_id='".$id."'";
	$resSel=$con->query($selQuery);
	$row=$resSel->fetch_assoc();
	echo $row['date'];
}

if(isset($_POST['pt_id'])){
	$pt_id=$_POST['pt_id'];

	$selQuery="SELECT amount FROM patient where patient_id='".$pt_id."'";
	$resSel=$con->query($selQuery);
	$row= $resSel->fetch_assoc();

	$admission_date=$_POST['adm_date'];
	$dis_date=$_POST['dis_date'];
	$date=date("Y-m-d");
	$amount=$row['amount'];

	$insQuery="INSERT INTO discharge(patient_id,amount,admission_date,discharge_date,DATE) VALUES (".$pt_id.",".$amount.",'".$admission_date."','".$dis_date."','".$date."')";
	$sqlIns=$con->query($insQuery);
	if($sqlIns){
		// echo "success";
		$res='<h2 align="center">Waleed Hospital</h2>';
              $selQuery="SELECT p.patient_id,p.NAME AS patient_name,p.age,p.father_name,p.cell_no,p.address,d.NAME AS doctor_name,p.dieses,ds.admission_date,ds.discharge_date,ds.amount FROM patient AS p INNER JOIN doctor AS d ON d.doctor_id=p.doctor_id INNER JOIN discharge AS ds ON ds.patient_id=p.patient_id where p.patient_id=".$pt_id;
              // echo $selQuery;
              $result=$con->query($selQuery);
              $data=$result->fetch_assoc();
            $res .= '<p>Name <u>'.$data['patient_name'].'</u> Age <u>'.$data['age'].'</u> S/O W/O <u>'.$data['father_name'].'</u> Cell No <u>'.$data['cell_no'].'</u><br/>';
            $res .= 'Address <u>'.$data['address'].'</u> <br/>Doctor <u>'.$data['doctor_name'].'</u> Dieses <u>'.$data['dieses'].'</u> Admission Date <u>'.$data['admission_date'].'</u> Discharge Date <u>'.$data['discharge_date'].'</u><br/>
              <br/><br/>
              Comments: <u>'.$_POST['dis_com'].'</u><br/><br/><br/><br/><br/><br/><br/><br/><br/>
              <div>                
                <div style="float:left;width:50%;">Unique ID  '.$data['patient_id'].'</div>
                <div align="right" style="float:right;width:50%;">Total Fee: Rs '.$data['amount'].'</div>
              </div>
              <div style="clear:both;"></div>
           </p>';
           echo $res;
	}
	else{
		echo "failure";
	}
}
?>