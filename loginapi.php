<?php
$conn = mysqli_connect('localhost','root','','demo1');
	$_SESSION['conn'] = $conn;
	if(!$conn){	
		die("Connection Failed:" . mysqli_connect_error());
	}
	
	if(isset($_GET['email']) and isset($_GET['password'])){
		$email = $_GET['email'];
		$password = $_GET['password'];
		$sql = mysqli_query($conn, "SELECT * FROM `api` WHERE `email`='$email' and `pass`='$password'");
		$count = mysqli_num_rows($sql);
		$row = mysqli_fetch_assoc($sql);
			if($count == 1){
				echo $email.$row['name'].$row['contact'];
			} else {
				echo "invalid data";
			}
		
	}
?>