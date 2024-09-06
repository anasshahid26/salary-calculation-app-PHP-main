<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


include('conn.php');
require_once ('./vendor/autoload.php');

$table = "";



if (isset($_POST["import"])) {

	$month = $_POST["month"];
	$year = $_POST["year"];
	//my function create table
	
	
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 1; $i < $sheetCount; $i ++) {
            $EmpCode = "";
            if (isset($spreadSheetAry[$i][0])) {
                $EmpCode = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $EmpName = "";
            if (isset($spreadSheetAry[$i][1])) {
                $EmpName = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
			$Weekends = "";
            if (isset($spreadSheetAry[$i][2])) {
                $Weekends = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
			$Presents = "";
            if (isset($spreadSheetAry[$i][3])) {
                $Presents = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
			$Absent = "";
            if (isset($spreadSheetAry[$i][4])) {
                $Absent = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
			$Late = "";
            if (isset($spreadSheetAry[$i][5])) {
                $Late = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
			$HalfDay = "";
            if (isset($spreadSheetAry[$i][6])) {
                $HalfDay = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
			

            if (! empty($EmpCode) || ! empty($EmpName) || ! empty($Weekends) || ! empty($Presents) || ! empty($Absent) || ! empty($Late)
				|| ! empty($HalfDay) || ! empty($month) || ! empty($year) ) {
                $query = "INSERT INTO `monthly_report`(`id`, `EmpCode`, `EmpName`, `Weekends`, `Presents`, `Absent`, `Late`, `HalfDay`, `Month`, `Year`) VALUES 
				('0','$EmpCode','$EmpName','$Weekends','$Presents','$Absent','$Late','$HalfDay','$month','$year')";
				
				mysqli_query($conn,$query);

            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
	font-family: Arial;
	width: 550px;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
	padding: 5px 20px;
	font-size: 0.9em;
}

.tutorial-table {
	margin-top: 40px;
	font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
	background: #f0f0f0;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
	background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
	padding: 10px;
	margin-top: 10px;
	border-radius: 2px;
	display: none;
}

.success {
	background: #c7efd9;
	border: #bbe2cd 1px solid;
}

.error {
	background: #fbcfcf;
	border: #f3c6c7 1px solid;
}

div#response.display-block {
	display: block;
}
</style>
</head>
<body>
    <h2>Import Attendance Sheet</h2>

    <div class="outer-container">
        <form action="" method="post" name="frmExcelImport"
            id="frmExcelImport" enctype="multipart/form-data">
            <div>
			
			 <label>Choose Month</label>
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


	 <label>Choose Year</label>
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



			
			
                <label>Choose Excel File</label> <input type="file"
                    name="file" id="file" accept=".xls,.xlsx">
					
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>

            </div>

        </form>

    </div>  



</body>
</html>