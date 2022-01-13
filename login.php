<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <style>
        body {
            height: 100vh;
            background: linear-gradient(to right, #243B55, #141E30);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="text-white">
    <?php

    if (isset($_COOKIE['username'])) {
        header('Location: ./index.php');
    }

    function validation_checker()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'demo';
        $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        $sql = "select * from emp  where  username = '$username' and password = '$password'";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            mysqli_close($link);
            setcookie('username', $username);
            header("Location: ./index.php");
        }



        mysqli_close($link);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        validation_checker();
    }

    ?>
    <div class="container w-50  mt-5">

        <form action="<?php $_PHP_SELF ?>" method="POST">
            <div class="mb-3">
                <h2>Login</h2>
                <p>Please fill in your credentials to login</p>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <p>Don't have an account? <a href="./signup.php" class="text-decoration-none">Sign up now</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>