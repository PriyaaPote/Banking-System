<?php
	$conn = mysqli_connect("localhost","root","","demo1");
	if(isset($_GET['account_number']) and isset($_GET['update']) and isset($_GET['amount'])){
		$update = $_GET['update'];
		$account_number = $_GET['account_number'];
		$amount = $_GET['amount'];
		$sql = mysqli_query($conn, "SELECT * FROM `api_key` WHERE `acc_no`='$account_number'");
		$count = mysqli_num_rows($sql);
		$data = mysqli_fetch_assoc($sql);
		if($count == 1){
			if($update == "add"){
				$amount1 = $amount + $data['money'];
				$add = mysqli_query($conn, "UPDATE `api_key` SET `money`='$amount1' WHERE `acc_no`='$account_number'");
				if($add){
					echo $amount.' credited in your account ' . $account_number;
				}
			}elseif($update == "remove"){
				$amount1 = $data['money'] - $amount;
				$remove = mysqli_query($conn, "UPDATE `api_key` SET `money`='$amount1' WHERE `acc_no`='$account_number'");
				if($remove){
					echo $amount.' debited from your account ' . $account_number;
				}
			}
		}
	}
?>