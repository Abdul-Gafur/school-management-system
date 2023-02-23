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

if (isset($_POST['add_teacher'])) {
    $t_name = $_POST['teacher_name'];
    $t_description = $_POST['teacher_description'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;

    $dst_db = "image/" . $file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql = "INSERT INTO teacher (name, description, image) VALUES ('$t_name', '$t_description', '$dst_db')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:admin_add_teacher.php');
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
        .add_tea {
            background-color: skyblue;
            padding-top: 70px;
            padding-bottom: 70px;
            width: 500px;
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
                <h1>Add Teacher</h1><br>
                <div class="add_tea">
                    <form action="#" role="form" class="form-inline" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Teacher Name:</label>
                            <input type="text" name="teacher_name" id="" placeholder="Enter student username">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Description:</label>
                            <textarea name="teacher_description" id="" ></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Image</label>
                            <input type="file" name="image" id="" placeholder="Enter Student Phone">
                        </div class="form-group">
                        <br>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="add_teacher" id="" placeholder="Add Teacher">
                        </div>
                        
                    </form>
                </div>
            </div>
        </center>
    </div>
</body>
</html>