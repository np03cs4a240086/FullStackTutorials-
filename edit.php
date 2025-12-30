<?php
require 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
$stmt->execute([$id]);
$student = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name=?, email=?, course=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $course, $id]);

    header("Location: read.php");
}
?>

<form method="POST">
    Name: <input type="text" name="name" value="<?= $student['name'] ?>"><br><br>
    Email: <input type="email" name="email" value="<?= $student['email'] ?>"><br><br>
    Course: <input type="text" name="course" value="<?= $student['course'] ?>"><br><br>
    <button type="submit">Update</button>
</form>
