<?php
require "dbCon.php";

$id = $_POST['id'];
$password = $_POST['password'];

$querry = "UPDATE user SET password = '$password' WHERE id='$id'";
$data = mysqli_query($connect,$querry);

if($data){
    echo "thanh cong";
}else{
    echo "that bai";
}
?>