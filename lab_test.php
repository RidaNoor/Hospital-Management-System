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
					pt_ws:"required",
          pt_test:"required"
				},
		// Defining Messages
				messages:{
					pt_name:"Please Enter name",
					pt_age:{required:"Please Enter Age"},
					pt_address:"Please Fill address",
					pt_doc:"Please Select Doctor",
					pt_dis:"Please Enter Disease",
					pt_phone:"Enter Phone Number",
					pt_ws:"Please Enter Relative",
          pt_test:"Please Enter Test"
				}
			});
		});
	 </script>
	 <script type="text/javascript">
	  function getConfirmation(pt_id,pt_name,pt_phone,pt_address,pt_age,pt_ws,pt_doc,pt_dis,pt_test){
               var retVal = confirm("Are you sure you entered correct data ?");
               if( retVal == true ){
                  insertData(pt_id,pt_name,pt_phone,pt_address,pt_age,pt_ws,pt_doc,pt_dis,pt_test);
                  return true;
               }
               else{
                  return false;
               }
            }
  function insertData(pt_id,pt_name,pt_phone,pt_address,pt_age,pt_ws,pt_doc,pt_dis,pt_test){
  	var xmlhttp;
      if (window.XMLHttpRequest) {
          xmlhttp = new XMLHttpRequest();
      } else {
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function () {
          if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            // console.log(xmlhttp.responseText);
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
      xmlhttp.open("POST","<?php echo 'ajax/rsp_labTest.php'; ?>",true);
      xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  	values="pt_id="+pt_id+"&pt_name="+pt_name+"&pt_phone="+pt_phone+"&pt_address="+pt_address+"&pt_age="+pt_age+"&pt_ws="+pt_ws+"&pt_doc="+pt_doc+"&pt_dis="+pt_dis+"&pt_test="+pt_test;
      xmlhttp.send(values);
    }

  function getData(id){
    $.ajax(
      {
        async: false,
        url: "ajax/rsp_labTest.php",
        data: "id="+id,
        success: function(result){
              var arr=result.split(",");
              $("#pt_name").val(arr[0]);
              $("#pt_age").val(arr[1]);
              $("#pt_ws").val(arr[2]);
              $("#pt_phone").val(arr[3]);
              $("#pt_address").val(arr[4]);
              $("#pt_doc").val(arr[5]);
              $("#pt_dis").val(arr[6]);
          }
        }
      );
  }
  $(document).ready(function(){
    $(".to_be_hide").hide();
  });
  function toggleElement(){
    if($("#reg_pat").is(':checked')){
      $(".to_be_hide").show();
    }
    else{
      $(".to_be_hide").hide();
              $("#pt_id").val("");
              $("#pt_name").val("");
              $("#pt_age").val("");
              $("#pt_ws").val("");
              $("#pt_phone").val("");
              $("#pt_address").val("");
              $("#pt_doc").val("");
              $("#pt_dis").val("");
    }
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
        <td colspan="4" style="text-align:center;">
          <input type="checkbox" onclick="toggleElement()" id="reg_pat"/> <label for="reg_pat">Already Registered Patient</label>
        </td>
      </tr>
      <tr>
        <td class="to_be_hide">Patient Id:</td>
        <td class="to_be_hide"><select name="pt_id" id="pt_id">
              <option></option>
          <?php
            $selectQuery="SELECT patient_id FROM patient";
            $resSel=$con->query($selectQuery);
            while($row=$resSel->fetch_assoc()){
              echo '<option onclick="getData(\''.$row['patient_id'].'\')" value="'.$row['patient_id'].'">'.$row['patient_id'].'</option>';
            }
          ?>
        </select>
        </td>
          <td>Test:</td>
          
        <td>
        <select id="pt_test" name="pt_test">
          <option></option>
            <?php
              $selQuery="SELECT test_id,test_name FROM lab";
              $resQuery=$con->query($selQuery);
              while($row=$resQuery->fetch_assoc()){
                  echo '<option value="'.$row['test_id'].'">'.$row['test_name'].'</option>';
              }
            ?>
        </select>
        </td>
        </tr>
        <tr>
        <td>Name:</td>
        <td><input type="text" name="pt_name" id="pt_name"  class="form-control"/></td>
        
        <td>Age:</td>
        <td><input type="number" name="pt_age" id="pt_age"  class="form-control"/></td>
      </tr>
      <tr>
        <td>S/O W/O:</td>
        <td><input type="text" name="pt_ws" id="pt_ws"  class="form-control"/></td>
        <td>Address:</td>
        <td><input type="text" name="pt_address" id="pt_address"  class="form-control"/></td>
      </tr>
      <tr>
        <td>Doctor :</td>
        <td>
            <select id="pt_doc" name="pt_doc">
            <option></option>
              <?php $docQuery="SELECT * FROM doctor";$resDocQuery=$con->query($docQuery);
              while($row=$resDocQuery->fetch_assoc()){
                echo '<option value="'.$row['doctor_id'].'">'.$row['name'].'</option>';
                }?>
            </select>
        </td>
        <td>Disease:</td>
        <td><input type="text" name="pt_dis" id="pt_dis" class="form-control"/></td>
      </tr>
      <tr>
      	<td colspan="6" style="text-align:center">
      		<input type="text" name="pt_phone" id="pt_phone" />
      	</td>
      </tr>
      <tr>
      	<td colspan="6" style="text-align:center">
      		<input type="submit" value="Register" name="registerTest" id="registerTest"/>
      	</td>
      </tr>
    </table>
		
		</ul>
		
		</form>	
               </td>
          </tr>
		  
 </table>	
 <?php
			if(isset($_POST['registerTest'])){
				if(isset($_POST['pt_name']) && isset($_POST['pt_phone']) && isset($_POST['pt_address']) && isset($_POST['pt_age'])  && isset($_POST['pt_ws']) && isset($_POST['pt_dis'])){
          $pt_id=$_POST['pt_id'];
          if($pt_id != ""){
            echo "<script>getConfirmation(".$pt_id.",'".$_POST['pt_name']."','".$_POST['pt_phone']."','".$_POST['pt_address']."',".$_POST['pt_age'].",'".$_POST['pt_ws']."',".$_POST['pt_doc'].",'".$_POST['pt_dis']."','".$_POST['pt_test']."');</script>";
          }else{
            echo "<script>getConfirmation('undefined','".$_POST['pt_name']."','".$_POST['pt_phone']."','".$_POST['pt_address']."',".$_POST['pt_age'].",'".$_POST['pt_ws']."',".$_POST['pt_doc'].",'".$_POST['pt_dis']."','".$_POST['pt_test']."');</script>";
          }
					
				}
				else{
					echo '<script>alert("Must Fill all fields");</script>';
				}
			}
  ?>
   <div id="divToPrint" style="display:none;">
  <div style="width:1000px;height:800px;">

  </div>
</div>
 <div id="fixedfooter">Bottom div content</div>
 
 
 
 </body>
