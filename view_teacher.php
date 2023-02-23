<?php

session_start();
error_reporting(0);
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "student") {
    header("location:login.php");
}

$hostname = 'localhost';
$username = 'root';
$password = '';
$db = 'management_system';
$usertype = "student";

$conn = mysqli_connect($hostname, $username, $password, $db);

$sql = "SELECT * FROM teacher ";

$result = mysqli_query($conn, $sql);

// if ($_GET['teacher_id']) {
//     $teacher_id = $_GET['teacher_id'];

//     $delete = "DELETE FROM teacher WHERE id = '$teacher_id'";

//     $deleted = mysqli_query($conn, $delete);

//     if ($deleted) {

//         $_SESSION['message'] = "Teacher Deleted Successfully";
//         header('location:view_teacher.php');
//     }
// }

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
        .table {
            width: 500px;
        }
    </style>
</head>

<body>

    <?php
    include('system/include/admin_header.php');
    include('system/include/admin_side_bar.php');
    ?>


</body>
<div class="content">
    <center>
        <h1>Teacher Data</h1><br>
        <?php

        if ($_SESSION['message']) {
            echo $_SESSION['message'];
        }

        unset($_SESSION['message']);
        ?>

        <div class="container">
            <table class="table table-bordered table-hover">
                <tr style="text-align: center;">
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>

                <?php while ($data = $result->fetch_assoc()) { ?>
                    <tr>
                        <td style="padding:20px">
                            <?php echo "{$data['name']}" ?>
                        </td>

                        <td style="padding:20px"><?php echo "{$data['description']}" ?></td>

                        <td> <img height="100px" width="100px" src="<?php echo "{$data['image']}" ?>" alt=""></td>

                        <td><?php echo "<a class='btn btn-danger' onClick = \" javascript:return confirm('Are you sure you want to delete student') \"  href='delete_teacher.php? teacher_id={$data['id']}'>Delete</a>" ?></td>

                        <td><?php echo "<a class='btn btn-primary'  href='update_teacher.php? teacher_id={$data['id']}'>Update</a>" ?></td>

                    </tr>
                <?php } ?>
            </table>
        </div>

    </center>
</div>

</html>