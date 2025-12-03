<?php
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$address = $_POST["address"];
$studentID = $_POST["studentID"];
$course = $_POST["course"];
$section = $_POST["section"];
$feeler = $_POST["feeler"];
$time = $_POST["time"];

// CONNECT
$conn = new mysqli('localhost','root','','online_application');

if($conn->connect_error){
    die('Connection failed :' . $conn->connect_error);
}

// INSERT
$stmt = $conn->prepare("INSERT INTO studentuser
(first_name, last_name, email, gender, address, studentID, course, section, feeler, time)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("sssssissss",
    $first_name,
    $last_name,
    $email,
    $gender,
    $address,
    $studentID,
    $course,
    $section,
    $feeler,
    $time
);

$stmt->execute();

// GET LAST INSERT ID
$last_id = $conn->insert_id;

$stmt->close();
$conn->close();

// REDIRECT TO REVIEW PAGE
header("Location: ../review.php?id=$last_id");
exit();
?>
