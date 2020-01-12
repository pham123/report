<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require('config.php');
require('function/db_lib.php');
$pagetitle ="Login Page";

$oDB = new db();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="refresh" content="300">
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
    <div>
      <h1 style='text-align:center; font-weight:bold;'><?php echo $oDB->lang('ReportTitle') ?></h1>
      <h3 style='text-align:center;'><?php echo $oDB->lang('LastUpdateTime') ?> : <?php echo date('d-m-Y H:i:s') ?></h3>
    </div>
  <div>
    <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
      <tr style="background-color:#C6CAC9;">
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Stt') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Products') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Line') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Plan') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Total') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Rate') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Type') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times1') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times2') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times3') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times4') ?></td>
        <td colspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Times5') ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"> <?php echo $oDB->lang('Remark') ?></td>
      </tr>

      <tr style="background-color:#C6CAC9;">
        <?php
          for ($i=1; $i < 7 ; $i++) { 
            echo "<td>".$oDB->lang('Ok')."</td>";
            echo "<td>".$oDB->lang('Ng')."</td>";
          }
        ?>
      </tr>

      <?php
      $today = date("Y-m-d");
$sql = "select line.LineId,line.LineName,products.ProductsID,products.ProductsName 
from line inner join `products` on line.ProductsId = products.ProductsId";
$list = $oDB -> fetchAll($sql);

foreach ($list as $key => $value) {
  ?>
      <tr>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo $key+1 ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo $value['ProductsName'] ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo $value['LineName'] ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo viewprice($oDB->getplan($value['LineId'])) ?></td>
        <?php
          $ok = $oDB->getlineqty("OK",$value['LineId']);
          $ng = $oDB->getlineqty("NG",$value['LineId'])
        
        ?>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo viewprice($ok) ?></td>
        <td rowspan="2" style="vertical-align: middle; padding:1px;"><?php echo viewprice($ng) ?></td>
        <?php
        $total = $ok + $ng;
        $total = $oDB->getplan($value['LineId']);
        $rate = ($total!=0) ? round($ok/$total,3)*100 ." %" : "-" ;
        echo "<td rowspan='2' style='vertical-align: middle; padding:1px;'>".$rate."</td>";
        echo "<td>".$oDB->lang('Target')."</td>";
         for ($i=1; $i < 6 ; $i++) { 
          echo "<td colspan='2'>".viewprice($oDB->getarget($value['LineId'],$i))."</td>";
        }
        ?>

        <td rowspan="2"><?php echo $oDB->getremark($value['LineId']) ?></td>
      </tr>

      <tr>

        <?php
         echo "<td>".$oDB->lang('Actual')."</td>";
         for ($i=1; $i < 6 ; $i++) { 
          echo "<td style='background-color:".$oDB->lang('color1','#b3ffe6').";'>".viewprice($oDB->getqty('OK',$value['LineId'],$i))."</td>";
          echo "<td style='background-color:".$oDB->lang('color2','#b3ffe6').";'>".viewprice($oDB->getqty('NG',$value['LineId'],$i))."</td>";
        }
        ?>

      </tr>
  <?php
}
?>
      
    </table>
    

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
