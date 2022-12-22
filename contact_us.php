<?php
require('admin/connection.inc.php');
require('admin/functions.inc.php');
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
 <div>
<?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>
        <?php  if (isset($_SESSION['username'])) : ?>
                <strong>
                <h1>Welcome  <?php echo $_SESSION['username']; ?></h1>
                </strong>
            </p>
<?php endif ?>
<div><ul class="nav">
  <li><a href="home1.php">Home</a></li>
  <li><a href="contact_us.php">Contact</a></li>
  <li class="floating"><a href="admin/logout.php">Logout</a></li>
</ul>
<style><?php include 'admin/style.css'?></style>
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
			</tr>
			<?php } ?>
    </tbody>
    </table>
</div>
</div>
</div>