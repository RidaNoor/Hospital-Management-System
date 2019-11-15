<?php
include('../connection/connection.php');
	$from=$_GET['from'];
	$to=$_GET['to'];
if($_GET['exp_cat']!=''){
	$exp_cat=$_GET['exp_cat'];
	$selQuery="SELECT er.expanse_title as title,er.expanse_amount as amount,er.DATE as date FROM expanse_reg AS er INNER JOIN expanse AS e ON er.expanse_ctgy=e.ctgy_id WHERE e.ctgy_id=".$exp_cat." AND er.DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
	$selCurrency="SELECT SUM(er.expanse_amount) AS total FROM expanse_reg AS er INNER JOIN expanse AS e ON er.expanse_ctgy=e.ctgy_id WHERE e.ctgy_id=".$exp_cat." AND er.DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
}
else{
	$selQuery="SELECT er.expanse_title as title,er.expanse_amount as amount,er.DATE as date FROM expanse_reg AS er INNER JOIN expanse AS e ON er.expanse_ctgy=e.ctgy_id WHERE er.DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
	$selCurrency="SELECT SUM(er.expanse_amount) AS total FROM expanse_reg AS er INNER JOIN expanse AS e ON er.expanse_ctgy=e.ctgy_id WHERE er.DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";
}
	$resQuery=$con->query($selQuery);
	if($resQuery->num_rows > 0){
		$tab = '<table id="test_table" align="center"><tr><th>Name</th><th>Amount</th><th>Date</th>';
		while($row=$resQuery->fetch_assoc()){
			$tab .= '<tr><td>'.$row['title'].'</td><td>'.$row['amount'].'</td><td>'.$row['date'].'</td></tr>';
		}
		$tab .= '</table>';
	}
	else{
		$tab= '<span>*No Test registered Yet</span>';
	}
	
	$resQuery=$con->query($selCurrency);
	$res=$resQuery->fetch_assoc();
	$dat=$res['total'];
	echo $tab."|".$dat;
?>