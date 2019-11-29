<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
require('../config.php');
require('../function/db_lib.php');
$name = safe($_POST['name']);
$soluong = safe($_POST['value']);
if ($soluong==0) {
    exit();
}
$oDB = new db();

$str_arr = explode ("_", $name);

echo $action = $str_arr[0];
if ($action=='plan') {
    # kiểm tra xem đã tồn tại chưa
    $sql = "Select * from kehoach where date(KeHoachCreateDate)='".date('Y-m-d')."'AND LineId=".$str_arr[1];
    $kehoach= $oDB -> fetchOne($sql);

    if (isset($kehoach)) {
        $sql = "UPDATE kehoach SET KeHoachQty=".$soluong." Where date(KeHoachCreateDate)='".date('Y-m-d')."'AND LineId=".$str_arr[1];
    } else {
        $sql= "INSERT INTO `kehoach`( `LineId`, `KeHoachQty`) VALUES (".$str_arr[1].",".$soluong.")";
    }
    
}elseif ($action=='ok') {
    # kiểm tra xem đã tồn tại chưa
    $sql = "Select * from sanluong where SanLuongType='OK' AND date(SanLuongCreateDate)='".date('Y-m-d')."'AND LineId=".$str_arr[1]." AND SanLuongTimes=".$str_arr[2];
    $kehoach= $oDB -> fetchOne($sql);

    if (isset($kehoach)) {
        $sql = "UPDATE SanLuong SET SanLuongQty=".$soluong." Where SanLuongId=".$kehoach['SanLuongId'];
    } else {
        $sql= "INSERT INTO `SanLuong`( `LineId`, `SanLuongQty`,`SanLuongTimes`,`SanLuongType`) VALUES (".$str_arr[1].",".$soluong.",".$str_arr[2].",'OK')";
    }
}elseif ($action=='ng') {
    # kiểm tra xem đã tồn tại chưa
    $sql = "Select * from sanluong where SanLuongType='NG' AND date(SanLuongCreateDate)='".date('Y-m-d')."'AND LineId=".$str_arr[1]." AND SanLuongTimes=".$str_arr[2];
    $SanLuong= $oDB -> fetchOne($sql);

    if (isset($kehoach)) {
        $sql = "UPDATE SanLuong SET SanLuongQty=".$soluong." Where SanLuongId=".$kehoach['SanLuongId'];
    } else {
        $sql= "INSERT INTO `SanLuong`( `LineId`, `SanLuongQty`,`SanLuongTimes`,`SanLuongType`) VALUES (".$str_arr[1].",".$soluong.",".$str_arr[2].",'NG')";
    }
}
echo $sql;
$oDB->query($sql);


//header('Location:them.php');
?>