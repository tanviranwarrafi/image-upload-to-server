<?php

$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "image_upload_volly";

$con = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

if($con){
 $image_select = $_POST["image_select"];
 $image = $_POST["image"];
 
 $sql = "insert into imageinfo(image) values('$image')";
 $upload_path = "uploads/$image.jpg";
 
 if(mysqli_query($con,$sql)){
	 
	file_put_contents($upload_path,base64_decode($image_select));
	echo json_encode(array('response' => 'Image Uploaded Successfully inserted'));
 }
 else{
	echo json_encode(array('response' => 'Image Upload Failed'));
	}
}

else{
	echo json_encode(array('response' => 'Image Upload Failed'));
}

mysqli_close($con);

 
?>