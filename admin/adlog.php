<?php

include '../components/connect.php';

session_start();

if(isset($_SESSION['admin_id'])){
   $admin_id = $_SESSION['admin_id'];
}else{
   $admin_id = '';
};

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = $_POST['pass'];
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `admin` WHERE name = ? AND password = ?");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $_SESSION['admin_id'] = $row['id'];
      header('location:dashboard.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
   <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Navigation bar styles */
        .navbar {
            height: 5rem;
            background-color: black;
            display: flex;
            align-items: center; /* Center items vertically */
            padding: 0 10px; /* Optional padding */
        }

        .logo {
            height: 20px; /* Adjust logo height as needed */
            transition: opacity 0.3s ease; /* Smooth transition for opacity */
        }

        /* Make the logo invisible when clicked */
        .navbar a:active .logo {
            opacity: 0; /* Change opacity to 0 on click */
        }

        /* Remove default link styling */
        .navbar a {
            text-decoration: none; /* Remove underline */
            color: white; /* Set text color to white */
            margin-left: 10px; /* Space between logo and text */
            font-size: 16px; /* Adjust font size as needed */
        }
        .x{
            font-size: 25px;
            color:white;
            font-weight:bold;
        }
    </style>

</head>
<body>
<div class="navbar">
    <div class="x">
        Admin Login
    </div>
</div>


<section class="form-container">

   <form action="" method="post">
      <h3>Login now</h3>
      <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login now" name="submit" class="btn">
      
   </form>

</section>



<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>