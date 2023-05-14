<?php
require "header.php"

    ?>


<?php

$conn = mysqli_connect('localhost','root','','forum_databases');

?>

<?php



if(isset($_POST['submit'])){

   $User_name = mysqli_real_escape_string($conn, $_POST['User_name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $Password = md5($_POST['Password']);
   $cpass = md5($_POST['cpass']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_storage WHERE email = '$email' && password = '$Password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($Password != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_storage(User_name, email, Password, user_type) VALUES('$User_name','$email','$Password','$user_type')";
         mysqli_query($conn, $insert);
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
   <link rel="stylesheet" href="style_for_signup.css">

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
      <p style="color: black;">Your Name<sup>*</sup></p>
      <input type="User_name" name="User_name" required placeholder="enter your name">
      <p style="color: black;">Your Email<sup>*</sup></p>
      <input type="email" name="email" required placeholder="enter your email">
      <p style="color: black;">Password<sup>*</sup></p>
      <input type="Password" name="Password" required placeholder="enter your password">
      <p style="color: black;">Confirm Password<sup>*</sup></p>
      <input type="password" name="cpass" required placeholder="confirm your password">
      <p style="color: black;">User Type<sup>*</sup></p>
      <select name="user_type">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p style="color: black;">already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>













<!-- prince code bellow, replaced with mine above, still trying 

<main>
    <div class="wrapper-main">
        <section class="section-default">
            <h1>Signup</h1>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="user">
                <input type="password" name="pass">
                <input type="rpassword" name="rpass">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
            <a href="login.php"> Signup</a>
            <form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
            </form>
        </section>
    </div>

</main> 
-->


<?php
require "footer.php"

    ?>