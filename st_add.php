<?php
include("connection.php");

if (isset($_POST['add'])) {
    $st_name = $_POST["st_name"];
    $st_email = $_POST["st_email"];
    $st_pno = $_POST["st_pno"];
    $st_address = $_POST["st_address"];
    $st_room = $_POST["st_room"];
    $st_res_fees = $_POST["st_res_fees"];
    $st_pen_fees = $_POST["st_pen_fees"];
    $st_joining_data = $_POST["st_joining_data"];

    // Create the SQL query with placeholders
    $sql = "INSERT INTO st_details (st_name, st_email, st_pno, st_address, st_room, st_res_fees, st_pen_fees, st_joining_data) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the statement
        $stmt->bind_param("ssssssss", $st_name, $st_email, $st_pno, $st_address, $st_room, $st_res_fees, $st_pen_fees, $st_joining_data);

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

$sql = "SELECT st_name, st_email, st_pno, st_address, st_room, st_res_fees, st_pen_fees, st_joining_data FROM st_details";
$result = $conn->query($sql);


if (isset($_POST['searchStudent'])) {
    $searchStudent = $_POST['searchStudent'];
    $search_sql = "SELECT st_id, st_name, st_email, st_pno, st_address, st_room, st_res_fees, st_pen_fees, st_joining_data FROM st_details WHERE st_name = ?";
    
    if ($stmt = $conn->prepare($search_sql)) {
        // Bind the parameter to the statement
        $stmt->bind_param("s", $searchStudent);
        
        // Execute the statement
        $stmt->execute();
        
        // Get the result
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $st_id = $row["st_id"];
            $st_name = $row["st_name"];
            $st_email = $row["st_email"];
            $st_pno = $row["st_pno"];
            $st_address = $row["st_address"];
            $st_room = $row["st_room"];
            $st_res_fees = $row["st_res_fees"];
            $st_pen_fees = $row["st_pen_fees"];
            $st_joining_data = $row["st_joining_data"];
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
    $st_id = $_POST["st_id"];
    $new_st_name = $_POST["new_st_name"];
    $new_st_email = $_POST["new_st_email"];
    $new_st_pno = $_POST["new_st_pno"];
    $new_st_address = $_POST["new_st_address"];
    $new_st_room = $_POST["new_st_room"];
    $new_st_res_fees = $_POST["new_st_res_fees"];
    $new_st_pen_fees = $_POST["new_st_pen_fees"];
    $new_st_joining_data = $_POST["new_st_joining_data"];

    // Create the SQL query to update student details
    $update_sql = "UPDATE st_details SET st_name=?, st_email=?, st_pno=?, st_address=?, st_room=?, st_res_fees=?, st_pen_fees=?, st_joining_data=? WHERE st_id=?";
    
    if ($stmt = $conn->prepare($update_sql)) {
        // Bind the parameters to the statement
        $stmt->bind_param("ssssssssi", $new_st_name, $new_st_email, $new_st_pno, $new_st_address, $new_st_room, $new_st_res_fees, $new_st_pen_fees, $new_st_joining_data, $st_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo '<script>alert("Details updated successfully!");</script>';
            $st_id = null;
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
    <title>students details</title>
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
            height: 220px;
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
                <li><a href="emp.php">Employee Details</a></li>
                <li><a href="bill.php">Fees Details</a></li>
                
            </ul>
        </nav>
    </header>
    <!-- Increased the size of the main container -->
    <div class="container">
        <div class="form-container">
            <h2>Enter Student Details</h2>
            <form action="" method="POST">
                <label>Name:</label>
                <input type="text" id="st_name" name="st_name" value="" required><br>

                <label>Email:</label>
                <input type="email" id="st_email" name="st_email" value="" required><br>

                <label>Phone Number:</label>
                <input type="text" id="st_pno" name="st_pno" value="" required><br>

                <label>Address:</label>
                <input type="text" id="st_address" name="st_address" value="" required><br>

                <label>room number:</label>
                <input type="text" id="st_room" name="st_room" value="" required><br>
                
                <label>Received Fees:</label>
                <input type="text" id="st_res_fees" name="st_res_fees" value="" required><br>
                <label>Pending Fees:</label>
                <input type="text" id="st_pen_fees" name="st_pen_fees" value="" required><br>

                <label>joinning date:</label>
                <input type="date" id="joinning data" name="st_joining_data" value="" required><br><br>
                <button type="submit" value="ADD" name="add" >Add Student</button>
                
            </form>
        </div>
        <div class="form-container1">
            <h2>View Student Details</h2>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $st_name = $row["st_name"];
                    $st_email = $row["st_email"];
                    $st_pno = $row["st_pno"];
                    $st_address = $row["st_address"];
                    $st_room = $row["st_room"];
                    $st_res_fees = $row["st_res_fees"];
                    $st_pen_fees = $row["st_pen_fees"];
                    $st_joining_data = $row["st_joining_data"];

                    echo '<div class="task-card">';
                    echo '<h2 class="task-title">'  . $st_name .  '</h2>';
                    echo '<p class="task-info">Email: ' . $st_email . '</p>';
                    echo '<p class="task-info">Phone Number: ' . $st_pno . '</p>';
                    echo '<p class="task-info">Address: ' . $st_address . '</p>';
                    echo '<p class="task-info">Room Number: ' . $st_room . '</p>';
                    echo '<p class="task-info">Joining Date: ' . $st_joining_data . '</p>';
                    echo "</div>";
                }
            } else {
                echo '<p>No student details found.</p>';
            }
            ?>
        </div>

        <div class="form-container">
            <h2>Search and Update Student Details</h2>
            <form action="" method="POST">
                <label>Search Student by Name:</label>
                <input type="text" name="searchStudent" required>
                <button type="submit">Search</button>
            </form>
            
            <?php
            if (isset($st_id)) {
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="st_id" value="' . $st_id . '">';
                echo '<label>New Name:</label><input type="text" name="new_st_name" value="' . $st_name . '" required>';
                echo '<label>New Email:</label><input type="email" name="new_st_email" value="' . $st_email . '" required>';
                echo '<label>New Phone Number:</label><input type="text" name="new_st_pno" value="' . $st_pno . '" required>';
                echo '<label>New Adderess:</label><input type="text" name="new_st_address" value="' . $st_address . '" required>';
                echo '<label>New room Number:</label><input type="text" name="new_st_room" value="' . $st_room . '" required>';
                echo '<label>New Recesived Fees:</label><input type="text" name="new_st_res_fees" value="' . $st_res_fees . '" required>';
                echo '<label>New Panding Fees:</label><input type="text" name="new_st_pen_fees" value="' . $st_pen_fees . '" required>';
                echo '<label>New joining Date:</label><input type="date" name="new_st_joining_data" value="' . $st_joining_data . '" required>';
                echo '<button type="submit" name="update" value="Update">Update</button>';
                echo '</form>';
            }
            ?>
        </div>

    </div>
</body>
</html>
