<?php
require "dbCon.php";
$id = $_POST['idFS'];
$tenfs=$_POST['tenFS'];
$giafs=$_POST['giaFS'];
$motafs=$_POST['motaFS'];

$query ="UPDATE fashion SET tenfs='$tenfs',giafs='$giafs',motafs='$motafs' WHERE id='$id'";
if(mysqli_query($connect,$query)){
    echo "success";
}else{
    echo "error";
}
?>