<?php
include('../connection/connection.php');
	$from=$_GET['from'];
	$to=$_GET['to'];
if($_GET['doc']!=''){
	$doc=$_GET['doc'];
	$selQuery="select p.name,p.date,d.doctor_id FROM patient as p inner join doctor as d on p.doctor_id=d.doctor_id where d.doctor_id=".$doc." and p.date between '".$from." 00:00:00' and '".$to." 23:59:59'";
	$selCurrency="SELECT SUM(d.hospital_paid) AS docs,SUM(p.profit) AS profit FROM patient as p inner join doctor as d on p.doctor_id=d.doctor_id where d.doctor_id=".$doc." and p.date between '".$from." 00:00:00' and '".$to." 23:59:59'";
}
else{
	$selQuery="select p.name,p.date,d.doctor_id FROM patient as p inner join doctor as d on p.doctor_id=d.doctor_id where p.date between '".$from." 00:00:00' and '".$to." 23:59:59'";
	$selCurrency="SELECT SUM(d.hospital_paid) AS docs,SUM(p.profit) AS profit FROM patient as p inner join doctor as d on p.doctor_id=d.doctor_id where p.date between '".$from." 00:00:00' and '".$to." 23:59:59'";
}
	$resQuery=$con->query($selQuery);
	if($resQuery->num_rows > 0){
		$tab = '<table id="test_table" align="center"><tr><th>Name</th><th>Date</th>';
		while($row=$resQuery->fetch_assoc()){
			$tab .= '<tr><td>'.$row['name'].'</td><td>'.$row['date'].'</td></tr>';
		}
		$tab .= '</table>';
	}
	else{
		$tab= '<span>*No Test registered Yet</span>';
	}
// echo $selCurrency;	
	$resQuery=$con->query($selCurrency);
	$res=$resQuery->fetch_assoc();
	$dat=$res['docs'].",".$res['profit'];
	echo $tab."|".$dat;
?>