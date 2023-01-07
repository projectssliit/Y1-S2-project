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
<h1>Payment Details</h1>
<br>


<div>
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
</div>
<?php
$conn = mysqli_connect("localhost","root","","bookstore"); 

  $query ="SELECT* FROM payment ";
  $query_run= mysqli_query($conn, $query);
?>

<table id="myTable">
  <tr class="header">
    <th >PID</th>
    <th >First Name</th>
    <th >Last Name</th>
    <th>Email</th>
    <th>Address</th>
    <th>City</th>    
    <th>State</th>
    <th>Name Card</th>
    <th>Amount</th>
    <th>Delete</th>
  </tr> 
   <?php
   if(mysqli_num_rows($query_run)>0)
   {
     while($row =mysqli_fetch_assoc($query_run))
     {
       ?>
      <tr>
      <td><?php echo $row['PID']?></td>
      <td><?php echo $row['fname']?></td>
      <td><?php echo $row['lname']?></td>
      <td><?php echo $row['email']?></td>
      <td><?php echo $row['address']?></td>
      <td><?php echo $row['city']?></td>
      <td><?php echo $row['state']?></td>
      <td><?php echo $row['namecard']?></td>
      <td><?php echo $row['P_amount']?></td>
      <td>
      <form action="" method ="POST">
         <input type="hidden" name="delete_id" value="<?php echo $row['PID'];?>">
      <button type="submit" name="delete_btn" class="btn">Delete</button>
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
$query="DELETE  FROM payment WHERE PID='$id'";
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
<script src="js/script.js"></script>

</body>
</html> 
