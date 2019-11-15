<?php
include('../connection/connection.php');

	$from=$_GET['from'];
	$to=$_GET['to'];
	$selQuery="SELECT SUM(p.amount) AS docs,SUM(p.profit) AS profit FROM patient as p inner join doctor as d on p.doctor_id=d.doctor_id where p.date between '".$from." 00:00:00' and '".$to." 23:59:59'";
	$selCurrency="SELECT SUM(amount) as total FROM tests WHERE DATE BETWEEN '".$from." 00:00:00' AND '".$to." 23:59:59'";

	$resQuery=$con->query($selQuery);
	$res=$resQuery->fetch_assoc();
	$tab = $res['docs'].",".$res['profit'];
	
	$resQuery=$con->query($selCurrency);
	$res=$resQuery->fetch_assoc();
	$dat=$res['total'];
	echo $tab."|".$dat;
?>