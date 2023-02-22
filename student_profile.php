<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "admin") {
    header("location:login.php");
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';

$conn = mysqli_connect($hostname, $username, $password, $db);

$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username='$name'";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result);


// Update profile when submitted
if (isset($_POST['update_student'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $query = "UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE username='$name'";

    $final_result = mysqli_query($conn, $query);
    
    if ($final_result) {
        header('location:student_profile.php');
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
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
</head>

<body>
    <?php
        include('system/include/student_header.php');
        include('system/include/student_side_bar.php');
    ?>
    
    <div class="content">
    <center>
    <div class="">
        <h1>Update Profile</h1><br>
        <?php
       
        ?>
        <div class="add_con">
            <form action="#" role="form" class="form-inline" method="POST">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" id="" placeholder="Enter student username" value="<?php echo "{$data['username']}" ?>">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" id="" value="<?php echo "{$data['email']}" ?>">
                </div>
                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="" value="<?php echo "{$data['phone']}" ?>">
                </div class="form-group">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" name="password" id="" value="<?php echo "{$data['password']}" ?>">
                </div>
                <div class="form-group">
                    <input type="submit" name="update_student" id="" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</center>
    </div>
</body>

</html>

</html>