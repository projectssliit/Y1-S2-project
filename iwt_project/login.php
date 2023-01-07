<?php
    session_start();
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: home.php");
    }

    if (isset($_POST["login"])) {
        $conn = mysqli_connect("localhost","root","","bookstore"); 
        
        $email = $_POST["email"];
        $password = $_POST["password"];

        $query = "SELECT * FROM user WHERE Email='{$email}' AND Password='{$password}'";
        $query_run = mysqli_query($conn, $query);
        $count = mysqli_num_rows($query_run);

        if ($count === 1) {
            $row = mysqli_fetch_assoc($query_run);
            if($row["UserType"]=="user")
            {
                 $_SESSION["SESSION_EMAIL"] = $email;
                 header("Location: home.php");
            }
            elseif($row["UserType"]=="admin")
	        {
                
                $_SESSION["SESSION_EMAIL"] = $email;
                header("Location: Admin/admin.php");
            }
        }else {
            echo "<script>alert('Your Login detail is incorrect.');</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Admin/styles/reg.css">
    <title>Login form</title>
</head>
<body>

    <div class="wrapper">
        <h2 class="title">Login</h2>
        <form action="" method="post" class="form">
            <div class="imgcontainer">
                <img src="img/img_avatar.png"  alt="Avatar" class="avatar">
            </div>
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
            </div>
            <button class="btn" name="login">Login</button>
            <p>Create Account! <a href="register.php">Register</a>.</p>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                
            </div>
        </form>
    </div>
</body>
</html>