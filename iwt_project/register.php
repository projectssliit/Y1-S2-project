<?php
    session_start();
    if (isset($_SESSION["SESSION_EMAIL"])) {
        header("Location: home.php");
    }
    $conn = mysqli_connect("localhost","root","","bookstore"); 
    if (isset($_POST["submit"])) {
        

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE Email='{$email}'")) > 0)
         {
            echo "<script>alert('{$email} - This email has already taken.');</script>";
        }else {
            if ($password === $cpassword) {
                $query = "INSERT INTO user (Firstname, Lastname, Email, Address, Gender, Password) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$address}', '{$gender}','{$password}')";
                $query_run = mysqli_query($conn, $query);

                if($query_run)
                 {
                    header("Location: login.php");
                }else {
                    echo "<script>Error: ".$query.mysqli_error($conn)."</script>";
                }
            }else {
                echo "<script>alert('Password and confirm password do not match.');</script>";
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
    <link rel="stylesheet" href="Admin/styles/reg.css">
    <title>Create Login Limits PHP Script</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Customer Register</h2>
        <form action="" method="post" class="form">
            <div class="input-field">
                <label for="firstname" class="input-label">First Name</label>
                <input type="firstname" name="firstname" id="firstname" class="input" placeholder="Enter your first name" required>
            </div>
            <div class="input-field">
                <label for="lastname" class="input-label">Last Name</label>
                <input type="lastname" name="lastname" id="lastname" class="input" placeholder="Enter your last name" required>
            </div>
            <div class="input-field">
                <label for="lastname" class="input-label">Gender</label>
                <div class="col-sm-6">
                    <label class="radio-inline"><input type="radio" name="gender" value="Male">Male</label>
                    <label class="radio-inline"><input type="radio" name="gender" value="Female">Female</label>
                </div>
            </div>
            <div class="input-field">
                <label for="address" class="input-label">Address</label>
                <input type="address" name="address" id="address" class="input" placeholder="Enter your address" required>
            </div>
            <div class="input-field">
                <label for="email" class="input-label">Email</label>
                <input type="email" name="email" id="email" class="input" placeholder="Enter your email" required>
            </div>
            <div class="input-field">
                <label for="password" class="input-label">Password</label>
                <input type="password" name="password" id="password" class="input" placeholder="Enter your password" required>
            </div>
            <div class="input-field">
                <label for="cpassword" class="input-label">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="input" placeholder="Enter your confirm password" required>
            </div>
            <button class="btn" name="submit">Register</button>
            <p> Already have an account? <a href="login.php">Login</a>.</p>
        </form>
    </div>
</body>
</html>