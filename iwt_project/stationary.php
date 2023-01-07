<?php
session_start();
if (!isset($_SESSION["SESSION_EMAIL"])) {
    header("Location: login.php");
}
$conn = mysqli_connect("localhost","root","","bookstore");
require_once ('include/components.php');

	
 if(isset($_POST['add']))
    {
        $id=$_POST['stationaryid'];
        $sql="SELECT * FROM stationary WHERE SID ='$id'";
        $sql_run=mysqli_query($conn , $sql);

        if($sql_run)
        {
           $add="INSERT INTO cart (SID) VALUES ('{$id}')" ;
           $add_run = mysqli_query($conn, $add);
           echo "<script type='text/javascript'>Added('failed!')</script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('failed!')</script>"; 
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
    <link rel="stylesheet" href="css/stationary.css">
</head>
<body>
<?php include 'navigation.php';?>
<div class="hero-image">
  <div class="hero-text">
    <h1>A Littel Reading is All the Theropy<br>a Person Need Some Times.</h1>
    
  </div>
  </div>
  <br>
  <div class="row">
  
  <?php

    $query ="SELECT* FROM stationary ";
    $query_run= mysqli_query($conn, $query);
    if(mysqli_num_rows($query_run)>0)
   {
                while ($row = mysqli_fetch_assoc( $query_run)){
                    s_component($row['s_image'], $row['s_name'], $row['s_price'], $row['SID']);
                }
            }
            ?>
    

</div>

    
</body>
</html>