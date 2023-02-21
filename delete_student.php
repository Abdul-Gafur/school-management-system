<?php

session_start();
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';

$conn = mysqli_connect($hostname, $username, $password, $db);

if ($_GET['student_id']) {
    $user_id = $_GET['student_id'];

    $sql = "DELETE FROM user WHERE id='$user_id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {

        $_SESSION['message'] = 'Student Deleted Successfully';
        header('location:view_student.php');
    }
}
