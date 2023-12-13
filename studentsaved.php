<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PHPScriptDemo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function studentsaved($input) {
    // Implement your sanitation logic here if needed
    return $input;
}

// Collect user input for student information
$idNum = studentsaved($_POST['idNum']);
$firstName = studentsaved($_POST['firstName']);
$lastName = studentsaved($_POST['lastName']);
$dateOfBirth = studentsaved($_POST['dateOfBirth']);
$email = studentsaved($_POST['email']);
$phone = studentsaved($_POST['phone']);

// SQL query to insert data into the Student table
$sql = "INSERT INTO Student (StudentID, FirstName, LastName, DateOfBirth, Email, Phone) 
        VALUES ('$idNum','$firstName', '$lastName', '$dateOfBirth', '$email', '$phone')";

if ($conn->query($sql) === TRUE) {
    echo "Student information saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// SQL query to fetch all records from the Student table
$selectQuery = "SELECT * FROM Student";
$result = $conn->query($selectQuery);

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Student Information</h2>

    <!-- Display the saved information in a table -->
    <table>
        <tr>
            <th>IdNumber</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>

        <?php
        // Check if there are records in the result
        if ($result->num_rows > 0) {
            // Loop through the records and display them in the table
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['StudentID'] . "</td>";
                echo "<td>" . $row['FirstName'] . "</td>";
                echo "<td>" . $row['LastName'] . "</td>";
                echo "<td>" . $row['DateOfBirth'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['Phone'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
    </table>

    <a href="setup.php">ADD Student</a>
    <a href="setup.php">EXIT</a>
</body>
</html>
