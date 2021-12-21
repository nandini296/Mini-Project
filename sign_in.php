<?php


$loggedin =false;
$fail = false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $servername = "localhost";
$username = "root";
$password = "";
$database = "users";
$conn = mysqli_connect($servername,$username,$password,$database);

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM `users` WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);

if($num>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
        if(password_verify($password,$row['password']))
        {
            session_start();
            $_SESSION['username'] = $username;
            // echo"YESSSSS";
            $loggedin =true;
        }
        else{
            $fail = true;
        }

    }
}
else{
   $fail = true;
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
    <div class="mainContainer hey">

    <?php
        if ($loggedin) {
            echo ' <div class="alert alert-success alert-dismissible fade show" style="background-color:"#970097";" role="alert">
            <strong>Success!</strong> You have logged in
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        if ($fail) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Invalid Credential. PLease sign up if you donot have account.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> ';
        }
        ?>
        <div class="main">
            <div class="content1 hey">
            </div>
            <div class="content2">
                <div class="signIn">
                    <h1>Welcome Back!!</h1>
                    <form action="sign_in.php" method="post">
                        <div class="name">
                            <label for="name">
                                Username :
                            </label>
                            <br>
                            <input type="text" name="username" required placeholder="Name">
                        </div>
                        <div class="password">
                            <label for="password">Password :</label><br>
                            <input type="password" name="password" required placeholder="Password">
                        </div>
                        <h5>Donot has account?<a href="Sign_Up.php" id="signup">Sign Up</a> </h5>
                        <button class="btn">
                            Log in
                        </button>
                    </form>

                </div>

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