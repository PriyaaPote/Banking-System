<?php
$conn = mysqli_connect("localhost","root","","demo1");
	if(!$conn){
		mysqli_connect_error();
	}
	if(isset($_GET['name']) && isset($_GET['account_no']) && isset($_GET['email'] )&& isset( $_GET["password"]) && isset($_GET['contact']) && isset($_GET['money'])){
		$name= $_GET['name'];
		$email = $_GET['email'];
		$passw = $_GET["password"];
		$contact = $_GET["contact"];
		$acc = $_GET["account_no"];
		$money = $_GET["money"];
		
		$sqlr="SELECT * FROM `api_key` WHERE (`email`='$email')";
		$res=mysqli_query($conn,$sqlr);
		
		if (mysqli_num_rows($res) > 0) {
				
				$row = mysqli_fetch_assoc($res);
				if($email==$row['email'])
				{		
						
						echo "email already exists";
				}
				else{
					
				}
		}
		else{
			$sql ="INSERT INTO `api_key`(`name`, `acc_no`, `email`, `contact`, `money`) VALUES ('$name','$acc','$email','$contact','$money')";
			$sql = mysqli_query($conn,$sql);
			echo "signup done";
			
			
		}	
	}
?>