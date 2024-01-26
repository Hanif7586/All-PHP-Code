connection.php File Code 
<?php  
 $hostname = "localhost";  
 $dbusername = "atikulmy_practice_user";  
 $password = "@kGIs#BLfuF-";  
 $database = "atikulmy_practice_db";  
 $con = mysqli_connect($hostname,$dbusername,$password,$database);  
 if (mysqli_connect_errno()){  
   echo "Connection Faild <br> " . mysqli_connect_error();  
 } else {  
   echo "Database Connected";  
 }  
 ?>  


upload_img.php File Code :
<?php  
 include"connection.php";  
 if(isset($_POST['images'])){  
   $target_path = "Images/";  
   $image = $_POST['images'];  
   $name = $_POST['name'];  
   $imageStore = rand()."_".time().".jpeg";  
   $target_path = $target_path."/".$imageStore;  
   file_put_contents($target_path, base64_decode($image));  
   $select = "INSERT INTO `usersData`(`images`, `name`) VALUES ('$imageStore','$name')";  
   $response = mysqli_query($con,$select);  
   if($response){  
     echo "Image Upload";  
     mysqli_close($con);  
   } else{  
     echo "Something Wrong";  
   }  
 }  
 ?>  


listapi.php File Code :
<?php  
 include"connection.php";  
 $sql = "SELECT * FROM usersData";  
 $result = mysqli_query($con,$sql);  
 $data = array();  
 foreach($result as $item){  
   $id = $item['id'];  
   $name = $item['name'];  
   $images = $item['images'];  
   $userInfo['id'] = $id;  
   $userInfo['name'] = $name;  
   $userInfo['images'] = $images;  
   array_push($data,$userInfo);  
 }  
 echo json_encode($data);  
 ?>  