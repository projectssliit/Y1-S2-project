<?php
    session_start();
    $conn = mysqli_connect("localhost","root","","bookstore"); 


    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="admin.css">
    <style>
        
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #046ed0;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 25%;
}

button:hover {
  opacity: 0.8;
}
</style>
</head>
<body>
<?php include 'sidebar.php';?>

<div class="main">
<h2>Edit admin details</h2>
<div class="container">
<?php

if(isset($_POST['edit_btn']))
{
    $id=$_POST['edit_id'];
    $query="SELECT * FROM user WHERE CID ='$id'";
    $query_run=mysqli_query($conn , $query);

   

   foreach($query_run as $row)
    {

?>
<form action="" method="POST">
      <div>
    <input type="hidden" name="edit_id" value="<?php echo $row['CID']?>">
      <label ><b>First Name</b></label>
      <input type="text" name="edit_firstname" value="<?php echo $row['Firstname']?>" >
    </div>
    <div>
      <label ><b>Last Name</b></label>
      <input type="text"  name="edit_lastname" value="<?php echo $row['Lastname']?>">
    </div>
    <div>
      <label ><b>Address</b></label>
      <input type="text"  name="edit_address" value="<?php echo $row['Address']?>" >
    </div>  
      <button type="submit" name="update_btn">Update</button>

      <a href="admin.php"><button type="button" class="cancelbtn" style="background-color: #f44336";>Cancel</button></a>
     

    </form>   

    <?php
    }
    
}

?>
<?php
if(isset($_POST['update_btn']))
{
$id= $_POST['edit_id'];
$fistname= $_POST['edit_firstname'];
$lastname= $_POST['edit_lastname'];
$address= $_POST['edit_address'];

$query="UPDATE user SET Firstname='$fistname',Lastname='$lastname', Address='$address' WHERE CID ='$id'";
$query_run=mysqli_query($conn, $query);

if($query_run)
    {
        
        echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
        header('Location:admin.php');
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
        header('Location:admin_edit.php');
    } 
}  
?>

</div>
</div>
</body>
</html>