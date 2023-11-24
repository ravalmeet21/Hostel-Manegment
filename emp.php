<?php
include("connection.php");

if (isset($_POST['add'])) {
    $emp_name = $_POST["emp_name"];
    $emp_email = $_POST["emp_email"];
    $emp_pno = $_POST["emp_pno"];
    $emp_address = $_POST["emp_address"];
    $emp_pen_salary = $_POST["emp_pen_salary"];
    $emp_giv_salary = $_POST["emp_giv_salary"];
    $emp_joining_date = $_POST["emp_joining_date"];

    // Create the SQL query with placeholders
    $sql = "INSERT INTO emp_details (emp_name, emp_email, emp_pno, emp_address ,emp_pen_salary ,emp_giv_salary ,emp_joining_date) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the statement
        $stmt->bind_param("sssssss", $emp_name, $emp_email, $emp_pno, $emp_address, $emp_pen_salary, $emp_giv_salary, $emp_joining_date);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Details added successfully!");</script>';
        } else {
            echo '<script>alert("ERROR!!!! Details Is Not Added successfully!");</script>';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo '<script>alert("ERROR!!!! Details Is Not Added successfully!");</script>';
    }
}

$sql = "SELECT emp_name, emp_email, emp_pno, emp_address, emp_pen_salary, emp_giv_salary, emp_joining_date FROM emp_details";
$result = $conn->query($sql);

if (isset($_POST['searchEmployee'])) {
        $searchEMP = $_POST['searchEmployee'];
        $search_sql = "SELECT emp_id, emp_name, emp_email, emp_pno, emp_address, emp_pen_salary, emp_giv_salary, emp_joining_date FROM emp_details WHERE emp_name = ?";
        
        if ($stmt = $conn->prepare($search_sql)) {
            // Bind the parameter to the statement
            $stmt->bind_param("s", $searchEMP);
            
            // Execute the statement
            $stmt->execute();
            
            // Get the result
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $emp_id = $row["emp_id"];
                $emp_name = $row["emp_name"];
                $emp_email = $row["emp_email"];
                $emp_pno = $row["emp_pno"];
                $emp_address = $row["emp_address"];
                $emp_pen_salary = $row["emp_pen_salary"];
                $emp_giv_salary = $row["emp_giv_salary"];
                $emp_joining_date = $row["emp_joining_date"];
            } else {
                echo '<script>alert("Error searching for student.");</script>';
            }
            // Close the statement
            $stmt->close();
        } else {
            echo '<script>alert("Error searching for student.");</script>';
        }
    }
    
    if (isset($_POST['update'])) {
        $emp_id = $_POST["emp_id"];
        $new_emp_name = $_POST["new_emp_name"];
        $new_emp_email = $_POST["new_emp_email"];
        $new_emp_pno = $_POST["new_emp_pno"];
        $new_emp_address = $_POST["new_emp_address"];
        $new_emp_pen_salary = $_POST["new_emp_pen_salary"];
        $new_emp_giv_salary = $_POST["new_emp_giv_salary"];
        $new_emp_joining_date = $_POST["new_emp_joining_date"];
    
        // Create the SQL query to update student details
        $update_sql = "UPDATE emp_details SET emp_name=?, emp_email=?, emp_pno=?, emp_address=?, emp_pen_salary=?, emp_giv_salary=?, emp_joining_date=? WHERE emp_id=?";
        
        if ($stmt = $conn->prepare($update_sql)) {
            // Bind the parameters to the statement
            $stmt->bind_param("sssssssi", $new_emp_name, $new_emp_email, $new_emp_pno, $new_emp_address, $new_emp_pen_salary, $new_emp_giv_salary, $new_emp_joining_date, $emp_id);
    
            // Execute the statement
            if ($stmt->execute()) {
                echo '<script>alert("Details updated successfully!");</script>';
                $emp_id = null;
            } else {
                echo '<script>alert("ERROR!!!! Details were not updated successfully!");</script>';
            }
            // Close the statement
            $stmt->close();
        } else {
            echo '<script>alert("ERROR!!!! Details were not updated successfully!");</script>';
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="iogo.jpg">
    <title>Employee details</title>
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
            height: 180px;
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
    </style>
</head>
<body>
    <header>
        <nav>  
            <ul>
                <li><a href="home_page.php">Home</a></li>
                <li><a href="st_add.php">Students Details</a></li>
                <li><a href="bill.php">Fees Details</a></li>
            </ul>
        </nav>
    </header>
    <!-- Increased the size of the main container -->
    <div class="container">
        <div class="form-container">
            <h2>Enter Employee Details</h2>
            <form action="" method="POST">
                <label>Name:</label>
                <input type="text" id="emp_name" name="emp_name" value="" required><br>

                <label>Email:</label>
                <input type="email" id="emp_email" name="emp_email" value="" required><br>

                <label>Phone:</label>
                <input type="text" id="emp_pno" name="emp_pno" value="" required><br>

                <label>Address:</label>
                <input type="text" id="emp_address" name="emp_address" value="" required><br>

                <label>pending Salary:</label>
                <input type="text" id="emp_pen_salary" name="emp_pen_salary" value="" required><br>

                <label>gived Salary:</label>
                <input type="text" id="emp_giv_salary" name="emp_giv_salary" value="" required><br>

                <label>joining date:</label>
                <input type="date" id="emp_joining_date" name="emp_joining_date" value="" required><br><br>

                <button type="submit" value="ADD" name="add" >Add Employe</button>
            </form>
        </div>

        <div class="form-container1">
            <h2>View Employe Details</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $emp_name = $row["emp_name"];
                    $emp_email = $row["emp_email"];
                    $emp_pno = $row["emp_pno"];
                    $emp_address = $row["emp_address"];
                    $emp_pen_salary = $row["emp_pen_salary"];
                    $emp_giv_salary = $row["emp_giv_salary"];
                    $emp_joining_date= $row["emp_joining_date"];

                    echo '<div class="task-card">';
                    echo '<h2 class="task-title">'  . $emp_name .  '</h2>';
                    echo '<p class="task-info">Email: ' . $emp_email . '</p>';
                    echo '<p class="task-info">Phone Number: ' . $emp_pno . '</p>';
                    echo '<p class="task-info">Address: ' . $emp_address . '</p>';
                    echo '<p class="task-info">Joining Date: ' . $emp_joining_date . '</p>';
                    echo "</div>";
                }
            } else {
                echo '<p>No employe details found.</p>';
            }
            ?>
        </div>

        <div class="form-container">
            <h2>Search and Update Employee Details</h2>
            <form action="" method="POST">
                <label>Search Employee by Name:</label>
                <input type="text" name="searchEmployee" required>
                <button type="submit">Search</button>
            </form>
            
            <?php
            if (isset($emp_id)) {
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="emp_id" value="' . $emp_id . '">';
                echo '<label>New Name:</label><input type="text" name="new_emp_name" value="' . $emp_name . '" required>';
                echo '<label>New Email:</label><input type="email" name="new_emp_email" value="' . $emp_email . '" required>';
                echo '<label>New Phone Number:</label><input type="text" name="new_emp_pno" value="' . $emp_pno . '" required>';
                echo '<label>New Adderess:</label><input type="text" name="new_emp_address" value="' . $emp_address . '" required>';
                echo '<label>New Recesived Fees:</label><input type="text" name="new_emp_pen_salary" value="' . $emp_pen_salary . '" required>';
                echo '<label>New Panding Fees:</label><input type="text" name="new_emp_giv_salary" value="' . $emp_giv_salary . '" required>';
                echo '<label>New joining Date:</label><input type="date" name="new_emp_joining_date" value="' . $emp_joining_date . '" required>';
                echo '<button type="submit" name="update" value="Update">Update</button>';
                echo '</form>';
            }
            ?>
        </div>
    </div>
</body>
</html>
