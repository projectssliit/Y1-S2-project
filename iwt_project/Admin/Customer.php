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

</head>
<body>
<?php include 'sidebar.php';?>

<div class="main">
<h1>Customer Details</h1>
<br>

<?php
$conn = mysqli_connect("localhost","root","","bookstore"); 

  $query ="SELECT* FROM user WHERE UserType='user'";
  $query_run= mysqli_query($conn, $query);
?>

<table id="myTable">
  <tr class="header">
    <th >First Name</th>
    <th >Last Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>Gender</th>    
    <th>Password</th>
    <th>Delete</th>
  </tr> 
   <?php
   if(mysqli_num_rows($query_run)>0)
   {
     while($row =mysqli_fetch_assoc($query_run))
     {
       ?>
      <tr>
      <td><?php echo $row['Firstname']?></td>
      <td><?php echo $row['Lastname']?></td>
      <td><?php echo $row['Email']?></td>
      <td><?php echo $row['Address']?></td>
      <td><?php echo $row['Gender']?></td>
      <td><?php echo $row['Password']?></td>
      <td>
      <form action="" method ="POST">
         <input type="hidden" name="delete_id" value="<?php echo $row['CID'];?>">
      <button type="submit" name="delete_btn" class="btn">DELET</button>
      </form>
      </td> 
  </tr>

<?php
     }

    }

    else{
      echo"No record found";
    }




     ?>

</table>

<?php
if(isset($_POST['delete_btn']))
{
$id=$_POST['delete_id'];
$query="DELETE  FROM user WHERE CID='$id'";
$query_run=mysqli_query($conn, $query);

if($query_run)
    {
        
        echo "<script type='text/javascript'>alert('delete successfully!')</script>";
        
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    } 

}
?>



</div>



  
</div>

</body>
</html> 