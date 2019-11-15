<?php
include("../../connection/connection.php");
?>
<!DOCTYPE html>
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
	
	<script type="text/javascript">
		function search(){
			var from=$("#from").val();
			var to=$("#to").val();
			getData(from,to);
		}
		function getData(from,to){
		$.ajax(
			{
				async: false,
				url: "../../ajax/rsp_getProfit.php",
				data: "from="+from+"&to="+to,
				success: function(result){
					parts=result.split("|");
					subparts=parts[0].split(",");
        			$("#income").html(subparts[0]);
        			$("#profit").html(subparts[1]);
        			$("#total").html(parts[1]);
        			// console.log(result);
    			}
    		}
    	);
	}
	</script>
	
</head>
<body id="main_body" >
<h2 style="text-align:center;">Profit</h2>





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

<h2 style="text-align:center;">Profit</h2>
<!-- <form action="" method="post"> -->
<table align="center">
	<tr>
			<td>From:</td>
			<td><input type="text" required="required" class="datepicker" name="from" id="from"/></td>
			<td>To:</td>
			<td><input type="text" required="required" class="datepicker" name="to" id="to"/></td>
	</tr>
	<tr>
		<td colspan="4" style="text-align:center;"><input type="button" value="Search" onclick="search()" name="search" /></td>
	</tr>
</table>

<h2 align="center">Doctors</h2>
<table border="1" align="center">
	<tr>
		<td>Income</td>
		<td><span id="income"></span></td>
	</tr>
	<tr>
		<td>Profit</td>
		<td><span id="profit"></span></td>
	</tr>
</table>

 </td>
          </tr>


                 </table>	
<br/><br/><br/>
<div id="information"></div>
<div id="fixedfooter"></div>
</body>
</html>