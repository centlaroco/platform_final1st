<?php
$conn = new mysqli('localhost','root','','online_application');

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// GET ID FROM URL AND VALIDATE
$id = $_GET["id"] ?? null;

if (!$id || !is_numeric($id)) {
    die('Invalid or missing ID. Cannot cancel.');
}

// e delete ang record and all inside sa query
$delete_result = $conn->query("DELETE FROM studentuser WHERE id = $id");

if ($delete_result && $conn->affected_rows > 0) {
    $conn->close();
    echo "<h2 style='text-align:center; margin-top:40px; color:red;'>Application Canceled</h2>";
    echo "<div style='text-align:center; margin-top:20px;'>
            <a href='index.html'>Go Back to Form</a>
          </div>";
} else {
    $conn->close();
    echo "<h2 style='text-align:center; margin-top:40px; color:orange;'>Error: Application not found or already canceled.</h2>";
    echo "<div style='text-align:center; margin-top:20px;'>
            <a href='index.html'>Go Back to Form</a>
          </div>";
}
?>
