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

$sql = "SELECT * from admission";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="public/css/adminssion.css">
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>

        th,
        td {
            padding: 20px;
        }

        th {
            font-size: 15px;
        }
    </style>
</head>

<body>

    <?php
    include('system/include/admin_header.php');
    include('system/include/admin_side_bar.php');
    ?>

    <div class="content">
        <h1>Applied for Admission</h1>

        <div class="container table-responsive">
        <table class="table table-bordered table-condensed table-hover">
            <tr class="tr">
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
            </tr>
            <?php
            while ($data = $result->fetch_assoc()) {
            ?>
                <tr>
                    <td>
                        <?php echo "{$data['name']}" ?>
                    </td>
                    <td><?php echo "{$data['email']}" ?></td>
                    <td><?php echo "{$data['phone']}" ?></td>
                    <td><?php echo "{$data['message']}" ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        </div>
    </div>
</body>

</html>