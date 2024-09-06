<?php
	include('conn.php');
?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<title>petrol rates</title>
	</head>
<body>
	<div style="height:30px;"></div>
	<div class = "row">	
		<div class = "col-md-3">
		</div>
		<div class = "col-md-6 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">Enter Petrol Rates</h2></center>
					<hr>
				<div>
					<form class = "form-inline">
						<div class = "form-group">
							<label>rate:</label>
							<input type  = "text" id = "rate" class = "form-control">
						</div>
						<div class = "form-group">
							<label>month:</label>
							<select id="month" name="month">
    						<option value="january">january</option>
							<option value="february">february</option>
							<option value="march">march</option>
							<option value="april">april</option>
							<option value="may">may</option>
							<option value="june">june</option>
							<option value="july">july</option>
							<option value="august">august</option>
							<option value="september">september</option>
							<option value="octuber">octuber</option>
							<option value="november">november</option>
							<option value="december">december</option>
  							</select>
						</div>
						<div class = "form-group">
							<label>year:</label>
							<select id="year" name="year">
    						<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
							<option value="2026">2026</option>
							<option value="2027">2027</option>
							<option value="2028">2028</option>
							<option value="2029">2029</option>
							<option value="2030">2030</option>
  						</select>
						</div>
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
			if ($('#rate').val()=="" || $('#month').val()==""  || $('#year').val()==""){
				alert('Please input data first');
			}
			else{
			$rate=$('#rate').val();
			$month=$('#month').val();	
			$year=$('#year').val();				
				$.ajax({
					type: "POST",
					url: "addnew.php",
					data: {
						rate: $rate,
						month: $month,
						year: $year,
						add: 1,
					},
					success: function(){
						showUser();
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
			$('#edit'+$uid).modal('hide');
			$('body').removeClass('modal-open');
			$('.modal-backdrop').remove();
			$urate=$('#urate'+$uid).val();
			$umonth=$('#umonth'+$uid).val();
			$uyear=$('#uyear'+$uid).val();
				$.ajax({
					type: "POST",
					url: "update.php",
					data: {
						id: $uid,
						rate: $urate,
						month: $umonth,
						year: $uyear,
						edit: 1
					},
					success: function(){
						showUser();
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