<?php
    session_start();

$conn = mysqli_connect("localhost","root","","bookstore"); 

if(isset($_POST['submit']))
{
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
}
else {
if($password=== $cpassword)
{
    $query = "INSERT INTO user (Firstname, Lastname, Email, Address, Gender,UserType, Password) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$address}', '{$gender}','admin','{$password}')";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        header('Location:admin.php');
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
        
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }  
}
else
{
    echo "<script type='text/javascript'>alert('Password and confirm Password does not match!')</script>";
    
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
    <link rel="stylesheet" href="styles/reg.css">
    <title>admin registration</title>
</head>
<body>
    <div class="wrapper">
        <h2 class="title">Admin Register</h2>
        <form action="" method="POST" class="form">
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
            <div>
            <button class="btn"><a href="admin.php">back</a></button>
</div>
        </form>
    </div>
</body>
</html>