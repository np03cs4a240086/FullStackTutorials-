<?php
require 'db.php';

$sql = "SELECT * FROM students";
$stmt = $pdo->query($sql);
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php foreach ($students as $student): ?>
    <tr>
        <td><?= $student['name'] ?></td>
        <td><?= $student['email'] ?></td>
        <td><?= $student['course'] ?></td>
        <td>
            <a href="edit.php?id=<?= $student['id'] ?>">Edit</a>
        </td>
        <td>
            <a href="delete.php?id=<?= $student['id'] ?>"
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="create.php">Add Student</a>

</body>
</html>
