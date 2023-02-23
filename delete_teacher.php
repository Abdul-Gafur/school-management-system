<?php
session_start();
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';
$usertype = "student";

$conn = mysqli_connect($hostname, $username, $password, $db);

$sql = "SELECT * FROM teacher ";

$result = mysqli_query($conn, $sql);

if ($_GET['teacher_id']) {
    $teacher_id = $_GET['teacher_id'];

    $delete = "DELETE FROM teacher WHERE id = '$teacher_id'";

    $deleted = mysqli_query($conn, $delete);

    if ($deleted) {

        $_SESSION['message'] = "Teacher Deleted Successfully";
        header('location:view_teacher.php');
    }
}
?>