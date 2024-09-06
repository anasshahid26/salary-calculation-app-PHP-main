<?php
include("../../conn.php");

$month = $_POST['month'];
$year = $_POST['year'];
$days = $_POST['days'];
//$petrol_rate = 0;

$return_arr = array();
// Attempt select query execution
$sql = "SELECT mr.*,ur.*
FROM monthly_report mr , user ur
WHERE mr.EmpCode = ur.EmpCode AND mr.id= (SELECT max(id) from monthly_report where EmpCode = ur.EmpCode)";
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
			$EmpCode = $row['EmpCode'];
			$EmpName = $row['EmpName'];
			$basic_salary = $row['basicsalary'];
			$total_absent = $row['Absent'];
			$total_halfdays = $row['HalfDay'];
			$per_day_salary = $basic_salary / $days;
			$absent_deduction = $per_day_salary * $total_absent;
			$halfdays_deduction = ($total_halfdays / 2) * $per_day_salary ;
			$total_late = $row['Late'];
			$fixedpetrolallowance = $row['fixedpetrolallownce'];
			$petrol_quantity = $row['petrolquantity'];
			
			
			$house_allowance = 0;
			$medical_allowance = $row['medicalallownce'];
			$telephone_allowance = 0;
			$petrol_deductions = 0;
			
			if($total_late > 3)
			{
				$total_late_deduction =	$total_late / 4 ;
				$late_deduction = $total_late_deduction * $per_day_salary;
			}
			else
			{
				$total_late_deduction = $total_late;
				$late_deduction = 0;
			}
			if($fixedpetrolallowance==0)
			{
				$sql_petrol = "SELECT * FROM `petrol_rate` where month='$month' AND year='$year' AND id=(SELECT MAX(id)  FROM `petrol_rate` where month='$month' AND year='$year')";
				$result_petrol = mysqli_query($conn, $sql_petrol);
				 if(mysqli_num_rows($result_petrol) > 0){
					  while($row = mysqli_fetch_array($result_petrol)){
						$petrol_rate = $row['rate'];
						$convance_allowance = $petrol_rate * $petrol_quantity;
					  }
				 }
			}
			else
			{
				$petrol_rate = 0;
				$convance_allowance=  $row['petrolallownce'];
			}
			$total_deduction = $absent_deduction + $late_deduction + $halfdays_deduction;
			
			$basic_after_late_half_deduction  =   $basic_salary - $late_deduction - $halfdays_deduction; 
			
			$salary_gross_PM = $basic_after_late_half_deduction + $convance_allowance + $house_allowance + $medical_allowance + $telephone_allowance ;
			
			$salary_gross_after_absent_deduction = $salary_gross_PM - $absent_deduction ;
			
			$total_payable = $salary_gross_after_absent_deduction;
			
			//Insert Data into Salary Backup Table
			
			$sql_insert = "INSERT INTO `salary_breakup`(`id`, `EmpCode`, `month`, `year`, `convance_allowance`, `house_allowance`, `medical_allowance`, `telephone_allowance`,
			`salary_gross`, `salary_ctc`, `absent_deductions`, `halfday_deductions`, `late_deductions`, `petrol_deductions`, `total_deduction`, `total_payable`) VALUES 
			('0','$EmpCode','$month','$year','$convance_allowance','$house_allowance','$medical_allowance','$telephone_allowance','$salary_gross_PM','$salary_gross_after_absent_deduction',
			'$absent_deduction','$halfdays_deduction','$late_deduction','$petrol_deductions','$total_deduction','$total_payable')";
			$sql_insert_result = mysqli_query($conn, $sql_insert);
			
			
			
		    $return_arr[] = array("EmpName" =>$EmpName ,"basic_salary" =>$basic_salary , "absent_deduction" =>$absent_deduction, "late_deduction" =>$late_deduction,"halfdays_deduction" =>$halfdays_deduction,
			"basic_after_late_half_deduction" =>$basic_after_late_half_deduction, "salary_gross_PM" =>$salary_gross_PM , "salary_gross_after_absent_deduction" =>$salary_gross_after_absent_deduction,
					"total_payable" =>$total_payable , 		"total_deduction" =>$total_deduction , 
				   );
		
        }
		echo json_encode($return_arr);
		
    } else{
        echo "No records matching your query were found.";
    }
}	
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
 

?>