<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$currentlocation = basename(dirname(__FILE__));
require('../config.php');
require('../function/db_lib.php');
$page = 'system';
$pagetitle = " Report";
require('../views/template-header.php');
require('../function/template.php');
$oDB = new db();
//echo $oDB->lang("Products");
$lineid = (isset($_GET['line'])) ? safe($_GET['line']) : '1' ;
//$lineid = safe($_GET['line']);
?>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php require('sidebar.php') ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php require('navbar.php') ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php
        $sql = "select line.LineId,line.LineName,products.ProductsID,products.ProductsName 
        from line inner join `products` on line.ProductsId = products.ProductsId 
        Where line.LineId=".$lineid;
        $list = $oDB -> fetchOne($sql);
        // $ketqua=  ($oDB->getplan($list['LineId']));
        // var_dump($ketqua);

        ?>

        <table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
            <tr><td>Line</td><td><?php echo $list['LineName'] ?></td></tr>
            <tr><td>Products</td><td><?php echo $list['ProductsName'] ?></td></tr>
            <tr><td>Plan</td><td><input type="number" value="<?php echo $oDB->getplan($list['LineId']) ?>" class='form-control' name="plan_<?php echo $list['LineId']?>"></td></tr>

            <?php
            for ($i=1; $i < 6; $i++) { 
            ?>
            <tr><td>Ok<?php echo $i?></td><td><input type="number" value="<?php echo $oDB->getqty('OK',$list['LineId'],$i) ?>" class='form-control' name="ok_<?php echo $list['LineId']?>_<?php echo $i?>"></td></tr>
            <tr><td>NG<?php echo $i?></td><td><input type="number" value="<?php echo $oDB->getqty('NG',$list['LineId'],$i) ?>" class='form-control' name="ng_<?php echo $list['LineId']?>_<?php echo $i?>"></td></tr>

            <?php
            }
            ?>
            
        </table>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <?php require('../views/template-footer.php'); ?>

  <script>
    $(function () {
      $('selectpicker').selectpicker();
    });


    $(function () {
    $("input").on("change", function() {
    //alert($(this).val());
    
    var name = $(this).attr("name");
    var value = $(this).val();

    //alert(name);

        $.ajax({
            type: "POST",
            url: "Ajdathang.php",
            cache: false,
            data: {name:name,value:value}
            }).done(function( result ) {
            // var kq = result;
            // alert(kq);
            // $('.ketqua').html(kq);
            //location.reload();
        }); 
    });
    });
  </script>

</body>

</html>

