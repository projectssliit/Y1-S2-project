<?php
session_start();
$conn = mysqli_connect("localhost","root","","bookstore"); 

if (isset ($_POST['submit']) )
{
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $namecard = $_POST['namecard'];
  $total=$_SESSION["SESSION_Total"];
    
  $sql = "INSERT INTO payment (fname, lname, email, address, city, namecard, P_amount) VALUES ('{$fname}', '{$lname}', '{$email}', '{$address}', '{$city}','{$namecard}','{$total}')";
  $sql_run = mysqli_query($conn, $sql);
    
  if($sql_run)
  {
      echo "<script type='text/javascript'>alert('Payment Successfull!')</script>";
      
  }
  else
  {
      echo "<script type='text/javascript'>alert('Payment Failed!')</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/ne.css">
    
</head>
<body>
    <?php include 'navigation.php';
  
?>

    <h2 align="center">Checkout</h2>

 
<div class="row" style="width:1000px; margin:0 auto;">
  <div class="col-75" >
    <div class="container" >
      <form method="post">
      
        <div class="row">
          <br>
          <div class="col-50">
          <br>
            <label for="fname"><i class="fa fa-user"></i> First Name</label>
			<input type="text" id="fname" name="fname" placeholder="Enter first name">
              
			<label for="lname"><i class="fa fa-user"></i> Last Name</label>
            <input type="text" id="lname"  name="lname" placeholder="Enter last name">
              
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email"  name="email" placeholder="Enter email">
              
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="Enter address">
              
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Enter city">

            <div class="row">
              <div class="col-50">
                <label for="Country">Country</label>
                <input type="text" id="Country"  name="Country" placeholder="Enter country">
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="Enter zip code">
              </div>
            </div>
          </div>

          <div class="col-50">
          <br>
            <label for="cname">Name on Card</label>
            <input type="text" id="namecard"  name="namecard" placeholder="">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="cnumber" name="cnumber" placeholder="">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="exmonth" name="exmonth" placeholder="">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="exyear"  name="exyear" placeholder="">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv"  name="cvv" placeholder="">
              </div>
            </div>
          </div>
          
        </div>
            <div class="col-30">
       
      <div class="form-group">
        <form action="temp.php" method ="POST">
          <button type="submit" name="submit" class="btn btn-info">Payment</button>
        </form>
</div>
      </form>
    </div>
  </div>
</div>
<?php
$conn = mysqli_connect("localhost","root","","bookstore"); 
if(isset($_POST['submit']))
{
  $query="DELETE FROM cart ";
  $query_run=mysqli_query($conn, $query);
}
    ?>
</body>
</html>
