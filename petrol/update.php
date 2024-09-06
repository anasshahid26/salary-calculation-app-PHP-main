<?php
	include('conn.php');
	if(isset($_POST['edit'])){
		$id=$_POST['id'];
		$rate=$_POST['rate'];
		$month=$_POST['month'];
		$year=$_POST['year'];
		
		mysqli_query($conn,"update `petrol_rate` set rate='$rate', month='$month' , year='$year' where id='$id'");
	}
?>