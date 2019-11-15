<?php
include("../connection/connection.php");
$today=date('ymd');
				// When Register button is press
				//|| $_POST['pt_doc']==""
					$idQuery="SELECT * FROM tb_today where today_date='$today'";
					$resIdQuery=$con->query($idQuery);
					if($resIdQuery->num_rows == 0){
						// echo "Inside Rows check<br/>";
						$todayInsertQuery="INSERT INTO tb_today(today_date,today_seq) VALUES('$today',0)";
						$resInsertQuery=$con->query($todayInsertQuery);
						$today_id=0;
					}
					else
					{
						$resId=$resIdQuery->fetch_assoc();
						$today_id=$resId['today_seq'];
					}
					$pt_name=$_POST['pt_name'];
					$pt_age=$_POST['pt_age'];
					$pt_address=$_POST['pt_address'];
					$pt_doc=$_POST['pt_doc'];
					// $pt_doc=1;
					$pt_dis=$_POST['pt_dis'];
					$pt_ws=$_POST['pt_ws'];
					$pt_phone=$_POST['pt_phone'];
					// echo "Today Id : ".$today_id;
					$today_id+=1;
					$id=$today.$today_id;
					$getAmountQuery="SELECT consultancy_fee,hospital_paid FROM doctor WHERE doctor_id=".$pt_doc;
					$resGetAmount=$con->query($getAmountQuery);
					$res=$resGetAmount->fetch_assoc();
					$amount=500+$res['consultancy_fee'];
					$profit=$res['consultancy_fee']-$res['hospital_paid'];
					// echo "Patient Id : ".$id;
					$insertPatientQuery="INSERT INTO `patient`(`patient_id`,`today_id`,`name`,`age`,`father_name`,`cell_no`,`address`,`doctor_id`,`dieses`,`amount`,`profit`) VALUES ( '".$id."','".$today_id."','".$pt_name."','".$pt_age."','".$pt_ws."','".$pt_phone."','".$pt_address."','".$pt_doc."','".$pt_dis."',".$amount.",".$profit.");";
					$resPatientQuery=$con->query($insertPatientQuery);

						$sqlGetLast="SELECT * FROM patient order by date desc";
						$getLast=$con->query($sqlGetLast);
						$resGetLast=$getLast->fetch_assoc();
              			$pt_id=$resGetLast['patient_id'];

					if($resPatientQuery){
						$updateTodayQuery="UPDATE tb_today SET `today_seq`=".$today_id." WHERE `today_date`=".$today;
						$resUpdate=$con->query($updateTodayQuery);
								$res='<h2 align="center">Waleed Hospital</h2>';
						// echo "success";
              // echo $selQuery;
				$selQuery="SELECT p.name as patient_name,p.age,p.father_name,p.address,p.cell_no,d.name as doctor_name,p.dieses,p.today_id FROM patient as p INNER JOIN doctor as d on p.doctor_id=d.doctor_id WHERE patient_id=".$pt_id;
              $result=$con->query($selQuery);
              $data=$result->fetch_assoc();
            $res .= '<p>Name <u>'.$data['patient_name'].'</u> Age <u>'.$data['age'].'</u> S/O W/O <u>'.$data['father_name'].'</u> Cell No <u>'.$data['cell_no'].'</u><br/>';
            $res .= 'Address <u>'.$data['address'].'</u> <br/>Doctor <u>'.$data['doctor_name'].'</u> Dieses <u>'.$data['dieses'].'</u> ID <u>'.$data['today_id'].'</u><br/>
             <br/><br/><br/><br/><br/><br/><br/><br/>
              <div>                
                <div style="float:left;width:50%;">Unique ID  '.$pt_id.'</div>
                <div align="right" style="float:right;width:50%;">Total Fee: Rs 500</div>
              </div>
              <div style="clear:both;"></div>
           </p>';
           echo $res;
					}
					else{
						echo "failure";
					}
?>