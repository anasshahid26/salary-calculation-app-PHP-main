<?php

$month =  $_GET['month'];
$year =  $_GET['year'];

$sql = "SELECT mr.*,ur.*,sl.*
FROM monthly_report mr , user ur, salary_breakup sl
WHERE mr.EmpCode = ur.EmpCode AND sl.id= (SELECT max(id) from salary_breakup where EmpCode = ur.EmpCode)  
AND mr.id= (SELECT max(id) from monthly_report where EmpCode = ur.EmpCode)";

echo $month . $year;


?><!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8" name = "viewport" content = "width-device=width, initial-scale=1" />
		<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		
			<script>
		
        function PrintDiv() {
            var divContents = document.getElementById("printdiv").innerHTML;
            var printWindow = window.open('', '', 'height=200,width=400');
			printWindow.document.write('<html><head><title>DIV Contents</title>');
			printWindow.document.write('<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
		
<!------ Include the above in your HEAD tag ---------->
		<title>petrol rates</title>
		

		
<style>
body {
    margin-top: 20px;
}
</style>
		
	</head>
<body>

<!--<input type="button" onclick="PrintDiv()" value="print"/>-->
<div id="printdiv" class="container">

  <div class="card">
<div class="card-header">
<h5 style="text-align: center;text-decoration: underline;">SALARY BREAK-UP</h5>
<img src="logo-nedo.png"/>

  <span class="float-right" style="margin-top: 15px;"> <strong>DATE:</strong> 28 Feb 2019</span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<div>
<strong>NAME : </strong>Mr. Muhammad Anas Shahid
</div>
<div><strong>DESIGNATION : </strong>Sr. Software Engineer</div>
<div><strong>DEPARTMENT : </strong>QMS, TMS</div>
<div><strong>SALARY MONTH : </strong>APRIL 2020</div>
<div>Petrol Allocated :   40</div>
</div>

<div class="col-sm-6">
<div>No. of Days : 30</div>
<div>Total Lates : 0</div>
<div>Total Late Deductions : 0</div>
<div>Total Absents : 0</div>
<div>Petrol/Litre : 97</div>
</div>



</div>



<div class="table-responsive-sm">

<table style="float:left !important;width:50% !important" class="table table-striped">
<thead>
<tr>

<th>SALARY HEAD</th>

<th class="right">AMOUNT (RS.)</th>
  

</tr>
</thead>
<tbody>

<tr>
<td class="left">Basic</td>
<td class="left">35000</td>
</tr>
<tr>
<td class="left">Convance Allownce</td>
<td class="left">5000</td>
</tr>
<tr>
<td class="left">House Allownce</td>
<td class="left">0</td>
</tr>
<tr>
<td class="left">Medical Allownce</td>
<td class="left">35000</td>
</tr>
<tr>
<td class="left">Telephone Allownce</td>
<td class="left">1000</td>
</tr>
<tr>
<td class="left">SALARY (GROSS) / PM</td>
<td class="left">37000</td>
</tr>
<tr>
<td class="left">SALARY (CTC) / PM</td>
<td class="left">38000</td>
</tr>


</tbody>
</table>
<table style="float:left !important;width:50% !important" class="table table-striped">
<thead>
<tr>


<th>SALARY HEAD</th>

<th class="right">AMOUNT (RS.)</th>
  

</tr>
</thead>
<tbody>

<tr>
<td class="left">Absent Deductions</td>
<td class="left">35000</td>
</tr>
<tr>
<td class="left">Late Deductions</td>
<td class="left">5000</td>
</tr>
<tr>
<td class="left">Petrol Deductions</td>
<td class="left">0</td>
</tr>
<tr>
<td class="left">-</td>
<td class="left">-</td>
</tr>
<tr>
<td class="left">-</td>
<td class="left">-</td>
</tr>
<tr>
<td class="left">-</td>
<td class="left">-</td>
</tr>
<tr>
<td class="left">
<strong>Total Payable PKR.</strong>
</td>
<td class="right">
<strong>7477,36</strong>
</td>
</tr>


</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>

<!--<tr>
<td class="left">
<strong>Total Payable PKR.</strong>
</td>
<td class="right">
<strong>7477,36</strong>
</td>
</tr> -->
</tbody>
</table>

</div>

</div>
<!--
<div class="row" style="margin-top: 50px;">
<div class="col-sm-6">
<p>Checked/Prepared By</p>
</div>
<div class="col-sm-6">
<p style="float: right;">Reciever Signature</p>
</div>
</div> -->

</div>
</div>
</div>
<div id="printdiv" class="container">

  <div class="card">
<div class="card-header">
<h5 style="text-align: center;text-decoration: underline;">SALARY BREAK-UP</h5>
<img src="logo-nedo.png"/>

  <span class="float-right" style="margin-top: 15px;"> <strong>DATE:</strong> 28 Feb 2019</span>

</div>
<div class="card-body">
<div class="row mb-4">
<div class="col-sm-6">
<div>
<strong>NAME : </strong>Mr. Muhammad Anas Shahid
</div>
<div><strong>DESIGNATION : </strong>Sr. Software Engineer</div>
<div><strong>DEPARTMENT : </strong>QMS, TMS</div>
<div><strong>SALARY MONTH : </strong>APRIL 2020</div>
<div>Petrol Allocated :   40</div>
</div>

<div class="col-sm-6">
<div>No. of Days : 30</div>
<div>Total Lates : 0</div>
<div>Total Late Deductions : 0</div>
<div>Total Absents : 0</div>
<div>Petrol/Litre : 97</div>
</div>



</div>



<div class="table-responsive-sm">

<table style="float:left !important;width:50% !important" class="table table-striped">
<thead>
<tr>

<th>SALARY HEAD</th>

<th class="right">AMOUNT (RS.)</th>
  

</tr>
</thead>
<tbody>

<tr>
<td class="left">Basic</td>
<td class="left">35000</td>
</tr>
<tr>
<td class="left">Convance Allownce</td>
<td class="left">5000</td>
</tr>
<tr>
<td class="left">House Allownce</td>
<td class="left">0</td>
</tr>
<tr>
<td class="left">Medical Allownce</td>
<td class="left">35000</td>
</tr>
<tr>
<td class="left">Telephone Allownce</td>
<td class="left">1000</td>
</tr>
<tr>
<td class="left">SALARY (GROSS) / PM</td>
<td class="left">37000</td>
</tr>
<tr>
<td class="left">SALARY (CTC) / PM</td>
<td class="left">38000</td>
</tr>


</tbody>
</table>
<table style="float:left !important;width:50% !important" class="table table-striped">
<thead>
<tr>


<th>SALARY HEAD</th>

<th class="right">AMOUNT (RS.)</th>
  

</tr>
</thead>
<tbody>

<tr>
<td class="left">Absent Deductions</td>
<td class="left">35000</td>
</tr>
<tr>
<td class="left">Late Deductions</td>
<td class="left">5000</td>
</tr>
<tr>
<td class="left">Petrol Deductions</td>
<td class="left">0</td>
</tr>
<tr>
<td class="left">-</td>
<td class="left">-</td>
</tr>
<tr>
<td class="left">-</td>
<td class="left">-</td>
</tr>
<tr>
<td class="left">-</td>
<td class="left">-</td>
</tr>
<tr>
<td class="left">
<strong>Total Payable PKR.</strong>
</td>
<td class="right">
<strong>7477,36</strong>
</td>
</tr>


</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>

<!--<tr>
<td class="left">
<strong>Total Payable PKR.</strong>
</td>
<td class="right">
<strong>7477,36</strong>
</td>
</tr> -->
</tbody>
</table>

</div>

</div>
<!--
<div class="row" style="margin-top: 50px;">
<div class="col-sm-6">
<p>Checked/Prepared By</p>
</div>
<div class="col-sm-6">
<p style="float: right;">Reciever Signature</p>
</div>
</div> -->

</div>
</div>
</div>
</body>