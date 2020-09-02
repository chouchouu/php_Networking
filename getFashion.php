<?php
require "dbCon.php";

$query ="SELECT * FROM fashion";
$data =mysqli_query($connect,$query);

//tao class
class Fashion{
    function Fashion($id,$tenfs,$giafs,$motafs){
        $this->Id=$id;
        $this->Ten =$tenfs;
        $this->Gia=$giafs;
        $this->Mota=$motafs;
    }
}
$mangFs =array();
//them phan tu vao mang
while ($row = mysqli_fetch_assoc($data)){
   array_push($mangFs,new Fashion($row['id'],$row['tenfs'],$row['giafs'],$row['motafs']));
}
echo json_encode($mangFs);
?>