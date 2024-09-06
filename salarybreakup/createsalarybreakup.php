<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
  
  <script>

$( document ).ready(function() {
	
	
	
	$("#generateslip").click(function(){
			var month = $('#month').val();
	var year = $('#year').val();
	var days = $('#days').val();
	window.location.href = "generatesalaryslip.php?month="+month+"&year="+year;
	});
  
  $( "#create" ).click(function() {
	  
	  $('#loader').css("display","inline-block");
	  
	var month = $('#month').val();
	var year = $('#year').val();
	var days = $('#days').val();
	
	if(month!="" && year!="" && days!="")
	{
		var obj = { month: month, year:year, days:days}
	$.ajax({
            type: "POST",
            url: 'api/createsalary.php',
            data: obj,
            success: function(response)
            {
				  $('#loader').css("display","none");
				console.log(response);
               /* var jsonData = JSON.parse(response);
 
                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData.success == "1")
                {
                    location.href = 'my_profile.php';
                }
                else
                {
                    alert('Invalid Credentials!');
                } */
           },
		   error: function(error)
		   {
			   console.log(error);
		   },
       });

	}
	else
	{
		alert("Please select all the fields");
	}
	});
});  
  
  
  </script>

<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
<title>Salary Breakup</title>
	</head>
<body>
<div class="container">

<div class="row">
                <div class="col-lg-12">
                    <center><h2 class = "text-primary">Enter Details For Create Salary Breakup</h2></center>
					<hr>
				<div>
					<form  class = "form-inline">
						
						<div class = "form-group">
							<label>month:</label>
							<select class = "form-control" id="month" name="month">
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
							<select class = "form-control" id="year" name="year">
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
							<label>No.of days:</label>
						<select class = "form-control" id="days" name="year">
    						<option value="30">30</option>
							<option value="31">31</option>
							<option value="28">28</option>
							<option value="29">29</option>
  						</select>
						</div>
						<div class = "form-group">
							<button type = "button" id="create" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Create</button>
						</div>
					</form>
					<img src="images/loader.gif" id="loader" style="display:none"/>
					<div >
					<p>Salaries of all employees has been generated!</p>
					<input type="button" class = "btn btn-primary" id="generateslip" value="Generate salary slip"/>
					</div>
				</div>
                </div>
            </div>



</div>
</body>
</html>