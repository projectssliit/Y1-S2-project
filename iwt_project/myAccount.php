<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: login.php");
}
$conn = mysqli_connect("localhost","root","","bookstore"); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/acc.css">
</head>
<body>
<?php include 'navigation.php';?>
<div class="main">
        <h2>My Profile</h2>
        <div class="card">
            <div class="card-body">
            <?php


    $query="SELECT * FROM user WHERE Email ='{$_SESSION["SESSION_EMAIL"]}'";
    $query_run=mysqli_query($conn , $query);

   

   foreach($query_run as $row)
    {

?>
                <table>
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>:</td>
                            <td><?php echo $row['Firstname']?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>:</td>
                            <td><?php echo $row['Lastname']?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $row['Email']?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $row['Address']?></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td><?php echo $row['Gender']?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td><?php echo $row['Password']?></td>
                        </tr>
                    </tbody>
                </table>
<?php
    }
?>
                
            </div>
        </div>

</body>
</html>