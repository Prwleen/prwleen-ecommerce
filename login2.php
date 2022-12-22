<?php
require('admin/connection.inc.php');
require('admin/functions.inc.php');
$username = "";
$errors = array();
$email = "";
$_SESSION['success'] = "";
if (isset($_POST['reg_user'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password_1 = mysqli_real_escape_string($con, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($con, $_POST['password_2']);

    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
  
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
  
    if (count($errors) == 0) {
         
        $password = ($password_1);
         
        $query = "INSERT INTO client_users (username, email, password)
                  VALUES('$username', '$email', '$password')";
         
        mysqli_query($con, $query);
  
        $_SESSION['username'] = $username;
         
        $_SESSION['success'] = "You have logged in";
         
        header('location: home1.php');
    }
}
  

if (isset($_POST['login_user'])) {
        $username=get_safe_value($con,$_POST['username']);//mysqli_real_escape_string get_safe_value ko satto mause hunxa if not used funcions.inc.php
        $password=get_safe_value($con,$_POST['password']);
        $sql="select * from client_users where username='$username' and password='$password'";
        $res=mysqli_query($con,$sql);
        $count=mysqli_num_rows($res);
        if($count>0){
          $_SESSION['username']=$username;
          $_SESSION['success'] = "You have logged in";
          header('location:home1.php');
          die();
        }else{
          $msg="Please Enter correct login details";
          echo $msg;
        }
	}


?>