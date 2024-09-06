<?php
	include('conn.php');
	if(isset($_POST['add'])){

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
		
		mysqli_query($conn,"INSERT INTO `user`(`userid`, `EmpCode`, `firstname`, `lastname`, `gender`, `cnic`, `email`, `phone`, `address`, `designation`, `department`, `basicsalary`, `medicalallownce`, `petrolallownce`, `fixedpetrolallownce`, `petrolquantity`) VALUES
		 ('0','$EmpCode','$firstname','$lastname','$gender','$cnic','$email','$phone','$address','$designation','$department','$basicsalary','$medicalallownce','$petrolallownce','$fixedpetrolallownce','$petrolquantity')");
	}
?>