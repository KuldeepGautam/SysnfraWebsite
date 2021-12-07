<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$jobpost = $_POST['jobpost'];
$message = $_POST['message'];

//Database connections

$conn = new mysqli('localhost', 'root', '', 'sysinfradatabase');
if ($conn->connect_error) {
	die('Connection Failed : ' . $conn->connect_error);
} else {
	$stmt = $conn->prepare("insert into sysinfratablename(name, email, phone, jobpost, message
    ) value(?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $name, $email, $phone, $jobpost, $message);
	$stmt->execute();
	echo "Your form hase been submitted successfully. We will contact you shortly.";
	// echo $message;
	$stmt->close();
	$conn->close();
}
