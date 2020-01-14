<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require('config.php');
require('function/db_lib.php');
$pagetitle ="Login Page";

$oDB = new db();
$images = array();
$sql = "select ShowReportId,ShowReportName from ShowReport where ShowReportOption <> 0";
$list = $oDB -> fetchAll($sql);

foreach ($list as $key => $value) {
  $images[] = 'picture_'.$value['ShowReportId'];
}

if (isset($_SESSION['re'])&&(count($images)+1)!=count($_SESSION['re'])) {
  # code...
  unset($_SESSION['re']);
  header('Location:report.php');
}

// if ($handle = opendir('report/images/')) {
//   while (false !== ($entry = readdir($handle))) {
//       if ($entry != "." && $entry != "..") {
//           $name = str_replace('.jpg','',$entry);
//           $images[] = $name;
//       }
//   }
//   closedir($handle);
//   }

// var_dump($images);

if (isset($_SESSION['re'])&&$_SESSION['re']['main'][0]=='main') {

} else {
  $_SESSION['re']['main'][0]='main';
  $_SESSION['re']['main'][1]=0;
}

foreach ($images as $key => $value) {
 if (isset($_SESSION['re'][$value])&&$_SESSION['re'][$value][0]==$value) {
   # code...
 } else {
  $_SESSION['re'][$value][0]=$value;
  $_SESSION['re'][$value][1]=0;
 }
}
// echo "<pre>";
// var_dump($_SESSION['re']);
// echo "<pre>";

$i=1;
$resetkey=0;
foreach ($_SESSION['re'] as $key => $value) {
  if ($i==count($_SESSION['re'])) {
    $resetkey = 1;
  }
  if ($value[1]==0) {
    $loadoption = $value[0];
    $_SESSION['re'][$key][1]=1;
    break;
  }
  $i++;
}

if ($resetkey==1) {
  foreach ($_SESSION['re'] as $key => $value) {
    $_SESSION['re'][$key][1]=0;
  }
}
// echo  $loadoption;

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="<?php echo $oDB->lang('AutoLoad','20') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="img/halla.png" />

  <title><?php echo $oDB->lang('TitleReport') ?></title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    td {
      border:1px solid black;
      text-align:center;
      vertical-align: middle;
      justify-content: center;
      font-size:30px;
      padding:1px;
      color:black;
      font-weight:bold;
      
    }

    
  </style>

</head>

<body>
    <?php
    switch ($loadoption) {
      case 'main':
        include_once('prd.php');
        break;
      default:
        if (file_exists("report/images/".$loadoption.".jpg")) {
        echo "<img src='report/images/".$loadoption.".jpg' style='width:100%' alt=''>";
        }else{
        echo "không tồn tại";
        header('Location:report.php');
        }
        break;
    }
    
    ?>



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
