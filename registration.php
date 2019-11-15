<?php
include("connection/connection.php");	// including files that have connection settings
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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


<script src="js/jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>

	 <script>
		$(document).ready(function(){
		var pt_name=$("#pt_name").val();
		var pt_age=$("#pt_age").val();
		var pt_address=$("#pt_address").val();
		var pt_doc=$("#pt_doc").val();
		var pt_dis=$("#pt_dis").val();
		var pt_ws=$("#pt_ws").val();
		var pt_phone=$("#pt_phone").val();
		
		// Validating main form
			$("#insertForm").validate({
		// Defining Rules
				rules:{
					pt_name:"required",
					pt_age:"required",	// Defining Multiple Checks
					pt_address:"required",
					pt_doc:"required",
					pt_dis:"required",
					pt_phone:"required",
					pt_ws:"required"
				},
		// Defining Messages
				messages:{
					pt_name:"Please Enter name",
					pt_age:{required:"Please Enter Age"},
					pt_address:"Please Fill address",
					pt_doc:"Please Select Doctor",
					pt_dis:"Please Enter Disease",
					pt_phone:"Enter Phone Number",
					pt_ws:"Please Enter Relative"
				}
			});
		});
	 </script>
	 <script type="text/javascript">
	  function getConfirmation(pt_name,pt_phone,pt_address,pt_age,pt_ws,pt_doc,pt_dis){
               var retVal = confirm("Are you sure you entered correct data ?");
               if( retVal == true ){
                  insertData(pt_name,pt_phone,pt_address,pt_age,pt_ws,pt_doc,pt_dis);
                  return true;
               }
               else{
                  return false;
               }
            }
function insertData(pt_name,pt_phone,pt_address,pt_age,pt_ws,pt_doc,pt_dis){
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            if(xmlhttp.responseText=="failure"){
            	alert('Unfortunately Not added !');
            }
            else{
              var divToPrint = document.getElementById('divToPrint');
             var popupWin = window.open('', '_blank', 'width=1000,height=800');
             popupWin.document.open();
             popupWin.document.write('<html><body onload="window.print()">' + xmlhttp.responseText + '</html>');
             popupWin.document.close();
              alert('Patient data added successfully !');
            }
        }
    };
    xmlhttp.open("POST","<?php echo 'ajax/addPatient.php'; ?>",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	values="pt_name="+pt_name+"&pt_phone="+pt_phone+"&pt_address="+pt_address+"&pt_age="+pt_age+"&pt_ws="+pt_ws+"&pt_doc="+pt_doc+"&pt_dis="+pt_dis;
    xmlhttp.send(values);
  }
     </script>
</head>
<body id="main_body" >
<div id="fixedheader">Top div content</div>


<table style="width:100%">
<tr>
<th style="width:18%"><img src="logo1.jpg" height="20%" width="100%"></th>
<th>Some Text Here</th>
</tr>

<tr>
<td>
<ul>
  <li><a class="active" href="registration.php" ><b>Patient Registration</b></a></li>
  <li><a href="lab_test.php"><b>Lab Test </b></a></li>
  <li><a href="discharge.php"><b>Discharge</b></a></li>  
</ul>
<form action="" method="post">
    <div align="center">
      <input type="submit" name="sign_out" value="Sign Out" />
    </div>
</form>
<?php $root="./";include($root."sign_out.php")?>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</td>


<td>	
<img id="top" src="top.png" alt="">

<div id="form_container">

<h1><a>Untitled Form</a></h1>
		
		<form id="insertForm" class="appnitro"  method="post" action="">
		
		
		
		
		<div class="form_description" align="center">
			
               <h2>Admission Form</h2>
			

		</div>
              						
			<ul >
         <br/><br/><br/>

          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		  
		  
		  <table>
      <tr align="center">
        <td colspan="4" class="heading"><h2>Registration Form</h2></td>
      </tr>
      <tr>
        <td>Name:</td>
        <td><input type="text" name="pt_name" id="pt_name" placeholder="Enter Patient's Name" title="Enter Patient Name" class="form-control"/></td>
        <?php if(isset($_POST['register'])){ if($_POST['pt_name']==""){echo "<td class='red'>*fill this field</td>";}}?> <!-- Server Side Checking -->
        <td>Age:</td>
        <td><input type="number" name="pt_age" id="pt_age" placeholder="Enter Paitent's Age" title="Enter Paitent's Age" class="form-control"/></td>
        <?php if(isset($_POST['register'])){ if($_POST['pt_age']==""){echo "<td class='red'>*fill this field</td>";}}?>
      </tr>
      <tr>
        <td>S/O W/O:</td>
        <td><input type="text" name="pt_ws" id="pt_ws" placeholder="S/O D/O" title="Enter Password" class="form-control"/></td>
        <?php if(isset($_POST['register'])){ if($_POST['pt_ws']==""){echo "<td class='red'>*fill this field</td>";}}?>
        <td>Address:</td>
        <td><input type="text" name="pt_address" id="pt_address" placeholder="Enter Address" title="Enter Address" class="form-control"/></td>
        <?php if(isset($_POST['register'])){ if($_POST['pt_address']==""){echo "<td class='red'>*fill this field</td>";}}?>
      </tr>
      <tr>
        <td>Doctor:</td>
        <td>
	        <select id="pt_doc" name="pt_doc"><!-- required="required"-->
          <option></option>
	        	<?php $docQuery="SELECT * FROM doctor";$resDocQuery=$con->query($docQuery);
	        	while($row=$resDocQuery->fetch_assoc()){
	        		echo '<option value="'.$row['doctor_id'].'">'.$row['name'].'</option>';
	        		}?>
	        </select>
	    </td>
        <td>Disease:</td>
        <td>
	        <input type="text" id="pt_dis" name="pt_dis" placeholder="Enter Disease Name" title="Enter Disease Name" required="required"/>
	    </td>
      </tr>
      <tr>
      	<td colspan="6" style="text-align:center">
      		<input type="text" name="pt_phone" id="pt_phone" title="Enter Phone Number" placeholder="Enter Phone Number"/>
      	</td>
      </tr>
      <tr>
      	<td colspan="6" style="text-align:center">
      		<input type="submit" value="Register" name="register" id="register"/>
      	</td>
      </tr>
    </table>
		
		</ul>
		
		</form>	
               </td>
          </tr>
		  
 </table>	
  <div id="divToPrint" style="display:none;">
  <div style="width:1000px;height:800px;">

  </div>
</div>
  <?php
			if(isset($_POST['register'])){
				if(isset($_POST['pt_name']) && isset($_POST['pt_phone']) && isset($_POST['pt_address']) && isset($_POST['pt_age'])  && isset($_POST['pt_ws']) && isset($_POST['pt_dis'])){
					echo "<script>getConfirmation('".$_POST['pt_name']."','".$_POST['pt_phone']."','".$_POST['pt_address']."',".$_POST['pt_age'].",'".$_POST['pt_ws']."',".$_POST['pt_doc'].",'".$_POST['pt_dis']."');</script>";
				}
				else{
					echo '<script>alert("Must Fill all fields");</script>';
				}
			}
  ?>
 <div id="fixedfooter">Bottom div content</div></body>
</html>