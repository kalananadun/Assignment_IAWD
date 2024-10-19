<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $address = $_POST['address']; 
   $address = filter_var($address, FILTER_SANITIZE_STRING); 
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? OR number = ?");
   $select_user->execute([$email, $number]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0){
      $message[] = 'email or number already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }else{
         $insert_user = $conn->prepare("INSERT INTO `users`(name, email, number, address, password) VALUES(?,?,?,?,?)");
         $insert_user->execute([$name, $email, $number, $address, $cpass]);
         $message[] = 'new user registered!';
         $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
         $select_user->execute([$email, $pass]);
         $row = $select_user->fetch(PDO::FETCH_ASSOC);
         if($select_user->rowCount() > 0){
            $_SESSION['user_id'] = $row['id'];
            header('location:home.php');
         }
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <script>
function validateForm() {
    // Accessing the form using document.forms
    const form = document.forms['registrationForm'];
    
    // Get form values
    const name = form['name'].value.trim();
    const email = form['email'].value.trim();
    const number = form['number'].value.trim();
    const address = form['address'].value.trim();
    const password = form['pass'].value.trim();
    const confirmPassword = form['cpass'].value.trim();

    // Name validation
    if (name.length===0) {
        alert("Name cannot be empty.");
        return false;
    }

    // Email validation
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email) {
        alert("Email cannot be empty.");
        return false;
    } else if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    // Phone number validation
    if (!number || number.length !== 10) {
        alert("Phone number must be 10 digits long.");
        return false;
    }

    // Address validation
    if (!address) {
        alert("Address cannot be empty.");
        return false;
    }

    // Password validation
    if (!password) {
        alert("Password cannot be empty.");
        return false;
    } else if (password.length < 6) {
        alert("Password must be at least 6 characters long.");
        return false;
    }

    // Confirm Password validation
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // If all validations pass
    return true; // Allow form submission
}
</script>
</head>
<body>

<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<section class="form-container">

   <form action="" method="post">
      <h3>Register now</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box" maxlength="50">
      <input type="email" name="email" required placeholder="enter your email" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="number" name="number" required placeholder="enter your number" class="box" min="0" max="9999999999" maxlength="10">
      <input type="text" name="address" required placeholder="enter your address" class="box" maxlength="255"> 
      <input type="password" name="pass" required placeholder="enter your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" required placeholder="confirm your password" class="box" maxlength="50" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" name="submit" class="btn" onsubmit="return validateForm()">
      <p>already have an account? <a href="login.php">Login now</a></p>
   </form>

</section>











<?php include 'components/footer.php'; ?>







<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>