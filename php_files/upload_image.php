<?php 
	require 'config.php';

	// your directory
	$dir = "../uploads/";

	// move file into your directory
	move_uploaded_file($_FILES["file_data"]["tmp_name"], $dir. $_FILES["file_data"]["name"]);

	// your moved file path
	$url = './uploads/'.$_FILES["file_data"]["name"];

	// json_encode for ajax call
	echo json_encode(array('st'=>1, 'url'=>$url));
	
 ?>