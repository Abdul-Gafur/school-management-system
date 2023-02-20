<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';

$conn = mysqli_connect($hostname, $username, $password, $db);

if (isset($_POST['add_student'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $usertype = "student";

    $check = "SELECT * FROM user WHERE username = '$username'";
    $check_user = mysqli_query($conn, $check);
    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        echo "Username already exit";
    } else {
        $sql = "INSERT INTO user(username, email, phone, usertype, password) VALUES ('$username', '$email', '$phone', '$usertype', '$password')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "script type='text/javascript'>
        alert('Student Added Successfully')
        </script>";
        } else {
            echo "Failed";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .add_con {
            background-color: skyblue;
            width: 400px;
            padding-top: 70px;
            padding-bottom: 70px;
        }
    </style>
</head>

<body>

    <?php
    include('system/include/admin_header.php');
    include('system/include/admin_side_bar.php');
    ?>

    <div class="content">

        <center>
            <div class="">
                <h1>Add Student</h1>
                <div class="add_con">
                    <form action="" role="form" class="form-inline" method="POST">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="username" id="" placeholder="Enter student username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" placeholder="Enter Student email">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" name="phone" id="" placeholder="Enter Student Phone">
                        </div class="form-group">
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" id="" placeholder="Enter student password">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add_student" id="" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </center>
    </div>
</body>

</html>