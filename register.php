<?php 
	$con=mysqli_connect("localhost","id11477192_arsl","12345678","id11477192_studentmanagemetnsystem");
	
	$name = $_POST["name"];
	$email = $_POST["email"];
	$password =$_POST["password"];

	$sql = "INSERT INTO student(name,email,password) VALUES ('$name','$email','$password')";
	$result = mysqli_query( $con,$sql );
	
	if($result) {
		echo "registered successfully";
	}
	else {
		echo "some error occured";
	}
?>