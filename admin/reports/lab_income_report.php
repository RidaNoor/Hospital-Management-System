<?php
include("../../connection/connection.php");
?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="../../js/jquery-latest.js"></script> 

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
    border: none;
}
th{
    padding: 10px;
}
td{
	text-align:Left;
	padding-top:15;
 
 align: left;

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
    background-color:#4B75B3;
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
<h2 style="text-align:center;">Lab Income Report</h2>





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

<h2 style="text-align:center;">Lab Amount</h2>
<!-- <form action="" method="post"> -->

<h2 align="center">Today's Laboratory Amount</h2>
<table border="1" align="center">
	<tr>
		<th>Name</th>
		<th>Test Performed</th>
		<th>Total</th>
	</tr>
	<?php
	$today=date("Y-m-d");
	// $today="2016-10-15";
		$selQuery="SELECT l.test_id,l.test_name,COUNT(t.test_id) AS test_performed,SUM(t.amount) AS total FROM lab AS l INNER JOIN tests AS t ON t.test_id=l.test_id WHERE t.DATE BETWEEN '".$today." 00:00:00' AND '".$today." 23:59:59' GROUP BY l.test_id";
		// echo $selQuery;
		$resSelQuery=$con->query($selQuery);
		$check=true;
		if($resSelQuery->num_rows > 0){
			while($row=$resSelQuery->fetch_assoc()){
				if($row['test_performed'] == 0){
					$check=false;
					break;
				}
				echo '<tr><td>'.$row['test_name'].'</td><td>'.$row['test_performed'].'</td><td class="incomes">'.$row['total'].'</td></tr>';
			}
		}
		if(!$check){
			echo '<tr align="center"><td colspan="3">No Patient For Today !</td></tr>';
		}
	?>
</table>
<table>
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
				$(".incomes").each(function(){
				    total_inc += parseFloat($(this).html());
				});
				$("#total_income").html(total_inc);

				$("#profit").html(total_inc/2);
			});
	</script>


 </td>
          </tr>


                 </table>	
<br/><br/><br/>
<div id="information"></div>
<div id="fixedfooter"></div>
</body>
</html>