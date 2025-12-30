<?php
require 'db.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $course = $_POST['course'] ?? '';

        $sql = "INSERT INTO students (name, email, course) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $course]);

        echo "Student successfully added";
    }
} catch (PDOException $e) {
    die("Failed to add student: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<form method="POST">
    Name: <input type="text" name="name"><br><br>
    Email: <input type="email" name="email"><br><br>
    Course: <input type="text" name="course"><br><br>
    <button type="submit">Add Student</button>
</form>

<a href="read.php">View Students</a>

</body>
</html>