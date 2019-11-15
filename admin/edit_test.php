<?php
include("../connection/connection.php");
$selQuery="SELECT * FROM lab WHERE test_id=".$_GET['id'];
$resSelQuery=$con->query($selQuery);
$row=$resSelQuery->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title> Edit Expanse </title>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>
	<link rel="stylesheet" href="../css/custom.css"/>

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
	<!-- Importing js -->
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/additional-methods.js"></script>

	 <script>
		$(document).ready(function(){
		var test_name=$("#test_name").val();
		var test_amount=$("#test_amount").val();
		
		// Validating main form
			$("#insertForm").validate({
		// Defining Rules
				rules:{
					test_name:"required",
					test_amount:"required"
				},
		// Defining Messages
				messages:{
					test_name:"Please Enter name",
					test_amount:"Please Enter Age"
				}
			});
		});
	 </script>
	 <script type="text/javascript">
	  function getConfirmation(test_name,test_amount,test_notes,test_id){
               var retVal = confirm("Are you sure you entered correct data ?");
               if( retVal == true ){
                  insertData(test_name,test_amount,test_notes,test_id);
                  return true;
               }
               else{
                  return false;
               }
            }
function insertData(test_name,test_amount,test_notes,test_id){
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            if(xmlhttp.responseText=="success"){
				      alert("Test Information Updated Successfully");
              window.parent.document.getElementById('content').src ='lab_test_registration.php';
            }
            else{
            	alert("Unfortunately Test didn't registered");
            }
        }
    };
    xmlhttp.open("POST","<?php echo '../ajax/rsp_regTest.php'; ?>",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	values="test_name="+test_name+"&test_amount="+test_amount+"&test_notes="+test_notes+"&test_id="+test_id;
    xmlhttp.send(values);
  }
     </script>
</head>




<bodyid="main_body">

<div id="fixedheader"></div>

<table style="width:100%">
<tr>
<th style="width:18%"><img src="logo1.jpg" height="20%"></th>
<th></th>
</tr>

<tr>

<td>
<ul>
  <li><a href="lab_test_registration.php"><b>Lab Test Registration</b></a></li>
  <li><a href="doctor_registration.php"><b>Doctor Registration</b></a></li>
  <li><a href="expense_registration.php"><b>Expanse Registration</b></a></li>
  <li><a href="reports/reports.php"><b>Reports</b></a></li>
</ul>
<form action="" method="post">
    <div align="center">
      <input type="submit" name="sign_out" value="Sign Out" />
    </div>
</form>
<?php $root="../";include($root."sign_out.php")?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</td>


<td>	
<img id="top" src="top.png" alt="">

<div id="form_container">

<h1><a>edit test</a></h1>


<!-- Main Form Starts -->
  <form action="" method="post" id="insertForm">
    <table>
      <tr align="center">
        <td colspan="4" class="heading"><h2>Update Registered Test</h2></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td>
        <input type="hidden" id="test_id" name="test_id" value="<?php echo $_GET['id'];?>"/>
        	<input type="text" name="test_name" id="test_name" class="form-control" value="<?php echo $row['test_name'];?>" /></td>
      	<td>Amount:</td>
        <td><input type="number" name="test_amount" id="test_amount" class="form-control" value="<?php echo $row['amount'];?>"/></td>
      </tr>
      <tr>
        <td>Note</td>
        <td colspan="3">
          <textarea id="test_notes" name="test_notes" rows="3" cols="50"><?php echo $row['note'];?></textarea>
        </td>
      </tr>
      <tr>
      	<td colspan="4" style="text-align:right;">
      		<input type="submit" value="Update Test" name="update_test" id="update_test"/>
      	</td>
      </tr>
    </table>
  </form>
  
  
  
  </div>
  
</div>
</body>
</html>
  <?php
			if(isset($_POST['update_test'])){
            	echo '<script>getConfirmation("'.$_POST['test_name'].'","'.$_POST['test_amount'].'","'.$_POST['test_notes'].'",'.$_POST['test_id'].')</script>';
			}
  ?>
