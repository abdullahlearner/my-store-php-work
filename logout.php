<?php
session_start();

session_destroy();

$error =  "Account logout Succsesfully";

    header("location:login.php?error=$error");
?>