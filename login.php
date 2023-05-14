<?php
require "header.php"

    ?>

<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $User_name = mysqli_real_escape_string($conn, $_POST['User_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $Password = md5($_POST['Password']);
   $cpass = md5($_POST['cpass']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_storage WHERE email = '$email' && password = '$Password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style_for_signup.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <img src="0.webp" style="top:-15%;">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <p>Enter Your Email<sup>*</sup></p>
      <input type="email" name="email" required placeholder="enter your email">
      <p>Enter Your Password<sup>*</sup></p>
      <input type="Password" name="Password" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
      <p>don't have an account? <a href="register_form.php">register now</a></p>
   </form>

</div>

</body>
</html>



















<!-- prince code below
<div>
    <form action="includes/login.inc.php" method="post">
        <input type="text" name="mailuid" value="username...">
        <input type="password" name="pass" value="password...">
        <button type="submit" name="login-submit">Login</button>
    </form>
    <a href="login.php"> Signup</a>
    <form action="includes/logout.inc.php" method="post">
        <button type="submit" name="logout-submit">Logout</button>
    </form>
</div>
-->

<?php
require "footer.php"

    ?>