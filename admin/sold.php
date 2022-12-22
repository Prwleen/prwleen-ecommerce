<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='status'){
		$operation=get_safe_value($con,$_GET['operation']);
		$id=get_safe_value($con,$_GET['id']);
		if($operation=='active'){
			$status='1';
		}else{
			$status='0';
		}
		$update_status_sql="update product set status='$status' where id='$id'";
		mysqli_query($con,$update_status_sql);
	}
	
}


$sql="select * from sold";
$res=mysqli_query($con,$sql);
?>

<div>
<h1>Welcome Admin</h1>
<div><ul class="nav">
  <li><a href="product.php">Products</a></li>
  <li><a href="contact_us.php">Contact</a></li>
  <li><a href="sold.php">Sold Products</a></li>
  <li class="floating"><a href="logout.php">Logout</a></li>
</ul>
<style><?php include 'style.css'?></style>
<div>
    <h3>Sold Products </h3>
    <div>
    <table class="my_table">
    <thead>
        <th>Product</th>
		    <th>Customer</th>
        <th>Contact Info.</th>
    </thead>
    <tbody>
    <?php 
   
			while($row=mysqli_fetch_assoc($res)){?>
			<tr>
                <td><?php echo $row['product_name']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['contact']?></td>
			</tr>
			<?php } ?>
    </tbody>
    </table>
</div>
</div>
</div>
  </div>