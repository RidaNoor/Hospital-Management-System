<?php
include('../connection/connection.php');
	$from=$_GET['from'];
	$to=$_GET['to'];
if($_GET['test_id']!=''){
	$test_id=$_GET['test_id'];
	$selQuery="SELECT * FROM tests WHERE test_id=".$test_id." AND DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
	$selCurrency="SELECT SUM(amount) as total FROM tests WHERE test_id=".$test_id." AND DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
}
else{
	$selQuery="SELECT * FROM tests WHERE DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
	$selCurrency="SELECT SUM(amount) as total FROM tests WHERE DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
}
	$resQuery=$con->query($selQuery);
	if($resQuery->num_rows > 0){
		$tab = '<table id="test_table" align="center"><tr><th>Name</th><th>Amount</th><th>Date</th>';
		while($row=$resQuery->fetch_assoc()){
			$tab .= '<tr><td>'.$row['name'].'</td><td>'.$row['amount'].'</td><td>'.$row['date'].'</td></tr>';
		}
		$tab .= '</table>';
	}
	else{
		$tab= '<span>*No Lab Test registered Yet</span>';
	}
	$resQuery=$con->query($selCurrency);
	$res=$resQuery->fetch_assoc();
	$dat=$res['total'];
	echo $tab."|".$dat;
?>