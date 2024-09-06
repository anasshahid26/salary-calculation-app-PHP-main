<?php
	include('conn.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<th>id</th>
				<th>rate</th>
				<th>month</th>
				<th>year</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"select * from `petrol_rate`");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['id']; ?></td>
									<td><?php echo $urow['rate']; ?></td>
									<td><?php echo $urow['month']; ?></td>
									<td><?php echo $urow['year']; ?></td>
									<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-pencil"></span> Edit</button> | <button class="btn btn-danger delete" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-trash"></span> Delete</button>
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