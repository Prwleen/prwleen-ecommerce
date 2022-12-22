<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($con,$_GET['type']);
    
    if($type=='delete'){
       $id=get_safe_value($con,$_GET['id']);
       $delete_sql="delete from contact_us where id='$id'";
       mysqli_query($con,$delete_sql);
    }
 }
 $sql="select * from contact_us order by id desc";
 $res=mysqli_query($con,$sql);
 
 ?>
 <h1>Welcome Admin</h1>
<div><ul class="nav">
  <li><a href="product.php">Products</a></li>
  <li><a href="contact_us.php">Contact</a></li>
  <li class="floating"><a href="logout.php">Logout</a></li>
</ul>
<style><?php include 'style.css'?></style>
<div class="floating">
    
    <h3>Contacts </h3>
    <div>
    <table class="my_table">
    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th></th>
    </thead>
    <tbody>
    <?php 
		$i=1;
			while($row=mysqli_fetch_assoc($res)){?>
			<tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['mobile']?></td>
				<td>
					<?php
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