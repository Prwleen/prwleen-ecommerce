<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
$name='';
$image='';
$price='';
$qty='';
if(isset($_GET['id']) && $_GET['id']!=''){
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
   		$name=$row['name'];
   		$price=$row['price'];
   		$qty=$row['qty'];
	}else{
		header('location:product.php');
		die();
	}

}

if(isset($_POST['submit'])){
    $name=get_safe_value($con,$_POST['name']);
    $price=get_safe_value($con,$_POST['price']);
    $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],'C:/xampp/htdocs/Project/media/'.$image);
    $qty=get_safe_value($con,$_POST['qty']);
	$res=mysqli_query($con,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}


	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			 mysqli_query($con,"update product set name='$name',price='$price',qty='$qty',image='$image' where id='$id'");
		}else{ 
            
			mysqli_query($con,"insert into 
            product(name,image,price,qty) values('$name','$image','$price','$qty')");
		}
		header('location:product.php');
		die();
    }
}

?>
<!doctype html>
<html>
    <title>Managing Products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<div>
    <style><?php include 'style.css'?>

    form {   
        border: 3px solid #f1f1f1;   
    }   
    input[type=text], input[type=password] {   
        width: 100%;   
        margin: 8px 0;  
        padding: 12px 20px;   
        display: inline-block;   
        border: 2px solid green;   
        box-sizing: border-box;   
    }  
    .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<h3> Insert New Info </h3>
<form action ="" method="post" enctype="multipart/form-data">
    <div>
    <label>Product Name</label>
    <input type="text" name="name" placeholder="Enter Product name"
    required 
    value="<?php echo $name?>">
    </div>
    <div class="form-group">
	<label for="categories" class=" form-control-label">Image</label>
	<input type="file" name="image" value="" required>
	</div>
	<div>
    <label>Product Price</label>
    <input type="text" name="price" placeholder="Enter Product price"
     required 
    value="<?php echo $price?>">
    </div>
    <div>
    <label>Product Quantity</label>
    <input type="text" name="qty" placeholder="Enter Product quantity"
    required 
    value="<?php echo $qty?>">
    </div>
    <button id="payment-button" name="submit" type="submit" >Submit
	</button>
    </form>
<div>
