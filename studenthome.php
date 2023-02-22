<?php

session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == "admin") {
    header("location:login.php");
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
</head>
</head>

<body>
    <?php
        include('system/include/student_header.php');
        include('system/include/student_side_bar.php');
    ?>
    
    <div class="content">
        <h1>Side Accordion</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore obcaecati odit dicta deserunt optio est, at, minima sunt asperiores, nulla quidem? Beatae eos accusantium id culpa dignissimos quas cupiditate.</p>
        <input type="text" name="" id="">
    </div>
</body>

</html>

</html>