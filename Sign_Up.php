<?php
$success = false;
$failure = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";
    $conn = mysqli_connect($servername, $username, $password, $database);
    // if (!$conn) {
    //     echo "no " . mysqli_connect_error();
    // } else {
    //     echo "yes";
    // }

    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);


    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $res = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($res);
    if ($numExistRows > 0) {
        $failure = true;
    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`username`,`password`,`dt`) VALUES ('$username','$hash',current_timestamp())";
            // Creating hash password

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $success = true;
            } else {
                $failure = true;
                // echo "NO NO";
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="signIn_Up.css">


</head>

<body>
    <div class="mainContainer">
     <?php
        if ($success) {
            echo ' <div class="alert alert-success alert-dismissible fade show" style="background-color:"#970097";" role="alert">
            <strong>Success!</strong> Your account is now created and you can login
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        if ($failure) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        ?>
        <div class="main">
            <div class="content1">
            </div>
            <div class="content2">
                <!-- <div class="signUp"> -->

                    <h1>Welcome</h1>
                    <form action="Sign_Up.php" method="post">
                        <div class="name">
                            <label for="username">
                                Username :
                            </label>
                            <br>
                            <input type="text" name="username" required placeholder="Name">
                        </div>
                        <div class="password">
                            <label for="password">Password :</label><br>
                            <input type="password" name="password" required placeholder="Password">
                        </div>

                        <div class="cpassword">
                            <label for="cpassword">Confirm Password :</label><br>
                            <input type="password" name="cpassword" required placeholder="Confirm Password">
                        </div>

                        <h5 style="font-size: 10px; font-weight:900;letter-spacing:1px">Already has account? <a href="sign_in.php" id="login" style="font-size: 14px;">Login</a> </h5>
                        <button >
                            Sign In
                        </button>
                    </form>
                <!-- </div> -->


            </div>
        </div>
    </div>
    <!-- <script src="signIn_Up.js"></script> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

<!-- https://unsplash.com/photos/ZAiN5wnsR0E -->
<!-- https://unsplash.com/photos/pG4VMPudxNM -->
<!-- https://source.unsplash.com/CCx6Fz_CmOI/1200x800 -->