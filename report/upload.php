<?php
$target_dir = "images/";
$name = $_POST['picturename'];

echo $target_file = $target_dir . basename($_FILES[$name]["name"]);
//var_dump($_POST);
echo "<br>";
//var_dump($_FILES);
//exit();
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if($imageFileType != "jpg" && $imageFileType != "JPG" && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES[$name]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES[$name]["name"]). " has been uploaded.";
        //Đổi tên
        // rename($target_file, "image/".$_FILES["issuepicture"]["name"].".jpg");
        rename($target_file, "images/".$name.".jpg");
        
        //thay doi kich thuoc anh
        //    $resize = new ResizeImage("image/img_".$id.".jpg");
        //     $resize->resizeTo(1500, 1500, 'maxWidth');
        //     $resize->saveImage("image/img_".$id.".jpg");

        //     $resize = new ResizeImage("image/img_".$id.".jpg");
        //     $resize->resizeTo(100, 100, 'maxWidth');
        //     $resize->saveImage("image/small/img_".$id.".jpg");

        header('Location: index.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
