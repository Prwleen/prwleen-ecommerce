<?php
require('connection.inc.php');


if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($username != "" && $password != ""){

        $sql_query = "select * from admin_users where username='$username' and password='$password'";
        $result = mysqli_query($con,$sql_query);
        $res=mysqli_query($con,$sql_query);
        $count=mysqli_num_rows($res);

        if($count > 0){
            $_SESSION['username'] = $username;
            header('Location: product.php');
        }else{
            echo "Invalid username and password";
        }

    }

}
?>
<!doctype html>
<head>
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
<style>   
Body {  
  font-family: Calibri, Helvetica, sans-serif;  
  background-color: darkcyan;  
}  
button {   
       background-color: #4CAF50;   
       width: 100%;  
        color: white;   
        padding: 15px;   
        margin: 10px 0px;   
        border: none;   
        cursor: pointer;   
         }   
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
 button:hover {   
        opacity: 0.7;   
    }   
  .cancelbtn {   
        width: auto;   
        padding: 10px 18px;  
        margin: 10px 5px;  
    }   
        
     
 .container {   
        padding: 25px;   
        background-color: lightblue;  
    }   
</style>   
</head>    
<body>    
    <center> <h1>Login Form </h1> </center>   
    <form method="post" action="">  
        <div class="container">   
            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required>  
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required>  
            <button type="submit" name="submit">Login</button>  
        </div>
        
    </form>     
</body>     
</html>  