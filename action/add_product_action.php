<?php

include_once "../conn.php";
echo "<pre>";
// print_r($_POST);

// print_r($_FILES);


// add product 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];

    $traget_dir = "../assets/uploads/";

    // $traget_file = $traget_dir . basename($_FILES['prodcut_img']['name']);

    $imageFiletype = strtolower(pathinfo($_FILES['prodcut_img']['name'], PATHINFO_EXTENSION));

    $new_file_name = uniqid() . '.' . $imageFiletype;
    $traget_file = $traget_dir . $new_file_name;



    $check = getimagesize($_FILES["prodcut_img"]["tmp_name"]);

    // print_r($check);

    if ($check !== false) {
        echo "file is an iamge - " . $check['mime'];
        if (!file_exists($traget_file)) {
            if ($_FILES['prodcut_img']['size'] <= 500000) {
                if ($imageFiletype == "jpg" || $imageFiletype == "png" || $imageFiletype == "jpeg" || $imageFiletype == "webp" ) {

                    if(move_uploaded_file($_FILES["prodcut_img"]["tmp_name"],$traget_file)){
                        echo "The file" .  basename($_FILES['prodcut_img']['name']). "has been uploaded";

                        $stmt = $conn->prepare("INSERT INTO products(product_title,product_desc,product_price,product_image)
                        VALUES(?,?,?,?)");

                        $stmt->bind_param("ssds",$title,$desc,$price,$new_file_name);
                        if($stmt->execute()){
                            echo "new product added";
                            header("location:../productlist.php");
                        }else{  
                            echo "error";
                        }

                    }else{
                        echo "sorry there was an error uploading your file";
                    }

                } else {
                    echo "sorry only JPG , PNG , JPEG & WEBP";
                }

            } else {
                echo "sorry your file is to large";
            }

        } else {
            echo "sorry File already exists";
        }
    } else {
        echo "File is not an image.";
    }

    echo $imageFiletype;

}
