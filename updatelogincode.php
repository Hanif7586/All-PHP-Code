<?php 
    $hostname = "localhost";  
    $dbusername = "bulbulso_mob_cash_user";  
    $db_password = "mob_cash_user@";  
    $database = "bulbulso_mob_cash_db";  

    $con = mysqli_connect($hostname, $dbusername, $db_password, $database);  

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    $cust_id = $_POST["cust_id"];
    $password = $_POST["password"];
    $work_code = $_POST["work_code"];
  

    $sql = "SELECT * FROM user WHERE cust_id = '$cust_id' AND password = '$password' AND work_code = '$work_code'";
        
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $response = array(
                'success' => '1',
                'cust_id' => $row['cust_id'],
                'cust_name' => $row['cust_name'],
                'address' => $row['address']
            );
            echo json_encode($response);
        } else {
            echo json_encode(array('success' => '0'));
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
?>
