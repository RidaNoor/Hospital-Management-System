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
<h2 style="text-align:center;">Today's Expanse</h2>





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

<h2 style="text-align:center;">Doctor's Amount</h2>
<!-- <form action="" method="post"> -->
<h1 align="center">Today's Income</h1>
<div style="text-align:center;">
<h2 align="center">Doctor's Income</h2>
	<?php
	$today=date("Y-m-d");
	// $today="2016-10-15";
		$selQuery="SELECT SUM(d.hospital_paid) AS doctor_income FROM patient AS p INNER JOIN doctor AS d ON p.doctor_id=d.doctor_id WHERE p.DATE BETWEEN '".$today." 00:00:00' AND '".$today." 23:59:59'";
		// echo $selQuery;
		$resSelQuery=$con->query($selQuery);
			$row=$resSelQuery->fetch_assoc();
			$val=0;
			if($row['doctor_income']!=""){
				$val=$row['doctor_income'];
			}
			echo '<input align="center" type="text" readonly="true" value="'.$val.'"/>';
	?>
</div>
<div style="text-align:center;">
	
<h2 align="center">Laboratory's Income</h2>
	<?php
		$selQuery="SELECT SUM(amount) AS lab_income FROM tests WHERE DATE BETWEEN '".$today." 00:00:00' AND '".$today." 23:59:59'";
		// echo $selQuery;
		$resSelQuery=$con->query($selQuery);
			$row=$resSelQuery->fetch_assoc();
			$val=0;
			if($row['lab_income']!=""){
				$val=$row['lab_income'];
			}
			echo '<input align="center" type="text" readonly="true" value="'.$val.'"/>';
	?>
</div>


 </td>
          </tr>


                 </table>	
<br/><br/><br/>
<div id="information"></div>
<div id="fixedfooter"></div>
</body>
</html>