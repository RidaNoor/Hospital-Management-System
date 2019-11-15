<?php
session_start();
include('connection/connection.php');
?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login Form</title>
          <link rel="stylesheet" href="css/style.css">
  </head>

  <body>
<form action="" method="post">
    <div class="login-form">
    <div align="center"><img src="css/logo.png" width="100" height="100" /></div>
     <h1>Login</h1>
     <div class="form-group ">
       <input type="text" class="form-control" placeholder="Username " id="UserName" name="uname"/>
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" placeholder="Password" id="Passwod" name="pass"/>
       <i class="fa fa-lock"></i>
     </div>
     <button type="submit" name="login" class="log-btn" >Log in</button>
   </div>
</form>
    <script src='js/jquery.min.js'></script>
    <script src="js/index.js"></script>
  </body>
</html>
<?php
if(isset($_POST['login'])){
  $uname=$_POST['uname'];
  $pass=$_POST['pass'];
  $sql="Select * from tb_person WHERE person_uname='".$uname."' AND person_pass='".$pass."'";
    $result = $con->query($sql);
  if($result->num_rows > 0){
    $res=$result->fetch_assoc();
    if($res['person_type']=="admin"){
      $_SESSION['admin']=$res['person_uname'];
      echo "<script>location.href='admin/doctor_registration.php';</script>";
    }
    else{
      $_SESSION['employee']=$res['person_uname'];
      echo "<script>location.href='registration.php';</script>";
    }
  }
  else{
    echo "<script>window.alert('Invalid username or password!');</script>";
  }
}
?>