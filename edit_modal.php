<div class="modal fade" id="edit<?php echo $urow['userid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from `user` where userid='".$urow['userid']."'");
		$nrow=mysqli_fetch_array($n);
	?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
		<div class = "modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<center><h3 class = "text-success modal-title">Update Member</h3></center>
		</div>
		<form class="form-inline">
				
		<div class="modal-body">
			EmpCode: <input type="text" value="<?php echo $nrow['EmpCode']; ?>" id="uEmpCode<?php echo $urow['userid']; ?>" class="form-control"> </br>
			Firstname: <input type="text" value="<?php echo $nrow['firstname']; ?>" id="ufirstname<?php echo $urow['userid']; ?>" class="form-control"></br>
			Lastname: <input type="text" value="<?php echo $nrow['lastname']; ?>" id="ulastname<?php echo $urow['userid']; ?>" class="form-control"></br>

			gender: <input type="text" value="<?php echo $nrow['gender']; ?>" id="ugender<?php echo $urow['userid']; ?>" class="form-control"></br>
			cnic: <input type="text" value="<?php echo $nrow['cnic']; ?>" id="ucnic<?php echo $urow['userid']; ?>" class="form-control"></br>
			email: <input type="text" value="<?php echo $nrow['email']; ?>" id="uemail<?php echo $urow['userid']; ?>" class="form-control"></br>
			phone: <input type="text" value="<?php echo $nrow['phone']; ?>" id="uphone<?php echo $urow['userid']; ?>" class="form-control"></br>
			address: <input type="text" value="<?php echo $nrow['address']; ?>" id="uaddress<?php echo $urow['userid']; ?>" class="form-control"></br>
			designation: <input type="text" value="<?php echo $nrow['designation']; ?>" id="udesignation<?php echo $urow['userid']; ?>" class="form-control"></br>
			department: <input type="text" value="<?php echo $nrow['department']; ?>" id="udepartment<?php echo $urow['userid']; ?>" class="form-control"></br>
			basicsalary: <input type="text" value="<?php echo $nrow['basicsalary']; ?>" id="ubasicsalary<?php echo $urow['userid']; ?>" class="form-control"></br>
			medicalallownce: <input type="text" value="<?php echo $nrow['medicalallownce']; ?>" id="umedicalallownce<?php echo $urow['userid']; ?>" class="form-control"></br>
			petrolallownce: <input type="text" value="<?php echo $nrow['petrolallownce']; ?>" id="upetrolallownce<?php echo $urow['userid']; ?>" class="form-control"></br>
			fixedpetrolallownce: <input type="text" value="<?php echo $nrow['fixedpetrolallownce']; ?>" id="ufixedpetrolallownce<?php echo $urow['userid']; ?>" class="form-control"></br>
			petrolquantity: <input type="text" value="<?php echo $nrow['petrolquantity']; ?>" id="upetrolquantity<?php echo $urow['userid']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['userid']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>