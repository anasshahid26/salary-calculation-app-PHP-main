<?php
	include('conn.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>Enter Employee Details</title>
	</head>
<body>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">Enter Employee Details</h2></center>
					<hr>
				<div>
					<form class = "form-inline">
					<div class = "form-group">
							<label>EmpCode (Must be unique and match with your attendance EmpCode) :</label>
							<input type  = "text" id = "EmpCode" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Firstname:</label>
							<input type  = "text" id = "firstname" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Lastname:</label>
							<input type  = "text" id = "lastname" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Gender:</label>
							<select id="gender" name="gender">
    						<option value="male">Male</option>
    						<option value="female">Female</option>
  							</select>
						</div>
						</br>
						<div class = "form-group">
							<label>CNIC:</label>
							<input type  = "text" id = "cnic" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Email:</label>
							<input type  = "text" id = "email" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Phone:</label>
							<input type  = "text" id = "phone" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Address:</label>
							<input type  = "text" id = "address" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Designation:</label>
							<input type  = "text" id = "designation" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Department:</label>
							<input type  = "text" id = "department" class = "form-control">
						</div>
						</br>
						<p>Salary Information</p>

						<div class = "form-group">
							<label>Basic Salary:</label>
							<input type  = "text" id = "basicsalary" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Medical Allownce:</label>
							<input type  = "text" id = "medicalallownce" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Petrol Allownce:</label>
							<input type  = "text" id = "petrolallownce" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<label>Fixed Petrol Allownce?</label>
							<select id="fixedpetrolallownce" name="gender">
    						<option value="1">YES</option>
    						<option value="0">NO</option>
  							</select>
						</div>
						</br>
						
						<div class = "form-group">
							<label>Petrol Quantity (Litre):</label>
							<input type  = "text" id = "petrolquantity" class = "form-control">
						</div>
						</br>
						<div class = "form-group">
							<button type = "button" id="addnew" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add</button>
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
	</div>
</body>
<script src = "js/jquery-3.1.1.js"></script>	
<script src = "js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		showUser();
		//Add New
		$(document).on('click', '#addnew', function(){
			if ($('#EmpCode').val()=="" || $('#firstname').val()=="" || $('#lastname').val()=="" || $('#gender').val()=="" || $('#cnic').val()=="" || $('#email').val()=="" 
			|| $('#phone').val()=="" || $('#address').val()=="" || $('#basicsalary').val()==""  || $('#medicalallownce').val()==""  || $('#petrolallownce').val()=="" || $('#fixedpetrolallownce').val()=="" || $('#petrolquantity').val()==""  ){
				alert('Please input data first');
			}
			else{
			$EmpCode=$('#EmpCode').val();
			$firstname=$('#firstname').val();
			$lastname=$('#lastname').val();
			$gender=$('#gender').val();
			$cnic=$('#cnic').val();
			$email=$('#email').val();
			$phone=$('#phone').val();
			$address=$('#address').val();
			$designation=$('#designation').val();
			$department=$('#department').val();
			$basicsalary=$('#basicsalary').val();
			$medicalallownce=$('#medicalallownce').val();
			$petrolallownce=$('#petrolallownce').val();
			$fixedpetrolallownce=$('#fixedpetrolallownce').val();
			$petrolquantity=$('#petrolquantity').val();	
			
			
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						EmpCode : $EmpCode,
						firstname: $firstname,
						lastname: $lastname,
						gender: $gender,
						cnic: $cnic,
						email: $email,
						phone: $phone,
						address: $address,
						designation: $designation,
						department: $department,
						basicsalary: $basicsalary,
						medicalallownce: $medicalallownce,
						petrolallownce: $petrolallownce,
						fixedpetrolallownce: $fixedpetrolallownce,
						petrolquantity: $petrolquantity,
						add: 1,
					},
					success: function(response){
						console.log(response);
						showUser();
					},
					failure: function(response)
					{
						console.log(response);
					}
				});
			}
		});
		//Delete
		$(document).on('click', '.delete', function(){
			$id=$(this).val();

			if (confirm('Are you sure you want to Delete this thing into the database?')) {
			  // Save it!
			  $.ajax({
					type: "POST",
					url: "delete.php",
					data: {
						id: $id,
						del: 1,
					},
					success: function(){
						showUser();
					}
				});
  			console.log('Thing was saved to the database.');
			} else {
  			// Do nothing!
  			console.log('Thing was not saved to the database.');
			}


				
		});
		//Update
		$(document).on('click', '.updateuser', function(){
			$uid=$(this).val();
			alert($uid);
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			
			$uEmpCode=$('#uEmpCode'+$uid).val();
			$ufirstname=$('#ufirstname'+$uid).val();
			$ulastname=$('#ulastname'+$uid).val();

			$ugender=$('#ugender'+$uid).val();
			$ucnic=$('#ucnic'+$uid).val();
			$uemail=$('#uemail'+$uid).val();
			$uphone=$('#uphone'+$uid).val();
			$uaddress=$('#uaddress'+$uid).val();
			$udesignation=$('#udesignation'+$uid).val();
			$udepartment=$('#udepartment'+$uid).val();
			$ubasicsalary=$('#ubasicsalary'+$uid).val();
			$umedicalallownce=$('#umedicalallownce'+$uid).val();
			$upetrolallownce=$('#upetrolallownce'+$uid).val();
			$ufixedpetrolallownce=$('#ufixedpetrolallownce'+$uid).val();
			$upetrolquantity=$('#upetrolquantity'+$uid).val();

				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						EmpCode : $uEmpCode,
						firstname: $ufirstname,
						lastname: $ulastname,
						gender: $ugender,
						cnic: $ucnic,
						email: $uemail,
						phone: $uphone,
						address: $uaddress,
						designation: $udesignation,
						department: $udepartment,
						basicsalary: $ubasicsalary,
						medicalallownce: $umedicalallownce,
						petrolallownce: $upetrolallownce,
						fixedpetrolallownce: $ufixedpetrolallownce,
						petrolquantity: $upetrolquantity,
						edit: 1,
					},
					success: function(response){
						console.log(response);
						showUser();
					},
					failure: function(response)
					{
						console.log(response);
					}
				});
		});
	
	});
	
	//Showing our Table
	function showUser(){
		$.ajax({
			url: 'show_user.php',
			type: 'POST',
			async: false,
			data:{
				show: 1
			},
			success: function(response){
				$('#userTable').html(response);
			}
		});
	}
	
</script>
</html>