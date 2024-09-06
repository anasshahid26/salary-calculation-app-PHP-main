<?php
	include('conn.php');
	if(isset($_POST['edit'])){
						$id=$_POST['id'];

						$EmpCode = $_POST['EmpCode'];
						$firstname= $_POST['firstname'];
						$lastname= $_POST['lastname'];
						$gender= $_POST['gender'];
						$cnic= $_POST['cnic'];
						$email= $_POST['email'];
						$phone= $_POST['phone'];
						$address= $_POST['address'];
						$designation= $_POST['designation'];
						$department= $_POST['department'];
						$basicsalary= $_POST['basicsalary'];
						$medicalallownce= $_POST['medicalallownce'];
						$petrolallownce= $_POST['petrolallownce'];
						$fixedpetrolallownce= $_POST['fixedpetrolallownce'];
						$petrolquantity= $_POST['petrolquantity'];
		


		mysqli_query($conn,"UPDATE `user` SET `EmpCode`='$EmpCode',`firstname`='$firstname',`lastname`='$lastname',`gender`='$gender',
		`cnic`='$cnic',`email`='$email',`phone`='$phone',`address`='$address',`designation`='$designation',`department`='$department',
		`basicsalary`='$basicsalary',`medicalallownce`='$medicalallownce',`petrolallownce`='$petrolallownce',`fixedpetrolallownce`='$fixedpetrolallownce',`petrolquantity`=$petrolquantity 
		where userid='$id'");
	}
?>