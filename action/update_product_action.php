<?php 

include_once("../conn.php");
// update 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $product_id = $_POST['product_id'];
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];

    if(!empty($_FILES['product_image']['name'])){
        $traget_dir = "../assets/uploads/";

    $imageFiletype = strtolower(pathinfo($_FILES['prodcut_img']['name'], PATHINFO_EXTENSION));

    $new_file_name = uniqid() . '.' . $imageFiletype;
    $traget_file = $traget_dir . $new_file_name;

    $old_image = $traget_dir . '.' .  $_FILES['product_image']['name'];

    if(file_exists($old_image)){
        unlink($old_image);
    }

    move_uploaded_file($_FILES["prodcut_img"]["tmp_name"],$traget_file);
    }else{
        $new_file_name = $_FILES["prodcut_img"]["tmp_name"];
    }


    $update_sql = "UPDATE products SET product_title=?, product_desc=?, product_price=? , product_image=? WHERE product_id=? ";

    $stmt = $conn->prepare($update_sql);

    $stmt->bind_param("ssdsi", $title, $desc, $price, $new_file_name, $product_id);

   if( $stmt->execute()){
    $msg = "Prodcut updated successfully";
    header("location:../productlist.php?msg=".$msg);
   }else{
    $msg = "Error Updating product";
    header("location:../productlist.php?msg=".$msg);
   }
 


}


// print_r($_POST);

// print_r($_FILES);


?>