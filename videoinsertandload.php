
videos folder create
con.php
 <?php  
 $hostname = "localhost";  
 $dbusername = "id21870610_testvideodsf";  
 $password = "Hs426433@";  
 $database = "id21870610_testvideo";  
 $con = mysqli_connect($hostname,$dbusername,$password,$database);  
 if (mysqli_connect_errno()){  
   echo "Connection Faild <br> " . mysqli_connect_error();  
 } else {  
   echo "";  
 }  
 ?>

upload_script.php

<?php
require("con.php");

$ACTION = $_POST['action'];
$fileData = $_POST['file'];
$TITLE = $_POST['title'];
$MOTAMOT = $_POST['motamot']; // Added motamot parameter

if ($con) {
    if ($ACTION == "action") {
        $FILENAME = "VIDEO_" . uniqid() . ".mp4";
        file_put_contents("videos/" . $FILENAME, base64_decode($fileData));

        // Modified query to include motamot
        $query = "INSERT INTO `userdata` (`title`, `motamot`, `video`) VALUES ('$TITLE', '$MOTAMOT', '$FILENAME')";

        $result = mysqli_query($con, $query);

        if ($result) {
            echo "successful";
        } else {
            echo "Upload failed: " . mysqli_error($con);
        }

        mysqli_close($con);
    }
} else {
    echo "Connection to the database failed";
}
?>


videoshow.php
 <?php  
 include"con.php";  
 $sql = "SELECT * FROM userdata";  
 $result = mysqli_query($con,$sql);  
 $data = array();  
 foreach($result as $item){  
   $id = $item['id'];  
   $title = $item['title'];  
   $motamot = $item['motamot'];  
   $video = $item['video'];  
   $userInfo['id'] = $id;  
   $userInfo['title'] = $title;  
   $userInfo['video'] = $video;  
     $userInfo['motamot'] =$motamot;  
   array_push($data,$userInfo);  
 }  
 echo json_encode($data);  
 ?> 
