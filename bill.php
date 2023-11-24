<?php
include("connection.php");

$sql = "SELECT st_name, st_email, st_pno, st_address, st_room, st_res_fees, st_pen_fees, st_joining_data FROM st_details";
$result = $conn->query($sql);

$sql1 = "SELECT emp_name, emp_email, emp_pno, emp_address, emp_pen_salary, emp_giv_salary, emp_joining_date FROM emp_details";
$result1 = $conn->query($sql1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="iogo.jpg">
    <title>bill details</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Martian+Mono&display=swap');
        * {
            box-sizing: border-box;
            font-family: 'Martian Mono', sans-serif;
            scroll-behavior: smooth;
        }

        body {
            background-color: whitesmoke;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        header {
            background-color: #333;
            overflow: auto;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: end;
        }

        nav li {
            display: inline;
            margin-right: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        /* Updated CSS for the container */
        .container {
            text-align: center;
            margin: 20px auto;
            width: 100%; /* Set the width to 100% of the viewport */
            max-width: 1200px;
            padding: 20px;
            background-color:  #f9f9f9;
            border: 1px solid #ccc; /* Add a max-width to control the container's size */
        }

        /* CSS for the forms */
        .form-container {
            display: inline-block;
            width: 92%; /* Increase the width by 300% */
            padding: 20px;
            border: 1px solid #ccc;
            margin: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
            background-color: #f9f9f9;
        }

        .form-container:hover{
            background-color: whitesmoke;
            transition: 0.3s;
        }

        .form-container h2 {
            margin-top: 0;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #555;
        }

        .task-card {
            align-items: center;
            border: 2px solid #797975;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 20px;
            background-color:rgb(253, 249, 249);
            transition: transform 0.3s;
            animation: slide-in 0.5s ease-in-out;
            /* Increase height and adjust width here */
            height: 140px;
            max-width: 400px;
            width: 100%;
        }

        .task-card:hover {
            transform: scale(1.08);
            background-color:lightgrey;
        }

        .task-title {
            color: #333;
            font-size: 20px;
        }

        .task-info {
            margin: 10px 0;
            color: #666;
        }

        .task-info strong {
            color: #333;
        }

        .form-container1 {
            display: inline-block;
            width: 92%; /* Increase the width by 300% */
            padding: 20px;
            border: 1px solid #ccc;
            margin: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
            text-align: left;
            background-color: #f9f9f9;
            padding-left: 320px;
        }

        .form-container1:hover{
            background-color: whitesmoke;
            transition: 0.3s;
        }

        .form-container1 h2 {
            margin-top: 0;

        }

        .form-container1 label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container1 input[type="text"],
        .form-container1 input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container1 button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container1 button:hover {
            background-color: #555;
        }

    </style>
</head>
<body>
    <header>
        <nav>  
            <ul>
                <li><a href="home_page.php">Home</a></li>
                <li><a href="st_add.php">Student Details</a></li>
                <li><a href="emp.php">Employee Details</a></li>
            </ul>
        </nav>
    </header>
    <!-- Increased the size of the main container -->
    <div class="container">
        
        <div class="form-container1">
            <h2>View Student Fee Details</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $st_name = $row["st_name"];
                    $st_res_fees = $row["st_res_fees"];
                    $st_pen_fees = $row["st_pen_fees"];

                    echo '<div class="task-card">';
                    echo '<h2>' . $st_name . '</h2>';
                    echo '<p class="task-info">Received Fees: ' . $st_res_fees . '₹ </p>';
                    echo '<p class="task-info">Pending Fees: ' . $st_pen_fees . '₹ </p>';
                    echo "</div>";
                }
            } else {
                echo '<p>No student details found.</p>';
            }
            ?>

        </div>
        <div class="form-container">
            <h2>For Students: </h2>
            <?php
            $pen_fee = 0;
            $res_fee = 0;
            $query = "SELECT st_pen_fees, st_res_fees  FROM st_details";

            $res = $conn->query($query);
            
            if (!$res) {
                die("Query failed: " . $conn->error);
            }
            
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $st_pen_fees = $row["st_pen_fees"];
                    $st_res_fees = $row["st_res_fees"];

                    $pen_fee += $st_pen_fees;
                    $res_fee += $st_res_fees;
                }
                echo '<h2>Total Pending Fees: ' . $pen_fee . '₹ </h2>';
                echo '<h2>Total Recived Fees: ' . $res_fee . '₹ </h2>';
            } else {
                echo '<p>No records found.</p>';
            }
            ?>
            
        </div>

        <div class="form-container1">
            <h2>View Employee salary Details</h2>
    
            <?php
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    $emp_name = $row["emp_name"];
                    $emp_pen_salary = $row["emp_pen_salary"];
                    $emp_giv_salary = $row["emp_giv_salary"];

                    echo '<div class="task-card">';
                    echo '<h2>' . $emp_name . '</h2>';
                    echo '<p class="task-info">Pending salary: ' . $emp_pen_salary . '₹ </p>';
                    echo '<p class="task-info">gived salary: ' . $emp_giv_salary . '₹ </p>';
                    echo "</div>";
                }
            } else {
                echo '<p>No student details found.</p>';
            }
            ?>

        </div>
        <div class="form-container">
        <h2>For Employee: </h2>
            <?php
            $giv_sal = 0;
            $pen_sal = 0;
            $query = "SELECT emp_pen_salary, emp_giv_salary  FROM emp_details";

            $ress = $conn->query($query);
            
            if (!$ress) {
                die("Query failed: " . $conn->error);
            }
            
            if ($ress->num_rows > 0) {
                while ($row = $ress->fetch_assoc()) {
                    $emp_pen_salary = $row["emp_pen_salary"];
                    $emp_giv_salary = $row["emp_giv_salary"];

                    $giv_sal += $emp_giv_salary;
                    $pen_sal += $emp_pen_salary;
                }
                echo '<h2>Total Pending salary: ' . $pen_sal . '₹ </h2>';
                echo '<h2>Total Gived Salary: ' . $giv_sal . '₹ </h2>';
            } else {
                echo '<p>No records found.</p>';
            }
            ?>
            <!-- Add code for updating student details here -->
        </div>
    </div>
</body>
</html>
