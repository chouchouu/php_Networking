<?php
require "dbCon.php";
$idFS = $_POST['idfashion'];
$query = "DELETE FROM fashion WHERE id='$idFS'";
if(mysqli_query($connect,$query)){
    echo "success";
}else{
    echo "error";
}
?>