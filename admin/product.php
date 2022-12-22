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
	
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from product where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from product order by product.id asc";
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
    <h3>Products </h3>
    <h3><a href=manage_product.php>Add Product</a></h3>
    <div>
    <table class="my_table">
    <thead>
        <th>ID</th>
        <th>Name</th>
		<th>Image</th>
        <th>Price</th>
        <th>Qty</th>
        <th></th>
    </thead>
    <tbody>
    <?php 
		$i=1;
			while($row=mysqli_fetch_assoc($res)){?>
			<tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
				<td><img width="25px" height="25px" src="../media/<?php echo $row['image']?>"></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['qty']?></td>
				<td>
					<?php
						echo "<button class='edit'><a href='manage_product.php?id=".$row['id']."'>Edit</a></button>&nbsp;";
								
						echo "<button class='delete'><a href='?type=delete&id=".$row['id']."'>Delete</a></button>";
								
					?>
				</td>
			</tr>
			<?php } ?>
    </tbody>
    </table>
</div>
</div>
</div>
  </div>