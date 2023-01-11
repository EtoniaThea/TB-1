<?php

require 'function.php';

if(isset($_POST['submit'])){

   $nama = mysqli_real_escape_string($db, $_POST['nama']);
   $username = mysqli_real_escape_string($db, $_POST['username']);
   $password = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $users_type = $_POST['users_type'];

   $select = " SELECT * FROM users WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($db, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($password != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO users(nama, username, password, users_type) VALUES('$nama','$username','$password','$users_type')";
         mysqli_query($db, $insert);
         header('location:login.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style_form_register.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="nama" required placeholder="enter your name">
      <input type="username" name="username" required placeholder="enter your username">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <select name="users_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>