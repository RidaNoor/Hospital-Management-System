<?php
include("../connection/connection.php");	// including files that have connection settings
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title> Doctor Registration </title>

<link rel="stylesheet" type="text/css" href="view.css" media="all">

<script type="text/javascript" src="view.js"></script>

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
<script src="../js/jquery.min.js"></script>
<script src="../js/jquery.validate.js"></script>
<script src="../js/additional-methods.js"></script>

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
	  function getConfirmation(exp_cat,exp_amount,exp_title){
               var retVal = confirm("Are you sure you entered correct data ?");
               if( retVal == true ){
                  insertExp(exp_cat,exp_amount,exp_title);
                  return true;
               }
               else{
                  return false;
               }
            }
function insertExp(exp_cat,exp_amount,exp_title){
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            if(xmlhttp.responseText=="success"){
				      alert("Registration Completed");
              parent.window.location.href="expense_registration.php";
            }
            else{
            	// alert('Unfortunately Could not registred !');
              console.log(xmlhttp.responseText);
            }
        }
    };
    xmlhttp.open("POST","<?php echo '../ajax/rsp_regExp.php'; ?>",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	values="exp_cat="+exp_cat;
  if(typeof(exp_amount)!='undefined'){
    values += "&exp_amount="+exp_amount+"&exp_title="+exp_title;
  }
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
 <form action="" method="post">
  <h2 align="center">Expanse Registration</h2><br/><br/><br /><br /><br /><br /><br /><br />
  <table align="center">
    <tr>
      <td>Expanse Category:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
      <td><input type="text" name="expCat" id="expCat" required="required" class="form-control"/></td>
    </tr>
	 </table>
	 
	 <table align="center">
    <tr>
	<br/>
      <td colspan="2" style="text-align:right;"><input type="submit" size="50" name="regCat" value="Register Category" /></td>
    </tr>
    </table>
  </form>
 </div>
 
  <div id="form_container" class="form_description" align="center">
  <form action="" method="post">
  <table>
  
    <tr>
      <th></th>
    </tr>
    <tr>
      <td>Expanse Category:</td>
      <td>
        <select name="exp_cat" id="exp_cat"  required="required">
        <option></option>
          <?php
            $selExpCat="SELECT * FROM expanse";
            $resSelExpCat=$con->query($selExpCat);
            while($row=$resSelExpCat->fetch_assoc()){
              echo '<option value="'.$row['ctgy_id'].'">'.$row['expanse_ctgy'].'</option>';
            }
          ?>
        </select>
      </td>

      <td>Expanse Title:</td>
      <td><input type="text" name="exp_title" size="13" id="exp_title" required="required" class="form-control"/></td>
      <td>Expanse Amount:</td>
      <td><input type="number" size="09" required="required" name="exp_amount" id="exp_amount" class="form-control"/></td>

<!--       <td>Date:</td>
      <td><input type="date" name="exp_date" id="exp_date" class="form-control"/></td> -->
    </tr>
	</table>
	<table  align="center">
    <tr>
	<br/>
      <td colspan="4" style="text-align:right;"><input type="submit" name="regExp" value="Register Expanse" /></td>
    </tr>
	
  </table>
  </form>
  </div>
               </td>
          </tr>


                 </table>	

<?php
			if(isset($_POST['regCat'])){
				if(isset($_POST['expCat'])){
          // echo "<pre>";print_r($_POST);echo "</pre>";
					echo "<script>getConfirmation('".$_POST['expCat']."');</script>";
				}
				else{
					echo '<script>alert("Must Fill all fields");</script>';
				}
			}
      if(isset($_POST['regExp'])){
        if(isset($_POST['exp_cat']) && isset($_POST['exp_amount'])){
          echo "<script>getConfirmation('".$_POST['exp_cat']."',".$_POST['exp_amount'].",'".$_POST['exp_title']."');</script>";
        }
        else{
          echo '<script>alert("Must Fill all fields");</script>';
        }
      }
  ?>
</div>
<div style="text-align:center;">
  <h2>Registered Expanse Category</h2>
  <?php
  $selExpQuery="SELECT * FROM expanse";
  $resSelExpQuery=$con->query($selExpQuery);
  if($resSelExpQuery->num_rows > 0){
    echo '<table id="test_table" align="center">';
    while($row=$resSelExpQuery->fetch_assoc()){
      echo '<tr><td>'.$row['expanse_ctgy'].'</td><td><a href="edit_expanse.php?id='.$row['ctgy_id'].'">Edit</a></td><td><a href="delete.php?exp_id='.$row['ctgy_id'].'">Delete</a></td></tr>';
    }
    echo '</table>';
  }
  else{
    echo '<span>*No Expanse registered Yet</span>';
  }
  ?>	
<div id="fixedfooter">Bottom div content</div>

	
</body>
</html>

