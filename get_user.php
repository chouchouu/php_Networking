<?php
require "dbCon.php";

$id = $_POST['id'];

$querry = "SELECT * FROM user WHERE id = '$id'";
$data = mysqli_query($connect,$querry);

$rows=mysqli_num_rows($data);

$arr = array();

if ($rows> 0){
    while ($getdata = $data ->fetch_assoc()){
        echo json_encode($getdata);
    }
    echo "thanh cong";

}else{
    echo "that bai";
}

?>
