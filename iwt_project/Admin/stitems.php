<?php
session_start();
$conn = mysqli_connect("localhost","root","","bookstore"); 

if(isset($_POST['submit']))
{
$stid = $_POST['stid'];
$name = $_POST['name'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$image = $_POST['image'];


$query = "INSERT INTO stationary (SID, s_name, s_price, s_quantity,s_image) VALUES ('{$stid}', '{$name}', '{$price}', '{$quantity}','{$image}')";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        echo "<script type='text/javascript'>alert('Product Added successfully!')</script>";
        
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }  

  }
  ?>
<?php
if(isset($_POST['edit_btn']))
{
  $stid = $_POST['stid'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $image = $_POST['image'];

$query="UPDATE book SET SID='$stid',s_name='$name', s_price='$price',s_quantity='$quantity',s_image='$image'  WHERE SID ='$stid'";
$query_run=mysqli_query($conn, $query);

if($query_run)
    {
        
        echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
        
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="styles/admin.css">
    <link rel="stylesheet" href="admin.css">
    <style>
 .row {
  display: -ms-flexbox; 
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}
input[type=text], select {
  width:60%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=submit] {
  width: 33.33%;
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
label {
  margin-bottom: 10px;
  display: block;
}

</style>
</head>
<body>
<?php include 'sidebar.php';?>

<div class="main">
  <h1>Stationary</h1>
  <div class="container">
    <h2>Add Stationary Items</h2>
  <form action="" method="POST">
    <div class="row">
        <div class="col-50">
          <label >Stationary ID</label>
          <input type="text"  name="stid" placeholder="">
          <label >Name</label>
          <input type="text"  name="name" placeholder=""> 
          <label >Price</label>
          <input type="text"  name="price" placeholder=""> 
        </div>

        <div class="col-50">
            
            <label >Quantity</label>
            <input type="text"  name="quantity" placeholder="">
            <label >Image</label>
            <input type="text"  name="image" placeholder="">
          </div>
      </div>  
      <div class="col-50">
    <input type="submit" name="submit" value="Submit">

    <input type="submit" name="edit_btn" value="Update">
</div>
  </form>
</div>
<br>
  <div>
 
<?php
$conn = mysqli_connect("localhost","root","","bookstore"); 

  $query ="SELECT* FROM stationary";
  $query_run= mysqli_query($conn, $query);
?>

<table id="myTable">
  <tr class="header">
    <th>Stationary ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Quantity</th>    
    <th>Image</th>
    <th>Delete</th>
  </tr> 
   <?php
   if(mysqli_num_rows($query_run)>0)
   {
     while($row =mysqli_fetch_assoc($query_run))
     {
       ?>
      <tr>
      <td><?php echo $row['SID']?></td>
      <td><?php echo $row['s_name']?></td>
      <td><?php echo $row['s_price']?></td>
      <td><?php echo $row['s_quantity']?></td>
      <td><?php echo $row['s_image']?></td>
      
      
      <td>
      <form action="" method ="POST">
         <input type="hidden" name="delete_id" value="<?php echo $row['SID'];?>">
      <button type="submit" name="delete_btn" class="btn">DELETE</button>
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
$query="DELETE  FROM stationary WHERE SID='$id'";
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
  
</div>

</body>
</html> 