<?php
$conn = new mysqli('localhost','root','','online_application');

$id = $_GET["id"];

$result = $conn->query("SELECT * FROM studentuser WHERE id = $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Review Appointment</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#000;">

<div class="container" style="display:flex; justify-content:center; align-items:center;">
    <div class="card p-4 shadow" style="display:flex; justify-content:center;">
        <h2 class="text-center">Review Your Appointment</h2>
        <hr>

        <p><strong>Name:</strong> <?= $row['first_name'] . " " . $row['last_name'] ?></p>
        <p><strong>Address:</strong> <?= $row['address'] ?></p>
        <p><strong>Student ID:</strong> <?= $row['studentID'] ?></p>
        <p><strong>Course:</strong> <?= $row['course'] ?></p>
        <p><strong>Time:</strong> <?= $row['time'] ?></p>

        <div class="mt-4 text-center">
            <a href="success.php?id=<?= $id ?>" class="btn btn-success px-4">Confirm</a>
            <a href="delete.php?id=<?= $id ?>" class="btn btn-danger px-4">Cancel Application</a>
        </div>
    </div>
</div>

</body>
</html>
