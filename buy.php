<?php
    require('admin/connection.inc.php');
    require('admin/functions.inc.php');
    $msg='';
    $name='';
    $mem='';
    $id='';
    $contact='';
    if (isset($_SESSION['username'])){
        $username=$_SESSION['username']; 
  
    }?>
    <?php if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
    $name=get_safe_value($con,$_GET['name']);
	$res=mysqli_query($con,"select * from product");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
        
	}else{
		header('location:product.php');
		die();
	}
}
$sql="select * from product";
$res=mysqli_query($con,$sql);

?> 
 <?php   if(isset($_POST['submit'])){
        $mem=get_safe_value($con,$_POST['name']);
        $contact=get_safe_value($con,$_POST['contact']);
        mysqli_query($con,"insert into sold(product_name,username,contact) values('$mem','$username','$contact')");
        header('location:home1.php');
    }
    ?>

    <?php if (isset($_SESSION['success'])) :?>
        <div class="error success" >
            <h3>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <style><?php include 'admin/style.css'?>
        <?php include'style3.css' ?>
    </style>
    <?php  if (isset($_SESSION['username'])) : ?>
            <strong>
            <h1>User  <?php echo $_SESSION['username']; ?></h1>
            </strong>
        </p>
<?php endif ?>
<?php  if (isset($_SESSION['username'])) : ?>

<?php $username=$_SESSION['username']; ?>
<?php endif ?>
<form method="post">
    <div class="input-group">
        <label><h3>Product</h3></label>
    </div>
    <div class="input-group">
        
    </div>
    <div class="input-group">
            <select name="name">
                <option>Select Product</option>
                    <?php 
                   
                    while($row=mysqli_fetch_assoc($res)){
                    
                        if($row['name']==$name){
                            echo "<option selected value=".$row['name'].">".$row['name']."</option>";     
                        }else{
                            echo "<option value=".$row['name'].">".$row['name']."</option>";     
                            }
                        }
                    ?>
            </select>
    </div>
    <div class="input-group">
            <input type="number" name="contact">Your Contact Info :</input>
        </div>
        <div class="input-group">
            <button type="submit" class="btn"
                        name="submit">
               Buy
            </button>
        </div>
        <div class="input-group">
            <a href="home1.php">
               <h3>Cancel</h3>
            </a>
        </div>
</form>





