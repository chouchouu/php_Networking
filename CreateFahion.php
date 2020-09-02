<?php
	require_once 'include/DB_Functions.php';
	$db=new DB_Functions();
	$json=array();
	
	if(isset($_POST['tenfs'])&& $_POST['tenfs']!='')
	{
		$tenfs=$_POST['tenfs'];
		$giafs=$_POST['giafs'];
		$motafs=$_POST['motafs'];
		
		$result=$db->fashion($tenfs,$giafs,$motafs);
		
		if($result)
		{
			$json["thanhcong"]=1;
			$json["thongbao"]="tao san pham thanh cong";
		}
		else
		{
			$json["thanhcong"]=0;
			$json["thongbao"]="tao khong thanh cong";
		}
	}
	else
	{
		$json["thanhcong"]=0;
		$json["thongbao"]="chua nhap ten san pham";
	}
	
	echo json_encode($json);

?>
