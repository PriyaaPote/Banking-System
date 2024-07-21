<?php
$conn = mysqli_connect("localhost","root","","demo");
	if(!$conn){
		mysqli_connect_error();
	}
	if(isset($_GET['name']) && isset($_GET['email'] )&& isset( $_GET["password"]) && isset($_GET['contact'])){
		$name= $_GET['name'];
		$email = $_GET['email'];
		$passw = $_GET["password"];
		$contact = $_GET["contact"];
		
		$sqlr="SELECT * FROM `api` WHERE (`email`='$email')";
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
			$sql ="INSERT INTO `api`(`name`,`contact`,`email`, `pass`) VALUES ('$name','$contact','$email','$passw')";
			$sql = mysqli_query($conn,$sql);
			echo "signup done";
			
			
		}	
	}
?>