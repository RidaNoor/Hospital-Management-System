<?php
include("../connection/connection.php");
$selDoc="SELECT * FROM doctor WHERE doctor_id=".$_GET['id'];
$resQuery=$con->query($selDoc);
$row=$resQuery->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Editing Registration Form</title>
	<link rel="stylesheet" href="../css/custom.css"/>
	
	<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>

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
    border: 1px solid white;
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
	<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/additional-methods.js"></script>

	 <script>
		$(document).ready(function(){
		var doc_name=$("#doc_name").val();
		var doc_phone=$("#doc_phone").val();
    var doc_address=$("#doc_address").val();
    var doc_consult=$("#doc_consult").val();
    var doc_visit=$("#doc_visit").val();
    var doc_hos=$("#doc_hos").val();
    var doc_qual=$("#doc_qual").val();
		// Validating main form
			$("#insertForm").validate({
		// Defining Rules
				rules:{
          doc_name:"required",
          doc_phone:"required",
          doc_address:"required",
          doc_consult:"required",
          doc_visit:"required",
          doc_hos:"required",
          doc_qual:"required"
				},
		// Defining Messages
				messages:{
          doc_name:"Enter Doctor Name",
          doc_phone:"Enter Phone Number",
          doc_address:"Enter Doctor's Address",
          doc_consult:"Enter Consultancy Fee",
          doc_visit:"Enter Visit Days",
          doc_hos:"Enter Hospital Paid Fee",
          doc_qual:"Enter Doctor's Qualification"
				}
			});
		});
	 </script>
	 <script type="text/javascript">
	  function getConfirmation(doc_name,doc_phone,doc_address,doc_consult,doc_visit,doc_hos,doc_qual,doc_id){
               var retVal = confirm("Are you sure you entered correct data ?");
               if( retVal == true ){
                  insertData(doc_name,doc_phone,doc_address,doc_consult,doc_visit,doc_hos,doc_qual,doc_id);
                  return true;
               }
               else{
                  return false;
               }
            }
function insertData(doc_name,doc_phone,doc_address,doc_consult,doc_visit,doc_hos,doc_qual,doc_id){
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            if(xmlhttp.responseText=="success"){
				        alert("Doctor Registered Successfully");
                window.location.href="doctor_registration.php";
            }
            else{
            	alert("Unfortunately Test didn't registered");
            }
        }
    };
    xmlhttp.open("POST","<?php echo '../ajax/rsp_regDoc.php'; ?>",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	values="doc_name="+doc_name+"&doc_phone="+doc_phone+"&doc_address="+doc_address+"&doc_consult="+doc_consult+"&doc_visit="+doc_visit+"&doc_hos="+doc_hos+"&doc_qual="+doc_qual+"&doc_id="+doc_id;

    xmlhttp.send(values);
  }
     </script>
 </head>
	 
	 
	 
	 <body id="main_body" >
<div id="fixedheader"></div>


<table style="width:100%">
<tr>
<th style="width:18%"><img src="logo1.jpg" height="20%"></th>

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

<div id="form_container" class="form_description" align="center">



  <form action="" method="post" id="insertForm">
  
  
		<div class="form_description" align="center">
			
               <h2><b>Doctor's Amount</b></h2>
			

	
              						
			<ul >
         <br/><br/><br/>

          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		  <div class="form_description" align="center">	  
    <table>
      <tr align="center">
        <td colspan="4" class="heading"><h2>Doctor Registration</h2></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td>
        	<input type="text" maxlength="35" name="doc_name" id="doc_name" class="form-control" value="<?php echo $row['name'];?>" /></td>
      	<td>Cell No:</td>
        <td><input type="text" maxlength="35" name="doc_phone" id="doc_phone" class="form-control" value="<?php echo $row['cell_no'];?>" /></td>
      </tr>
      <tr>
        <td>Address</td>
        <td colspan="4">
          <input type="text" name="doc_address" maxlength="50" id="doc_address" class="form-control" size="70"  value="<?php echo $row['address'];?>" />
        </td>
      </tr>
      <tr>
        <td>Qualification:</td>
        <td>
          <input type="text" name="doc_qual" id="doc_qual" maxlength="35" class="form-control"  value="<?php echo $row['qualification'];?>" /></td>
        <td>Visit Days:</td>
        <td><input type="number" name="doc_visit" maxlength="35" id="doc_visit" class="form-control" value="<?php echo $row['visit_days'];?>" /></td>
      </tr>
      <tr>
        <td>Consultancy Fee:</td>
        <td>
          <input type="number" name="doc_consult" maxlength="35" id="doc_consult" class="form-control"  value="<?php echo $row['consultancy_fee'];?>" /></td>
        <td>Hospital Pay per Consultancy:</td>
        <td><input type="number" name="doc_hos" maxlength="35" id="doc_hos" class="form-control" value="<?php echo $row['hospital_paid'];?>" /></td>
      </tr>
      <tr>
      	<td colspan="4" style="text-align:right;">
      		<input type="submit" value="Update Doctor" name="update_doc" id="update_doc"/>
      	</td>
      </tr>
    </table>
		</div>
		</ul>
		
		</form>	
		
               </td>
          </tr>
		  
 </table>	
 <div style="text-align:center;">
 
</div>
<div id="fixedfooter">Bottom div content</div></body></html>

  <?php
			if(isset($_POST['update_doc'])){
            	echo '<script>getConfirmation("'.$_POST['doc_name'].'","'.$_POST['doc_phone'].'","'.$_POST['doc_address'].'",'.$_POST['doc_consult'].','.$_POST['doc_visit'].','.$_POST['doc_hos'].',"'.$_POST['doc_qual'].'",'.$_GET['id'].')</script>';
			}
  ?>
