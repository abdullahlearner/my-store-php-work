<?php 
session_start();

include_once('../conn.php');

$email = $_GET['email'];
$password = $_GET['pass'];

if(filter_var($email,FILTER_VALIDATE_EMAIL)){


        $stmt = $conn->prepare("SELECT user_id,user_email,user_password from user WHERE user_email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($id,$email,$hashed_password);
        if($stmt->fetch() && !empty($password)){
                if(password_verify($password,$hashed_password)){
                    $_SESSION['id'] = $id;
                    $_SESSION['email'] = $email;
                    
                   header("location:../dashboard.php");

                }else{

                    $error =  "Invalid Password";
                    header("location:../login.php?error=$error");
                }
        }else{
            $error =  "No Account Found with this Email";
            header("location:../login.php?error=$error");
        }
    
    
        // $stmt->fetch();
        // echo $id;
        // echo $email;
        // echo $hashed_password;

        // print_r($stmt);

    // echo "login successfull";


}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    
    $error = "invalid email format";
    header("location:../login.php?error=$error");
    }



// if(filter_var($email,FILTER_VALIDATE_EMAIL) && strlen($password) >=8){

//     echo "login successfull";

// }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    
//     echo "invalid email format";
    
// }else if(strlen($password)  < 8 ){
//     echo "password shuold bve at least 8 char";
// }else{
//     echo "invalid login";
// }




// if(filter_var($email,FILTER_VALIDATE_EMAIL)){
//     echo "login successfully";
// }else{
//     echo "invalid email";
// }


// echo strlen($password);

// if(strlen($password) >= 8){

//     echo " login  succseesfully";
    
// }else{
//     echo "password  should be at least 8 char";
  
// }





// if($email == 'abdullah@gmail.com' && $password == 'admin'){
//     echo "Email & password Same , login successfull <br>";
// }else{
//     echo "invalid login";
// }

// if($password == "admin"){
//     echo "Password same";
// }else{
//     echo "invalid password";
// }


// echo  "Email: " . $email;
// echo "<br>";
// echo  "Password :" . $password;

// echo "Email : " . $email . "<br>" . "Password : " . $password;
?>