<?php
include("../../connection/connection.php");
?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>

<script type="text/javascript" src="../../js/jquery-latest.js"></script> 
	<link rel="stylesheet" href="../../css/base/jquery.ui.all.css">
	<script src="../../js/jquery.ui.core.js"></script>
	<script src="../../js/jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="../../css/custom.css"/>
	<script type="text/javascript">
	$(function() {
		$( ".datepicker" ).datepicker({
		dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
	
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

<body id="main_body" >

<h2 style="text-align:center;">Reports</h2>





<div id="fixedheader"></div>

<table style="width:100%">
<tr>
<th style="width:80%%"><img src="logo1.jpg" height="20%"></th>

</tr>

<tr>

<td>	
<img id="top" src="top.png" alt="">

<div id="form_container">




<ul>
	<li><a href="doctors_report.php">Doctor Report</a></li>
	<li><a href="expanse_report.php">Expanse Report</a></li>
	<li><a href="lab_report.php">Lab Report</a></li>
	<li><a href="profit.php">Profit</a></li>
	<li><a href="doc_income_report.php">Doctor's Today Income Report</a></li>
	<li><a href="lab_income_report.php">Laboratory's Income Report</a></li>
	<li><a href="todays_patient_history.php">Today's Patient History</a></li>
	<li><a href="todays_income.php">Today's Income</a></li>
</ul>

</td></tr></table>
<div id="fixedfooter"></div>
</body>
</html>