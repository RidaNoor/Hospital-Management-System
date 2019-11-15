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
  <script type="text/javascript" src="js/jquery-latest.js"></script> 
  <link rel="stylesheet" href="css/base/jquery.ui.all.css">
  <script src="js/jquery.ui.core.js"></script>
  <script src="js/jquery.ui.datepicker.js"></script>
  <script type="text/javascript">
  $(function() {
    $(".datepicker").datepicker({
    dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true
    });
  });
  </script>

	 <script type="text/javascript">
	  function getConfirmation(pt_id,adm_date,dis_date,dis_com,ext_amount){
               var retVal = confirm("Are you sure you entered correct data ?");
               if( retVal == true ){
                  insertData(pt_id,adm_date,dis_date,dis_com,ext_amount);
                  return true;
               }
               else{
                  return false;
               }
            }
function insertData(pt_id,adm_date,dis_date,dis_com,ext_amount){
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
              alert("Discharge Completed Successfully !");
            }
        }
    };
    xmlhttp.open("POST","<?php echo 'ajax/rsp_discharge.php'; ?>",true);
    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	values="pt_id="+pt_id+"&adm_date="+adm_date+"&dis_date="+dis_date+"&dis_com="+dis_com+"&ext_amount="+ext_amount;
    xmlhttp.send(values);
  }

  function getData(id){
    $.ajax(
      {
        async: false,
        url: "ajax/rsp_discharge.php",
        data: "id="+id,
        success: function(result){
              var arr=result.split(" ");
              $("#dis_add").val(arr[0]);
              $("#ext_amount").val(0);
          }
        }
      );
  }
     </script>

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
        <td colspan="4" class="heading"><h2>Discharge Form</h2></td>
      </tr>
      <tr>
        <td colspan="2" style="text-align:right;">Patient Id:</td>
        <td colspan="2"><select name="pt_id" id="pt_id" required="required">
              <option></option>
          <?php
            $selectQuery="SELECT p.patient_id FROM   patient AS p WHERE  NOT EXISTS (SELECT * FROM   discharge AS ds WHERE  ds.patient_id = p.patient_id)";
            $resSel=$con->query($selectQuery);
            while($row=$resSel->fetch_assoc()){
              echo '<option onclick="getData(\''.$row['patient_id'].'\')" value="'.$row['patient_id'].'">'.$row['patient_id'].'</option>';
            }
          ?>
        </select></td>
        </tr>
        <tr>
          <td>Admission Date:</td>
        <td><input type="text" name="dis_add" id="dis_add" class="form-control"/></td>
        <td>Discharge Date:</td>
        <td><input type="text" name="dis_dis" id="dis_dis" class="form-control datepicker" required="required"/></td>
        
      </tr>
      <tr>
        <td colspan="4" style="text-align:center;">Comments<br/>
          <textarea id="dis_com" name="dis_com" rows="5" cols="25"></textarea>
        </td>
      </tr>
      <tr style="text-align:center;">
        <td colspan="4">Extra Charges: <input type="number" name="ext_amount" id="ext_amount" /></td>
      </tr>
      <tr>
      	<td colspan="6" style="text-align:center">
      		<input type="submit" value="Discharge" name="discharge" id="discharge"/>
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
<!-- <input type="button" value="print" onclick="PrintDiv();" /> -->
<div>
</div>
  <?php
			if(isset($_POST['discharge'])){
				if(isset($_POST['pt_id']) && isset($_POST['dis_dis'])){
          echo "<script>getConfirmation(".$_POST['pt_id'].",'".$_POST['dis_add']."','".$_POST['dis_dis']."','".$_POST['dis_com']."',".$_POST['ext_amount'].");</script>";
        }
				else{
					echo '<script>alert("Must Fill all fields");</script>';
				}
			}
  ?>
</div>
 
 
 <div id="fixedfooter">Bottom div content</div></body>
