<?php  include('includes/config.php'); ?>
<?php 
  if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            // if($email == $_POST['email'] && $password == $_POST['password']){
                if($check_email && $password){
                    header('location: http://localhost/People_Tracer/appapis/home.php');
                    $dataArray=array();	  
                    $responseObj = new stdClass();
                    $responseObj->status = 'success';
                    $responseObj->data = $dataArray; 	  
                    echo json_encode($responseObj);
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('http://localhost/People_Tracer/appapis/login.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    

    //if user click continue button in forgot password form
    // if(isset($_POST['check-email'])){
    //     $email = mysqli_real_escape_string($con, $_POST['email']);
    //     $check_email = "SELECT * FROM usertable WHERE email='$email'";
    //     $run_sql = mysqli_query($con, $check_email);
    //     if(mysqli_num_rows($run_sql) > 0){
    //         $code = rand(999999, 111111);
    //         $insert_code = "UPDATE user SET code = $code WHERE email = '$email'";
    //         $run_query =  mysqli_query($con, $insert_code);
    //         if($run_query){
    //             $subject = "Password Reset Code";
    //             $message = "Your password reset code is $code";
    //             $sender = "From: shahiprem7890@gmail.com";
    //             if(mail($email, $subject, $message, $sender)){
    //                 $info = "We've sent a passwrod reset otp to your email - $email";
    //                 $_SESSION['info'] = $info;
    //                 $_SESSION['email'] = $email;
    //                 header('location: reset-code.php');
    //                 exit();
    //             }else{
    //                 $errors['otp-error'] = "Failed while sending code!";
    //             }
    //         }else{
    //             $errors['db-error'] = "Something went wrong!";
    //         }
    //     }else{
    //         $errors['email'] = "This email address does not exist!";
    //     }
    // }
    ?>