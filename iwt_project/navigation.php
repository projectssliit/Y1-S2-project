<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div >
  <img class="banner" src="img/cover.jpg">
</div>

<div id="navbar">
  <a class="active" href="home.php">Home</a>
  <a href="shop.php">Shop</a>
  <a href="stationary.php">Sationary Items</a>
  <a href="contact.php">Contact Us</a>
  <a href="about.php">About Us</a>
  <a href="myAccount.php">My Account</a>
  <a class ="log" style="float:right  " href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
  <a class ="log" style="float:right  " href="logOut.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  <a class ="log" style="float:right  " href="cart.php"><i class="far fa-shopping-cart"></i> Cart</a>
  </div>
</div>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
</html>