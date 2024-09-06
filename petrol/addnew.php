<?php
	include('conn.php');
	if(isset($_POST['add'])){
		$rate=$_POST['rate'];
		$month=$_POST['month'];
		$year=$_POST['year'];
		
		mysqli_query($conn,"insert into `petrol_rate` (rate, month,year) values ('$rate', '$month','$year')");
	}
?>