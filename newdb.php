<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//header("Location: login.php");
include('config.php');
include('function/db_lib.php');

$oDB = new db();

    
$sql[0] = "CREATE TABLE remark (
    RemarkId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LineId INT(6),
    ProductsId INT(6),
    RemarkContent VARCHAR(255),
    RemarkCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    RemarkUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    ";

$sql[1] = "CREATE TABLE TargetQuantity (
    TargetQuantityId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LineId INT(6),
    TargetQuantityTimes INT(6),
    TargetQuantityQty INT(10),
    TargetQuantityCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    TargetQuantityUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    ";
$sql[2] = "INSERT INTO TargetQuantity(`LineId`,`TargetQuantityTimes`,`TargetQuantityQty`)
VALUES(1,1,1000)";

for ($i=0; $i < count($sql) ; $i++) { 
    $oDB -> query($sql[$i]);
}

$oDB = null;