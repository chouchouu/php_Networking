<?php
require "dbCon.php";

$query ="SELECT * FROM user";
$data =mysqli_query($connect,$query);

//tao class
class User{
    function User($id,$name,$email,$password){
        $this->Id=$id;
        $this->name =$name;
        $this->email=$email;
        $this->password=$password;
    }
}
$mangFs =array();
//them phan tu vao mang
while ($row = mysqli_fetch_assoc($data)){
   array_push($mangFs,new User($row['id'],$row['name'],$row['email'],$row['password']));
}
echo json_encode($mangFs);
?>