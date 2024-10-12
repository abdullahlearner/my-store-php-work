<?php 
include_once("../conn.php");





if(isset($_GET['id'])){
   $product_id = $_GET['id'];

   $sql = "SELECT product_image from products where product_id=?";

   $stmt = $conn->prepare($sql);

   $stmt->bind_param("i",$product_id);
   $stmt->execute();
   
   $result = $stmt->get_result();
   $product = $result->fetch_assoc();

   $image_path = "../assets/uploads/".$product['product_image'];
   
   if(file_exists($image_path)){
        unlink($image_path);
   }

   $delete_sql = "DELETE FROM products where product_id=?";
   $stmt = $conn->prepare($delete_sql);
   $stmt->bind_param("i",$product_id);

   if($stmt->execute()){
        $msg = "Product Deleted Successfully";
        header("location:../productlist.php?msg=".$msg);
   }else{
    $msg = "Error deleting Product";
    header("location:../productlist.php?msg=".$msg);
   }    



}

?>