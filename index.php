<?php
//require_once 'User.php';
require_once 'Student.php';

$myArr = array();

if (isset($_POST["import"])) {

    $fileName = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {

        $file = fopen($fileName, "r");

        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            //echo $column[0] . ", " . $column[1] . ", " . $column[2] . ", " . $column[3] . '<br>';
           // $result = new User($column[0], $column[1], $column[2], $column[3]);
            $result = new Student($column[0], $column[1], $column[2]);
                //echo "userid ====== " . $result->getUserId(). '<br>';
            //echo $result;
            array_push($myArr, $result);
            //echo "myArr ====== " . $myArr. '<br>';
            //array_push($result, $result); // Add it to the "$my_array" array
           // foreach ($result as $propName => $propValue) {
            //    echo $propName . ': ' . $propValue . '<br>';
           // }
            //adding data to the array
           // $myArr[] = $result->$element;
            if (! empty($result)) {
                $type = "success";
                $message = "Student Insurance Record";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="jquery-3.2.1.min.js"></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	 <script type="text/javascript" src ="js/bootstrap.min.js"></script>
	 
    <style>
        body {
            font-family: Arial;
            width: 700px;
			
        }

        .outer-scontainer {
            background: #f2f2f2;
            border: #f2f2f2 5px solid;
            padding: 10px;
            border-radius: 3px;
        }

        .input-row {
            margin-top: 0px;
            margin-bottom: 5px;
        }

        .btn-submit {
            background: #3333;
            border: #1d1d1d 5px solid;
            color: #f0f0$f0;
            font-size: 0.8em;
            width: 100px;
            border-radius: 3px;
            cursor: pointer;
        }

        .outer-scontainer table {
            border-collapse: collapse;
            width: 100%;
			
        }

        .outer-scontainer th {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        .outer-scontainer td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
			background: #f2f2f2;
        }
		 
		tr:nth-child(even) {
		  background-color: #f2f2f2
		}

        #response {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            display:none;
        }

        .success {
            background: #5B5661;
            border: #bbe2cd 1px solid;
			text-align: center;
        }

        .error {
            background: #fbcfcf;
            border: #f3c6c7 1px solid;
        }

        div#response.display-block {
            display: block;
			
        }
		
		
		
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#frmCSVImport").on("submit", function () {

                $("#response").attr("class", "");
                $("#response").html("");
                var fileType = ".csv";
                var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + fileType + ")$");
                if (!regex.test($("#file").val().toLowerCase())) {
                    $("#response").addClass("error");
                    $("#response").addClass("display-block");
                    $("#response").html("Invalid File. Upload : <b>" + fileType + "</b> Files.");
                    return false;
                }
                return true;
            });
        });
    </script>
</head>

<body bgcolor="#FFFFFF">
<h2 align="center">IMPORT CSV DATA INTO BOOTSTRAP HTML TABLE</h2>

<div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
<div class="outer-scontainer">
    <div class="row">

        <form class="form-horizontal" action="" method="post"
              name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
            <div class="input-row" style="background-color:orange;text-align:center">
                <label class="col-md-4 control-label">Choose CSV
                    File</label> <input type="file" name="file"
                                        id="file" accept=".csv">
                <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                <br />

            </div>

        </form>

    </div>
    <?php
    //$sqlSelect = "SELECT * FROM users";
    //$result = mysqli_query($conn, $sqlSelect);

    if (sizeof($myArr) > 0) {
        //echo "size of array: " . sizeof($myArr). '<br>';
        ?>
        <table id='userTable'>
            <thead>
            <tr>
                <!--<th>User ID</th>
                <th>User Name</th>
                <th>First Name</th>
                <th>Last Name</th> -->
                <th>Student ID</th>
                <th>Insurance Name</th>
                <th>Student Phone</th>

            </tr>
            </thead>
            <?php

            //while ($row = mysqli_fetch_array($result)) {
            foreach ($myArr as $value) {
                //print_r($value);
            ?>

            <tbody>
            <tr>
                <td><?php  echo $value->getStudentId(); ?></td>
                <td><?php  echo $value->getInsuranceName(); ?></td>
                <td><?php  echo $value->getStudentPhone(); ?></td>


            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    <?php } ?>
</div>

</body>

</html>