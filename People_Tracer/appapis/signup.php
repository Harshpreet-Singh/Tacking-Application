<?php 
    error_reporting(0);
    include('includes/config.php'); 
    $data = json_decode(file_get_contents('php://input'), true);
    // $parent_id="$data['parent_id']";
    $first_name=$data['first_name'];
    $last_name=$data['last_name'];
    $email=$data['email'];
    $phone=$data['phone'];
    $longitude="";
    $latitude="";
    


    // $sql = "INSERT INTO users (first_name, last_name, email, phone, )
    // -- VALUES ('".$first_name."', 'Doe', 'john@example.com')";
    $sql = "INSERT INTO users (parent_id, first_name, last_name, email, phone, longitude, latitude )
    VALUES ('""','".$first_name."', '".$last_name."', '".$email."', '".$phone."', '".$longitude."', '".$latitude."')";

    if ($conn->query($sql) === TRUE) {
        $dataArray=array();	  
        $responseObj = new stdClass();
        $responseObj->status = 'success';
        $responseObj->message = 'Registration Successfull';
        $responseObj->data = $dataArray; 	  
        echo json_encode($responseObj);

    } else {  
        $dataArray=array();	  
        $responseObj = new stdClass();
        $responseObj->status = 'failed';
        $responseObj->message = 'Email Already Exist';
        $responseObj->data = $dataArray; 	  
        echo json_encode($responseObj);
	//    exit;
    }

    // resopnse got ---------------============-         {"status":"success","message":"Registration Successfull","data":[]}



	   exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>