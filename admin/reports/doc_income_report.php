<?php
include("../../connection/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title> Doctor Income Report</title>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../../js/jquery-latest.js"></script> 
</head>


<style type="text/css">
body {
	
	margin:80px 80px 100px 100px;
}
div#fixedheader {
	position:fixed;
	top:0px;
	left:0px;
	width:100%;
	color:#CCC;
	background:#4B75B3;
	padding:20px;
}
div#fixedfooter {
	position:fixed;
	bottom:0px;
	left:0px;
	width:100%;
	color:#CCC;
	background:#4B75B3;
	padding:8px;
}


table {
    border-collapse: collapse;
    border-style: hidden;
}

table td, table th {
    border:none;
}
th{
    padding: 10px;
}
td{
	text-align:Left;
	padding-top:15;
 
 

}


//

ul {
    list-style-type: none;

    width:25;
    background-color: #f1f1f1;
    position: fixed;
    
  
}

li a {
    display: block;
    color: #000;
    padding: 8px 8px;
    text-decoration: none;
}

li a.active {
    background-color: #4B75B3;
    color: white;
}

li a:hover:not(.active) {
    background-color: #4B75B3;
    color: white;
}
//
table td:last-child {
    width: 100%;
   border-left-color:#000;
}
</style>
</head>



<body id="main_body" >
	
	<div id="fixedheader"></div>

<table style="width:100%">
<tr>
<th style="width:18%"><img src="logo1.jpg" height="20%" width="100%"></th>
<th></th>
</tr>


<tr>
<td>
<ul>

  <li><a href="../lab_test_registration.php"><b>Lab Test Registration</b></a></li>
  <li><a href="../doctor_registration.php"><b>Doctor Registration</b></a></li>
  <li><a href="../expense_registration.php"><b>Expanse Registration</b></a></li>
  <li><a href="reports.php"><b>Reports</b></a></li>  
</ul>

<form action="" method="post">
    <div align="center">
      <input type="submit" name="sign_out" value="Sign Out" />
    </div>
</form>
<?php $root="../../";include($root."sign_out.php")?>

<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</td>



<td>	
<img id="top" src="top.png" alt="">

<div id="form_container">

<h1><a>Untitled Form</a></h1>
		
<form id="form_1163547" class="appnitro"  method="post" action="">
					
               <div class="form_description" align="center">
			
               <h2><b>Today's Doctor Amount</b></h2>
			

		</div>						
			
		<ul>
		<table border="1" align="center">
	<tr>
		<th>Name</th>
		<th>Patient Checked</th>
		<th>Payable Amount</th>
		<th>Total</th>
	</tr>
	<?php
	$today=date("Y-m-d");
	// $today="2016-10-15";
		$selQuery= "select p.doctor_id,d.name,count(p.name) as total_patients,SUM(d.hospital_paid) AS total_pay,SUM(d.consultancy_fee) AS total FROM patient as p inner join doctor as d on p.doctor_id=d.doctor_id where p.DATE BETWEEN '".$today." 00:00:00' AND '".$today." 23:59:59' GROUP BY p.doctor_id";
		// echo $selQuery;
		$resSelQuery=$con->query($selQuery);
		$check=true;
		if($resSelQuery->num_rows > 0){
			while($row=$resSelQuery->fetch_assoc()){
				if($row['total_patients'] == 0){
					$check=false;
					break;
				}
				echo '<tr><td>'.$row['name'].'</td><td>'.$row['total_patients'].'</td><td class="payable">'.$row['total_pay'].'</td><td class="pays">'.$row['total'].'</td></tr>';
			}
		}
		if(!$check){
			echo '<tr align="center"><td colspan="4">No Patient For Today !</td></tr>';
		}
	?>
</table>
<table>
	<tr>
		<td>Total Payable = </td>
		<td><span id="total_payable"></span></td>
	</tr>
	<tr>
		<td>Total Income = </td>
		<td><span id="total_income"></span></td>
	</tr>
	<tr>
		<td>Profit = </td>
		<td><span id="profit"></span></td>
	</tr>
</table>
	<script type="text/javascript">
		$(document).ready(
			function(){
				var total_inc=0;
				$(".pays").each(function(){
				    total_inc += parseFloat($(this).html());
				});
				$("#total_income").html(total_inc);

				var pay=0;
				$(".payable").each(function(){
				    pay += parseFloat($(this).html()); 
				});
				$("#total_payable").html(pay);

				$("#profit").html(parseFloat($("#total_income").html())-parseFloat($("#total_payable").html()));
			});
	</script>
		</ul>
		
		</form>	
               </td>
          </tr>


                      </table>	

	
<div id="fixedfooter"></div>

	
</body>


