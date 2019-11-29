<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require('config.php');
require('function/db_lib.php');
require('lang/en.php');
$pagetitle ="Login Page";
require('views/template-header.php');
require('function/template.php');
$oDB = new db();

if (isset($_POST['username'])) {
  // Lấy giá trị user name và pass
  $username = safe($_POST['username']);
  $userpass = md5(safe($_POST['userpass']));
  
  // Kiểm tra trong data base
  $sql = "`UsersName`='".$username."' AND `UsersPassword` = '".$userpass."'";
  $ketqua = $oDB-> sl_one('Users',$sql);

  // var_dump($ketqua);
  if (isset($ketqua["UsersId"])) {
    $_SESSION[_site_]['userid']=$ketqua['UsersId'];
    $_SESSION[_site_]['username']=$username;
    $_SESSION[_site_]['userfullname']=$ketqua['UsersFullName'];
    $_SESSION[_site_]['useroption']=$ketqua['UsersOption'];

     header("Location: home/");
     die(); 
    


  } else {
    # code...
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="img/halla.png" />

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
                <!-- <img src="img/Users/<?php echo $code ?>.jpg" alt="<?php echo $name ?>" class="img-thumbnail" alt="Cinque Terre"> -->
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action='' method='post'>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name='username' placeholder="Enter user name" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name='userpass' placeholder="Password" autocomplete="off">
                    </div>
                    <button type="submit" class='form-control btn-success'>Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>