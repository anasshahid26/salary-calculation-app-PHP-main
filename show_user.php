<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>EmpCode</th>
				<th>Firstname</th>
				<th>Lastname</th>

				<th>gender</th>
				<th>cnic</th>
				<th>email</th>
				<th>phone</th>
				<th>address</th>
				<th>designation</th>
				<th>department</th>
				<th>basicsalary</th>
				<th>medicalallownce</th>
				<th>petrolallownce</th>
				<th>fixedpetrolallownce</th>
				<th>petrolquantity</th>
				

				<th>Action</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"select * from `user`");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['EmpCode']; ?></td>
									<td><?php echo $urow['firstname']; ?></td>
									<td><?php echo $urow['lastname']; ?></td>

									<td><?php echo $urow['gender']; ?></td>
									<td><?php echo $urow['cnic']; ?></td>
									<td><?php echo $urow['email']; ?></td>
									<td><?php echo $urow['phone']; ?></td>
									<td><?php echo $urow['address']; ?></td>
									<td><?php echo $urow['designation']; ?></td>
									<td><?php echo $urow['department']; ?></td>
									<td><?php echo $urow['basicsalary']; ?></td>
									<td><?php echo $urow['medicalallownce']; ?></td>
									<td><?php echo $urow['petrolallownce']; ?></td>
									<td><?php echo $urow['fixedpetrolallownce']; ?></td>
									<td><?php echo $urow['petrolquantity']; ?></td>

									<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['userid']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['userid']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
									<?php include('edit_modal.php'); ?>
									</td>
								</tr>
							<?php
						}
					
					?>
				</tbody>
			</table>
		<?php
	}

?>