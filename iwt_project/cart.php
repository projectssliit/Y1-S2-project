<?php
session_start();
$conn = mysqli_connect("localhost","root","","bookstore"); 
$btotal=0;
$stotal=0;
$total=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
	<style>
		table
		{
			width:100%;
		}

		td 
		{
			align:center;
			text-align:center; 
		}

		a
		{
    		text-decoration: none;
			color:white;
		}
        .btn{
            border: none;
            color: white;
            padding: 14px 28px; 
            background-color: #f44336;
        }
		.block{
			display: block;
  			width: 40%;
 		 	border: none;
  			background-color: #046ed0;
  			padding: 14px 28px;
  			font-size: 16px;
  			text-align: center;
		}

		.block:hover
		{
  		background-color: #ddd;
  		color: black;
		}

		.col-50
		 {
  		-ms-flex: 50%;
  		flex: 50%;
		}

		.row
		 {
  		display: -ms-flexbox; 
  		display: flex;
  		-ms-flex-wrap: wrap;
  		flex-wrap: wrap;
  		margin: 0 -16px;
		}
	</style>
</head>
<body>
<?php include 'navigation.php';?>
   	<form action="cart.php" method="post">
	   	<table class="table">
		   <tr><th><h2>Books</h3></th></tr>
	   		<tr>
			   	<th>Item</th>
	   			<th>Name</th>
	   			<th>Price</th>
                <th>Total</th>	  			
	   			<th>Remove</th>
	   		</tr>
	   		<?php
               $con = mysqli_connect("localhost", "root", "","bookstore");
               $query = "SELECT book.BID,b_title,b_price,b_img,author FROM `book` INNER JOIN cart ON book.BID = cart.BID ";
               $result = mysqli_query($con, $query);
			   while($row =mysqli_fetch_assoc($result))
			   {
					
			?>
			<tr>
				
				<td><img src= "<?php echo $row['b_img']; ?>" style="width: 130px"></td>
				<td><?php echo $row['b_title'] . " by " . $row['author']; ?></td>
				<td><?php echo "LKR" . $row['b_price']; ?></td>
                <td></td>
				<td>
     			<form action="" method ="POST">
				 <input type="hidden" name="remove_id" value="<?php echo $row['BID'];?>">
      			<button type="submit" name="remove_btn" class="btn">Remove</button>
      			</form>
      			</td> 
				 <?php $btotal=($btotal + $row['b_price']);?>
			</tr>
			
			<?php } ?>

            <?php
               $con = mysqli_connect("localhost", "root", "","bookstore");
               $squery = "SELECT stationary.SID,s_name,s_price,s_image FROM stationary INNER JOIN cart ON stationary.SID = cart.SID ";
               $sresult = mysqli_query($con, $squery);
			   while($srow =mysqli_fetch_assoc($sresult))
			   {
					
			?>
			<tr>
				
				<td><img src= "<?php echo $srow['s_image']; ?>" style="width: 130px"></td>
				<td><?php echo $srow['s_name'];?></td>
				<td><?php echo "LKR" . $srow['s_price']; ?></td>
                <td></td>
				<td>
     			<form action="" method ="POST">
				 <input type="hidden" name="remove_sid" value="<?php echo $srow['SID'];?>">
      			<button type="submit" name="remove_sbtn" class="btn">Remove</button>
      			</form>
      			</td> 
                  <?php $stotal=($stotal + $srow['s_price']);?>
			</tr>
			<?php } ?>	
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><?php $total=($stotal + $btotal);
                echo"LKR" .$total;
				$_SESSION["SESSION_Total"] = $total;
                ?>
                </td>
                <td></td>

            </tr>	  
            
	   	</table>
		
		   </form>

	<?php
if(isset($_POST['remove_sbtn']))
{
$sid=$_POST['remove_sid'];
$ssql="DELETE  FROM cart WHERE SID ='$sid'";
$ssql_run=mysqli_query($conn, $ssql);
if($ssql_run)
    {
        
        echo "<script type='text/javascript'>alert('removed successfully!')</script>";
        
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    } 

}


if(isset($_POST['remove_btn']))
{
$id=$_POST['remove_id'];
$sql="DELETE  FROM cart WHERE BID ='$id'";
$sql_run=mysqli_query($conn, $sql);
if($sql_run)
    {
        
        echo "<script type='text/javascript'>alert('removed successfully!')</script>";
        
    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    } 

}
?>
<div>
	<br/><br/>
<div class=row>
	<div class="col-50">
	<button class=block><a href="payment.php" >Go To Checkout</a> </button>
	<br>
	<button class=block><a href="shop.php" >Continue Shopping</a></button>
</div>
</div>
</div>
</body>
</html>