<?php
	require_once 'include/DB_Functions.php';
	$db=new DB_Functions();

	if(isset($_POST['tag'])&& $_POST['tag']!='')
	{
		$tag=$_POST['tag'];
	
		$json=array("tag"=>$tag,"thanhcong"=>0,"loi"=>0);	
	
		if($tag=='login')
		{
			xulydangnhap($json,$db);
		}
		else if($tag=='register')
		{
			xulydangki($json,$db);
		}
		else 
		{
			echo "Yêu cầu không hợp lệ";
		}
	}
	else
	{
		echo "Truy cập không được";
	}
	
	
	function xulydangnhap($json,$db)
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$user=$db->getUser($email,$password);
	
	if($user!=false) // tim thay user
	{
		
		$json["thanhcong"]=1;
		$json["user"]["id"]=$user["id"];
		$json["user"]["name"]=$user["name"];
		$json["user"]["email"]=$user["email"];
		$json["user"]["password"]=$user["password"];	

		echo json_encode($json);
	}
	else //tim khong thay user
	{
		$json["loi"]=1;
		$json["thongbaoloi"]="Sai Email hoặc Password";
		
		echo json_encode($json);
	}
}

function xulydangki($json,$db)
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$name=$_POST["name"];
	
	if($db->checkUser($email))//true : da ton tai
	{
		$json["loi"]=2;
		$json["thongbaoloi"]="Địa chỉ email đã tồn tại";
		
		echo json_encode($json);
	}
	else//user chua ton tai, luu du lieu
	{
		$user=$db->storeUser($name,$email,$password);
		
		if($user!=false)//neu luu thanh cong
		{
			$json["thanhcong"]=1;
			$json["user"]["name"]=$user["name"];
			$json["user"]["email"]=$user["email"];
			echo json_encode($json);
		}
		else //neu luu that bai
		{
			$json["loi"]=1;
			$json["thongbaoloi"]="Đăng ký thất bại";
			
			echo json_encode($json);
		}
	}
}

	
?>
