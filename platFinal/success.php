<?php
$conn = new mysqli('localhost','root','','online_application');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// GET ID FROM URL AND VALIDATE
$id = $_GET["id"] ?? null;  // Use null coalescing for safety

if (!$id || !is_numeric($id)) {
    die('Invalid or missing ID. Please go back and try again.');
}

// GET THE USER DATA
$result = $conn->query("SELECT * FROM studentuser WHERE id = $id");

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    die('Application not found. It may have been canceled or the ID is invalid.');
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card p-5 shadow-lg" style="width: 500px;">
        <h2 class="text-center text-success mb-3">Application Successful</h2>
        <hr>

        <p class="text-center">
            <strong>Thank you, <?= htmlspecialchars($row['first_name']) ?>!</strong><br>
            Your application has been submitted successfully.
        </p>

        <p class="text-center mt-3">
            <strong>Please go to the clinic at your availability:</strong><br>
            <span class="fs-4 text-primary"><?= htmlspecialchars($row['time']) ?></span>
        </p>

        <div class="text-center mt-4">
            <a href="index.html" class="btn btn-secondary px-4">Back to Home</a>  <!-- Updated to index.html -->
        </div>
    </div>

</body>
</html>
