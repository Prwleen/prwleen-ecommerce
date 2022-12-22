<?php
require('admin/connection.inc.php');
require('admin/functions.inc.php');
$name='';
$mem='';
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login.php');
}
  
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
<?php if (isset($_SESSION['username'])){
        $username=$_SESSION['username']; 
  
    }?>
<?php
$sql="select * from product order by product.id asc";
$res=mysqli_query($con,$sql);

?>
<?php
    if(isset($_POST['submit'])){
        $mem=$_SESSION['name'];
    header('location:buy.php');
    }
?>

<div><ul class="nav">
  <li><a href="home1.php">Home</a></li>
  <li><a href="contact_us.php">Contact</a></li>
  <li><a href="index1.php">Login</a></li>
  <li class="floating"><a href="admin/logout.php">Logout</a></li>
</ul>
<style>.my_table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
    margin-left: auto;
    margin-right: auto;
}
.my_table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 20px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
.my_table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 20px;
    text-shadow: 1px 1px 1px #fff;
}
.edit{
    background-color:#40E0D0;
    color: white;
}
.delete{
    background-color:#FAA0A0;
    color: white;
}
.floating{
    text-align: right;
}
h1 {
    display: block;
    font-size: 2em;
    margin-top: 0.67em;
    margin-bottom: 0.67em;
    margin-left: 0;
    margin-right: 0;
    font-weight: bold;
    text-align: left;
    color: #40E0D0;
    }
h3 {
    display: block;
    font-size: 1.5em;
    margin-top: 0.67em;
    margin-bottom: 0.67em;
    margin-left: 0;
    margin-right: 0;
    font-weight: bold;
    text-align: center;
    color: #40E0D0;
}
ul.nav {
    margin:0;
    padding:0;
    list-style:none;
    height:36px; line-height:36px;
    background:#0d7963; /* you can change the backgorund color here. */
    font-family:Arial, Helvetica, sans-serif;
    font-size:13px;
}
ul.nav li {
    border-right:1px solid #189b80; /* you can change the border color matching to your background color */
    float:left;
}
ul.nav a {
    display:block;
    padding:0 28px;
    color:#ccece6;
    text-decoration:none;
}
ul.nav a:hover,
ul.nav li.current a {
    background:#086754;
}
form {   
    border: 3px solid #f1f1f1;   
    margin: 0 auto; 
 
}   
#textboxid
{
    height:100px;
    font-size:14pt;
}
a:link { 
    text-decoration: none; 
}
a:visited { 
    text-decoration-color: darkturquoise;
}
a:active { 
    text-decoration-color: darkturquoise;
}
a{
    color: rgb(150, 0, 209);
}
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

.row {margin: 0 -5px;}

.row:after {
  content: "";
  display: table;
  clear: both;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); 
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
.btn {
	cursor: pointer;
	padding: 12px;
	font-size: 16px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 10px;
}
</style>
<div>
    <h3>Products </h3>
   <form method="post">
    <?php 
		$i=1;
			while($row=mysqli_fetch_assoc($res)){
                $prod_name=$row['name'];
            ?>
            
      <div class="column">
        <div class="row">
        <div class="card"><img width="50%" height="35%" src="media/<?php echo $row['image']?>"></div>
      </div>
      <div class="row">
      <div class="card"><?php echo $row['name']?></div>
      </div>
      <div class="row">
      <div class="card"><p>Price : </p><?php echo $row['price']?> </div>
      </div>
      <div class="row">
      <div class="card"><button class="edit" name="submit">Buy now</button></div>
      </div>
      </div>
			<?php } ?>
            </form>
</div>
</div>
</div>
</div>
</div>