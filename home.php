<?php

include 'components/connect.php';


session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/footer.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="hero">
   <div class="swiper hero-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Now</span>
               <h3>Delicious Juices</h3>
               <a href="menu.php" class="btn">See menu</a>
            </div>
            <div class="image">
               <img src="images/back-01.png" alt="fruits">
            </div>
         </div>
         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Now</span>
               <h3>Cravy Desserts</h3>
               <a href="menu.php" class="btn">See menu</a>
            </div>
            <div class="image">
               <img src="images/back-02.png" alt="dessert">
            </div>
         </div>
         <div class="swiper-slide slide">
            <div class="content">
               <span>Order Now</span>
               <h3>Cheesy Sandwich</h3>
               <a href="menu.php" class="btn">See menu</a>
            </div>
            <div class="image">
               <img src="images/back-03.png" alt="sandwich">
            </div>
         </div>
      </div>
      <div class="swiper-pagination"></div>
   </div>
</section>

<section class="category">

   <h1 class="title">Categories</h1>

   <div class="box-container">

      <a href="category.php?category=Appetizers" class="box">
         <img src="images/cat-1.png" alt="">
         <h3>appetizers</h3>
      </a>

      <a href="category.php?category=Mains" class="box">
         <img src="images/cat-2.png" alt="">
         <h3>mains</h3>
      </a>

      <a href="category.php?category=Beverages" class="box">
         <img src="images/cat-3.png" alt="">
         <h3>Beverages</h3>
      </a>

      <a href="category.php?category=Desserts" class="box">
         <img src="images/cat-4.png" alt="">
         <h3>desserts</h3>
      </a>

   </div>

</section>


<section class="products">

   <h1 class="title">latest dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 12");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <!--<a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>-->
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>Rs.</span><?= $fetch_products['price']; ?></div> 
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2" style="width: 30%">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

   <div class="more-btn">
      <a href="menu.php" class="btn">veiw all</a>
   </div>

</section>


<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>


<script>
   // Initialize Swiper
   var swiper = new Swiper('.hero-slider', {
      loop: true,
      autoplay: {
         delay: 3000, // Autoplay delay in milliseconds
      },
      pagination: {
         el: '.swiper-pagination',
         clickable: true,
      },
   });
</script>

</body>
</html>