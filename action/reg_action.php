<?php 
include_once("../conn.php");


 function filter($value){

    // Sanitize and prepare the input value for safe use in the application
    $value =  htmlspecialchars($value);
    $value =  stripslashes($value);
    $value = trim($value);
    return $value;
 }

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
   $username = filter($_POST['username']);
   $email = filter($_POST['email']);
   $country = filter($_POST['country']);
   $password = filter($_POST['password']);
   $cpassword = filter($_POST['cpassword']);
   $cellno = filter($_POST['cellno']);

   // echo $password;

   // echo $hashed_password;

   $error = [];

   if(empty($username)){
      $error['username_error'] =  "username field are required";
   }
   if(empty($email)){
      $error['email_error'] =  "email field are required";
   }
   if(empty($country)){
      $error['country_error'] =  "Country field are required";
   }
   if(empty($password)){
      $error['password_error'] =  "password field are required";
    
   }
   if(empty($cpassword)){
      $error['cpassword_error'] =  "cpassword field are required";
   }
   if($password != $cpassword){
      $error['password_match_error'] =  "Password Do not match";
   }
   if(empty($cellno)){
      $error['cellno_error'] =  "cellno field are required";
   }

//   echo  count($error);

   if(count($error) > 0){
      $query_string = http_build_query(['errors'=>$error]);

      header("location:../register.php?$query_string");
   }else{

     

      // echo $password;
      // print_r($_POST);
      $stmt =  $conn->prepare("INSERT INTO user(user_name,user_email,user_password,user_cell,user_country) 
                              VALUES(?,?,?,?,?)");
      $hashed_password =  password_hash($password, PASSWORD_DEFAULT);

      $stmt->bind_param("sssss",$username,$email,$hashed_password,$cellno,$country);
      if($stmt->execute()){
         echo "New record created successfully";
      }else{
         echo "Error" . $stmt->error;
      }


   }

   // echo "<pre>";
   // print_r($error);




}












// htmlspecialchars()

//  $withoutfilter = $_POST['username'];



// $len =  strlen($withoutfilter);

//  echo $len;

// echo "<br>";

//  $name = filter($_POST['username']);

//  $nameleng = strlen($name);
//  echo $nameleng;


?>