<?php 
		$con=mysqli_connect("localhost","id11477192_arsl","12345678","id11477192_studentmanagemetnsystem");
	
		$email = $_POST["email"];
		$password = $_POST["password"];

		$sql = "SELECT * FROM student WHERE  email = '$email' AND password = '$password'";
		$result = mysqli_query($con,$sql);
		
		if($result->num_rows > 0){
			echo "logged in successfully" ;
		}else{
  			 echo "user not found";
}
?>