<?php
error_reporting(0);
session_start();
session_destroy();
if ($_SESSION['message']) {
    $message = $_SESSION['message'];
    echo "<script type='text/javascript'>
    alert('$message');
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <!-- Nav_bar start -->
    <nav>
        <label class="logo">Nifty School</label>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Admission</a></li>
            <li><a href="login.php" class="btn btn-success">Login</a></li>
        </ul>
    </nav>
    <!-- nav_bar end -->

    <div class="section1">
        <span class="hero_text">We Serve as secondary parents</span>
        <img class="hero_img" src="assets/hero_img.jpg" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="welcome_img" src="assets/hero_img.jpg" alt="">
            </div>
            <div class="col-md-8">
                <h1>Welcome to Nifty School</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto voluptates dignissimos natus voluptatem omnis minima quaerat totam molestias reprehenderit a! Similique ea earum error culpa doloremque ratione minus blanditiis quaerat.</p>
            </div>
        </div>
    </div>

    <!-- teacher section start -->
    <center>
        <h1>Our Teachers</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher_img" src="assets/teacher1.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum doloremque quis obcaecati odio hic nulla delectus saepe eos ab deleniti aliquid facilis labore libero, quia, dolore quos? Aspernatur, molestias minima.</p>
            </div>
            <div class="col-md-4">
                <img class="teacher_img" src="assets/teacher2.png" alt="">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit ipsam, sint nemo in quis cumque amet doloremque nisi natus! Consequuntur quisquam assumenda perferendis eius ea deserunt eligendi soluta aperiam fuga!</p>
            </div>
            <div class="col-md-4">
                <img class="teacher_img" src="assets/teacher3.png" alt="">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eos, deleniti labore ipsam at dolorem provident magnam culpa consectetur commodi accusantium tempore vero quisquam, atque perferendis tenetur quo consequatur? Molestias, recusandae</p>
            </div>
        </div>
    </div>
    <!-- teacher section end -->

    <!-- Courses section start -->
    <center>
        <h1>Our Courses</h1>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img class="teacher_img" src="assets/teacher1.png" alt="">
                <h3>Web Development</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher_img" src="assets/teacher2.png" alt="">
                <h3>Graphic Design</h3>
            </div>
            <div class="col-md-4">
                <img class="teacher_img" src="assets/teacher3.png" alt="">
                <h3>Marketing</h3>
            </div>
        </div>
    </div>
    <!-- Courses section end -->

    <center>
        <h1>Admission Form</h1>
        <div align="center" class="admission_form">
            <form action="data_check.php" method="POST">
                <div>
                    <div class="adm_fm">
                         <label class="label_text" for="">Name:</label>
                        <input class="input_ad" type="text" name="name" id="">
                    </div>
                    <div class="adm_fm"> 
                        <label class="label_text" for="">Email:</label>
                        <input class="input_ad" type="text" name="email" id="">
                    </div>
                    <div class="adm_fm">
                        <label class="label_text" for="">Phone:</label>
                        <input class="input_ad" type="text" name="phone" id="">
                    </div>
                    <div class="adm_fm">
                        <label class="label_text" for="">Message:</label>
                        <textarea class="textarea_ad" name="message" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <input class="btn btn-primary" id="submit" type="submit" value="Apply" name="apply">
                    </div>
                </div>
            </form>
        </div>
    </center>

    <footer>
        <h3 class="footer_text">All Rights Reserved @Copyright by Nifty</h3>
    </footer>
</body>

</html> 