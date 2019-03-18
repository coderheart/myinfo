<?php 
	// include connection file
	require 'config.php';

	if(isset($_POST['gender'])){
		$gender = $_POST['gender'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$uploaded_image =substr($_POST['uploaded_image'],2); // remove ./ form image path
		$loan_type = $_POST['loan_type'];
		$amount = $_POST['amount'];
		$message = $_POST['message'];

		$sql = "INSERT INTO account_information (gender,first_name,last_name,email,phone,address,image,loan_type,amount,message) VALUES ($gender,'$first_name','$last_name','$email','$phone','$address','$uploaded_image',$loan_type,'$amount','$message')";

		$insert = $conn->query($sql);
		if($insert){
			echo json_encode(array('st'=>1));
		}else{
 			echo "Error: ". $conn->error;
		}
	}




 ?>