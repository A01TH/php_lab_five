<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: "Sofia", sans-serif;
            height: 100vh;
            background: linear-gradient(to right, #243B55, #141E30);
        }
    </style>
</head>

<body>
    <?php

    if (!isset($_COOKIE['username'])) {
        header('Location: ./login.php');
    }
    // echo $_COOKIE['username'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        setcookie('username', null);
        header('Location: ./login.php');
    }


    ?>
    <div class="text-white d-flex justify-content-center mt-5">
        <h1>Hi, <b><?php echo $_COOKIE['username']; ?></b>.Welcome to our site</h1>
    </div>

    <div class="text-white d-flex justify-content-center mt-3">
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <button type="submit" type="button" class="btn btn-primary btn-lg">Sign Out of Your Account</button>
        </form>

    </div>




</body>

</html>