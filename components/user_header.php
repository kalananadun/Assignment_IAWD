<?php

if(isset($message)){
   foreach($message as $msg){
      echo "<script>alert('$msg');</script>";
   }
}
//include 'lock_website.php';
?>

<header class="header">

   <section class="flex">

      <a href="home.php" class="logo">Fresh <span> &</span><span>Hot</span></a>

      <div class="navbar">
         <a href="home.php">Home</a>
         <a href="about.php">About</a>
            <div class="dropdown">
               <button class="dropbtn">Menu
                  <i class="fa fa-caret-down"></i>
               </button>
                     <div class="dropdown-content">
                           <a href="category.php?category=Appetizers">appetizers</a>
                           <a href="category.php?category=Mains">mains</a>
                           <a href="category.php?category=Beverages">beverages</a>
                           <a href="category.php?category=Desserts">desserts</a>
                     </div>
          </div>
          <?php if(isset($_SESSION['user_id'])): ?>
            <a href="orders.php">Myorders</a>
         <?php endif; ?>
         <a href="contact.php">Contact us</a>
      </div>

      <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">Please login first!</p>
            <a href="login.php" class="btn">Login</a>
         <?php
          }
         ?>
      </div>

   </section>

</header>

