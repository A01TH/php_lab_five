<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to right, #243B55, #141E30);
        }
    </style>

</head>

<body class="text-white">

    <?php

    if (isset($_COOKIE['username'])) {
        header('Location: ./index.php');
    }

    function insert_user()
    {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $re_password = $_POST["re_password"];
        if ($password != $re_password) {
            return;
        }
        echo $password;

        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'demo';
        $link = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        $sql = "insert into emp (username, password)
        values ('$username', '$password')";
        mysqli_select_db($link, $dbname);
        $result = mysqli_query($link, $sql);

        if (!$result) {
            die('Could not insert to table: ' . mysqli_error($link));
        }

        echo "<br>Data inserted to table successfully\n";
        mysqli_close($link);
        header("Location: ./login.php");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        insert_user();
    }


    ?>
    <div class="container w-50 mt-5">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account</p>
        <form action="<?php $_PHP_SELF ?>" method="POST">
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="re_password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="rest" class="btn btn-primary">Reset</button>
            <p>Already have an account? <a href="./login.php" class="text-decoration-none">Login here</a></p>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>