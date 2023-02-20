<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';

$conn = mysqli_connect($hostname, $username, $password, $db);

// Check connection
if (!$conn) {
    echo('Could not connect to Database' . mysqli_connect_error() );
}


session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$db = "management_system";

// Make connection
$conn = mysqli_connect($hostname, $username, $password, $db);

// check connection
if (!$conn) {
    die("Could not connect to Database" . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$name' AND password='$pass' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "admin") {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";

        header("location:adminhome.php");

    } else if ($row["usertype"] == "student") {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "student";

        header("location:studenthome.php");
    } else {
        header("location:login.php");
    }
}


$error_message = "username or password error";
$_SEESION['loginMessage'] = $error_message;
header('location:login.php');
if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM user WHERE username = '$name' AND password='$pass' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "admin") {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "admin";

        header("location:adminhome.php");

    } else if ($row["usertype"] == "student") {
        $_SESSION['username'] = $name;
        $_SESSION['usertype'] = "student";

        header("location:studenthome.php");
    } else {
        $error_message = "username or password error";
        $_SESSION['loginMessage'] = $error_message;
        header("location:login.php");
    }
}
