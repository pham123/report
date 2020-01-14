    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../home/" Style='background-color:white;'>
        <!-- <div class="sidebar-brand-icon rotate-n-15">
          <img src="../img/hallalogo.png" alt="logo" height="45" >
        </div> -->
        
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../<?php echo $page ?>">
          <i class="fas fa-fw fa-home"></i>
          <span><?php echo $oDB->lang("Home") ?></span></a>
      </li>

      <!-- Divider -->
<?php
$sql = "select ShowReportId,ShowReportName from ShowReport where ShowReportOption <> 0";
$list = $oDB -> fetchAll($sql);

foreach ($list as $key => $value) {
  ?>
      <li class="nav-item active">
        <a class="nav-link" href="?id=<?php echo $value['ShowReportId'] ?>">
          <i class="fas fa-angle-right"></i>
          <span><?php echo $value['ShowReportName'] ?></span></a>
      </li>
  <?php
}
?>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->
