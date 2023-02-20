<?php

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';

$conn = mysqli_connect($hostname, $username, $password, $db);

// Check connection
if (!$conn) {
    die('Could not connect to Database' . mysqli_connect_error());
}

if (isset($_POST['apply'])) {
    $data_name = $_POST['name'];
    $data_email = $_POST['email'];
    $data_phone = $_POST['phone'];
    $data_message = $_POST['message'];

    $sql = "INSERT INTO admission(name, email, phone, message)
            VALUES ('$data_name', '$data_email', '$data_phone', '$data_message')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        session_start();
        $_SESSION['message'] = "Your Application Sent successfully";
        header("location:index.php");
    } else {
        echo "Apply Failed";
    }
}