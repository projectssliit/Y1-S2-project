<?php
session_start();
$conn = mysqli_connect("localhost","root","","bookstore"); 

if(isset($_POST['submit']))
{
$bookid = $_POST['bookid'];
$title = $_POST['title'];
$price = $_POST['price'];
$author = $_POST['author'];
$quantity = $_POST['quantity'];
$version = $_POST['version'];
$image = $_POST['image'];
$sprice= $_POST['sprice'];
$category = $_POST['category'];

$query = "INSERT INTO book (BID, b_title, b_price, author,b_quantity,version,b_img,b_sprice,category) VALUES ('{$bookid}', '{$title}', '{$price}', '{$author}', '{$quantity}','{$version}','{$image}','{$sprice}','{$category}')";
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
$bookid= $_POST['bookid'];
$title = $_POST['title'];
$price = $_POST['price'];
$author = $_POST['author'];
$quantity = $_POST['quantity'];
$version = $_POST['version'];
$image = $_POST['image'];
$sprice= $_POST['sprice'];
$category = $_POST['category'];

$query="UPDATE book SET b_title='$title',b_price='$price', author='$author',b_quantity='$quantity',version='$version',b_img='$image',b_sprice='$sprice',category='$category'  WHERE BID ='$bookid'";
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
  <h1>Books</h1>
  <div class="container">
    <h2>Add Books</h2>
  <form action="" method="POST">
    <div class="row">
        <div class="col-50">
          <label >Book ID</label>
          <input type="text"  name="bookid" placeholder="">
          <label >Title</label>
          <input type="text"  name="title" placeholder="">
          <label >Price</label>
          <input type="text"  name="price" placeholder="">  
          <label >Author</label>
          <input type="text"  name="author" placeholder="">   
        </div>

        <div class="col-50">
            
            <label >Quantity</label>
            <input type="text"  name="quantity" placeholder="">
            <label >Version</label>
            <input type="text"  name="version" placeholder="">
            <label >Image</label>
            <input type="text"  name="image" placeholder="">
            <label >Sale Price</label>
            <input type="text"  name="sprice" placeholder="">
            <label >Category</label>
            <select  name="category">
              <option name="category" value="Children">Children</option>
              <option name="category" value="Coffee_Table">Coffee_Table</option>
              <option name="category" value="Cookery">Cookery</option>
              <option name="category" value="Education">Education</option>
              <option name="category" value="Novel">Novel</option>
            </select>
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
  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
<?php
$conn = mysqli_connect("localhost","root","","bookstore"); 

  $query ="SELECT* FROM book";
  $query_run= mysqli_query($conn, $query);
?>

<table id="myTable">
  <tr class="header">
    <th >Book ID</th>
    <th >Title</th>
    <th>Price</th>
    <th>Author</th>
    <th>Quantity</th>    
    <th>Version</th>
    <th>Image</th>
    <th>Category</th>
    <th>Sale Price</th>
    <th>Delete</th>
  </tr> 
   <?php
   if(mysqli_num_rows($query_run)>0)
   {
     while($row =mysqli_fetch_assoc($query_run))
     {
       ?>
      <tr>
      <td><?php echo $row['BID']?></td>
      <td><?php echo $row['b_title']?></td>
      <td><?php echo $row['b_price']?></td>
      <td><?php echo $row['author']?></td>
      <td><?php echo $row['b_quantity']?></td>
      <td><?php echo $row['version']?></td>
      <td><?php echo $row['b_img']?></td>
      <td><?php echo $row['category']?></td>
      <td><?php echo $row['b_sprice']?></td>
      
      <td>
      <form action="" method ="POST">
         <input type="hidden" name="delete_id" value="<?php echo $row['BID'];?>">
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
$query="DELETE  FROM book WHERE BID='$id'";
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
  
</div>

</body>
</html> 



