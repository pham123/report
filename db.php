<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//header("Location: login.php");
include('config.php');
include('function/db_lib.php');

$oDB = new db();
$sql[0] = "CREATE TABLE Users (
    UsersId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    UsersName VARCHAR(30) NOT NULL UNIQUE,
    UsersFullName VARCHAR(30) NOT NULL,
    UsersPassword VARCHAR(100) NOT NULL,
    UsersEmail VARCHAR(50),
    UsersOption INT(2),
    UsersCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    UsersUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP);";

$sql[1] = "
INSERT INTO Users(`UsersName`,`UsersFullName`,`UsersEmail`,`UsersPassword`,`UsersOption`)
VALUES('dongpx','Phạm Xuân Đồng','dongpx@hallavina.vn','".md5('dong')."',1)";

$sql[2] = "CREATE TABLE Products (
    ProductsId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    ProductsName VARCHAR(100) NOT NULL,
    ProductsNumber VARCHAR(30) NOT NULL UNIQUE,
    ProductsInformation VARCHAR(100) NOT NULL,
    ProductsDescription VARCHAR(100) NOT NULL,
    ProductsOption INT(1),
    ProductsCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    ProductsUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );";

$sql[3] = "CREATE TABLE Line (
    LineId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LineName VARCHAR(30) NOT NULL UNIQUE,
    LineInformation VARCHAR(100) NOT NULL,
    LineDescription VARCHAR(100) NOT NULL,
    ProductsId INT(6),
    LineOption INT(1),
    LineCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    LineUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );";

$sql[4] = "
INSERT INTO Products(`ProductsName`,`ProductsNumber`,`ProductsInformation`,`ProductsDescription`,`ProductsOption`)
VALUES('ProductName','ProductNumber','ProductInformation','ProductDescription',1)";
$sql[5] = "
INSERT INTO Line(`LineName`,`LineInformation`,`LineDescription`,`LineOption`,`ProductsId`)
VALUES('LineName','LineInformation','LineDescription',1,1)";

 
$sql[6] = "CREATE TABLE Lang (
    LangId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LangName VARCHAR(30) NOT NULL UNIQUE,
    LangVi VARCHAR(200),
    LangEn VARCHAR(200),
    LangCn VARCHAR(200),
    LangKr VARCHAR(200),
    LangOption INT(1),
    LangCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    LangUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    ";

$sql[7] = "INSERT INTO Lang(`LangName`,`LangVi`,`LangEn`,`LangCn`,`LangKr`,`LangOption`)
VALUES('Products','Sản phẩm','Products','Products','Products',1)";

$sql[8] = "CREATE TABLE sanluong (
    SanLuongId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LineId INT(6),
    ProductsId INT(6),
    SanluongQty INT(10),
    SanluongType VARCHAR(10),
    SanluongTimes VARCHAR(10),
    SanLuongCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    SanLuongUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    ";


$sql[8] = "CREATE TABLE kehoach (
    KeHoachId INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    LineId INT(6),
    ProductsId INT(6),
    KeHoachQty INT(10),
    KeHoachCreateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    KeHoachUpdateDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );
    ";


for ($i=0; $i < count($sql) ; $i++) { 
    $oDB -> query($sql[$i]);
}

$oDB = null;