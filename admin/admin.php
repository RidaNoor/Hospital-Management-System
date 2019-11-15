<?php
session_start();

if(!isset($_SESSION['admin'])){
	echo "<script>window.alert('You are not logged in');location.href='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Main Page</title>
</head>
<body style=""><!--background:black;-->
	<iframe src="left_menu.html" width="19%" height="760">
  		<p>Your browser does not support iframes.</p>
	</iframe>
	<iframe width='80%' height='760' id='content'>
  					<p>Your browser does not support iframes.</p>
	</iframe>

	
</body>
</html>
<?php
	if(empty($_REQUEST) || isset($_GET['dashboard'])){
		echo "<script>document.getElementById('content').src ='dashboard.php';</script>";
	}
	
	if(isset($_GET['lab_test_reg'])){
		echo "<script>document.getElementById('content').src ='lab_test_registration.php';</script>";
	}
	
	if(isset($_GET['doc_reg'])){
		echo "<script>document.getElementById('content').src ='doctor_registration.php';</script>";
	}
	
	if(isset($_GET['exp_reg'])){
		echo "<script>document.getElementById('content').src ='expanse_registration.php';</script>";
	}
	
	if(isset($_GET['reports'])){
		echo "<script>document.getElementById('content').src ='reports/reports.php';</script>";
	}

	if(isset($_POST['sign_out'])){
		session_destroy();
		echo '<script>window.top.location.href="../index.php";</script>';
	}
?>