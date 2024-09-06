<div class="modal fade" id="edit<?php echo $urow['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from `petrol_rate` where id='".$urow['id']."'");
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
			rate: <input type="text" value="<?php echo $nrow['rate']; ?>" id="urate<?php echo $urow['id']; ?>" class="form-control">
			month: <input type="text" value="<?php echo $nrow['month']; ?>" id="umonth<?php echo $urow['id']; ?>" class="form-control">
			year: <input type="text" value="<?php echo $nrow['year']; ?>" id="uyear<?php echo $urow['id']; ?>" class="form-control">
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><span class = "glyphicon glyphicon-remove"></span> Cancel</button> | <button type="button" class="updateuser btn btn-success" value="<?php echo $urow['id']; ?>"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
		</div>
		</form>
    </div>
  </div>
</div>