<?php
include("../connection/connection.php");
$selDoc="SELECT * FROM expanse WHERE ctgy_id=".$_GET['id'];
$resQuery=$con->query($selDoc);
$row=$resQuery->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title> Edit Expanse </title>

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
<script type="text/javascript">
	  function getConfirmation(exp_id,exp_cat){
               var retVal = confirm("Are you sure you entered correct data ?");
               if( retVal == true ){
                  editExp(exp_id,exp_cat);
                  return true;
               }
               else{
                  return false;
               }
            }
function editExp(exp_id,exp_cat){
	var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            if(xmlhttp.responseText=="success"){
				      alert("Expanse Edit Completed");
              parent.window.location.href="admin.php?exp_reg";
            }
            else{
            	// alert('Unfortunately Could not registred !');
              console.log(xmlhttp.responseText);
            }
        }
    };
    xmlhttp.open("POST","<?php echo '../ajax/rsp_regExp.php'; ?>",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	values="exp_id="+exp_id+"&exp_cat="+exp_cat;
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

<div id="form_container">

<h1><a>Untitled Form</a></h1>





 <form action="" method="post">
  <h2 align="center">Expanse Registration</h2>
  <table align="center">
    <tr>
      <td>Expanse Category:</td>
      <td><input type="text" name="expCat" id="expCat" required="required" class="form-control" value="<?php echo $row['expanse_ctgy'];?>" /></td>
    </tr>
	</table>
	<table align="center">
    <tr>
      <td colspan="2" style="text-align:right;"><input type="submit" name="editCat" value="Register Category" /></td>
    </tr>
  </table>
  </form>
  
  
               </td>
          </tr>


                 </table>	

	
<div id="fixedfooter">Bottom div content</div>

	
</body>
</html>
<?php
	if(isset($_POST['editCat'])){
				if(isset($_POST['expCat'])){
					echo "<script>getConfirmation(".$row['ctgy_id'].",'".$_POST['expCat']."');</script>";
				}
				else{
					echo '<script>alert("Must Fill all fields");</script>';
				}
			}
?>

