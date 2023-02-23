<?php
session_start();
error_reporting(0);
$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';
$usertype = "student";

$conn = mysqli_connect($hostname, $username, $password, $db);

$teacher_id = $_GET['teacher_id'];
$sql = "SELECT * FROM teacher WHERE id = '$teacher_id'";
$result = mysqli_query($conn, $sql);

$data = $result->fetch_assoc();


// Teacher Update
if (isset($_POST['update_teacher'])) {
    $t_name = $_POST['teacher_name'];
    $t_description = $_POST['teacher_description'];
    $file = $_FILES['image']['name'];
    $dst = "./image/" . $file;
    $dst_db = "image/" .$file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    if ($file) {
        $query = "UPDATE teacher SET name='$t_name', description='$t_description', image='$dst_db' WHERE id='$teacher_id'";
    } else {
        $query = "UPDATE teacher SET name='$t_name', description='$t_description' WHERE id='$teacher_id'";
    }

    $final_result = mysqli_query($conn, $query);

    if ($final_result) {
        header('location:view_teacher.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
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
                <h1>Update Student</h1><br>
                <?php
                // if ($_SESSION['message']) {
                //     echo $_SESSION['message'];
                // }

                // unset($_SESSION['message']);
                ?>
                <div class="add_con">
                    <form action="#" role="form" class="form-inline" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="">Teacher Name:</label>
                            <input type="text" name="teacher_name" id="" value="<?php echo "{$data['name']}" ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Description:</label>
                            <textarea name="teacher_description" id="" rows="4"><?php echo "{$data['description']}" ?></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">Teacher Old Image</label>
                            <img width="100px" height="100px" src="<?php echo "{$data['image']}" ?>" alt="">
                        </div class="form-group">
                        <div class="form-group">
                            <label for="">Choose new Teacher</label>
                            <input type="file" name="image" id="">
                        </div class="form-group">
                        <br>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_teacher" id="" placeholder="Add Teacher">
                        </div>

                    </form>
                </div>
            </div>
        </center>
    </div>
</body>

</html>