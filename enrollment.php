<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>
</head>
<body>
    <h2>Enrollment Form</h2>
    <form action="save_enrollment.php" method="post">
        <label for="studentID">Enrollment ID:</label>
        <input type="text" name="studentID" required><br>

        <label for="enrollmentDate">Enrollment Date:</label>
        <input type="date" name="enrollmentDate" required><br>

        <label for="grade">Grade:</label>
        <input type="text" name="grade"><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
