
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    footer {
        background-color: #000; /* Set background color to black */
        padding: 20px;
        color: #fff; /* Set text color to white */
    }
    .social-icons a {
        margin-right: 15px;
        font-size: 1.25rem; /* Set icon size */
        color: #fff; /* Default icon color to white */
    }
    .social-icons a:hover {
        color: #ff5733; /* Change color on hover */
    }
    footer h3 {
        font-size: 1.25rem; /* Header size */
    }
    footer p, footer .form-control {
        font-size: 1.25rem; /* Paragraph and input size */
    }
    footer .btn {
        font-size: 1.25rem; /* Button size */
    }
    .input-group .form-control,
    .input-group .btn {
    height: 2rem; /* Ensures both elements take full height */
}
.subscribe-container {
      display: flex;
    }

    .subscribe-container input[type="email"] {
      border-radius: 0.25rem 0 0 0.25rem;
    }

    .subscribe-container button {
      border-radius: 0 0.25rem 0.25rem 0;
    }
    .newsletter button:hover {
            background-color: #218838; /* Darker green on hover */
        }
        .subscribe-container {
      display: flex;
      align-items: center;
    }

    .aaa {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px 0 0 5px;
      height: 40px; /* Make it the same height as the button */
      width: 300px; /* Adjust as needed */
    }

    button {
      padding: 10px;
      font-size: 16px;
      background-color: blue;
      color: white;
      border: none;
      border-radius: 0 5px 5px 0;
      height: 40px; /* Match the height of input */
    }
    .x{
        font-size: 16px;
        font-weight: bold;
    }
    #newsletter-email {
      border-radius: 0.25rem 0 0 0.25rem;
      font-weight: bold; /* Makes the text inside the input field bold */
    }

    #newsletter-submit {
      border-radius: 0 0.25rem 0.25rem 0;
      font-weight: bold; /* Makes the submit button text bold */
      background-color: blue;
      color: white;
      border: none;
    }
</style>



<footer>
<div class="x">Subscribe to our news letter</div>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="" method="POST" class="subscribe-container">
        <!-- Assign specific ID to the input -->
        <input type="email" class="form-control" id="newsletter-email" name="email" placeholder="Enter your email" required>
        <!-- Assign specific ID to the submit button -->
        <input type="submit" id="newsletter-submit" value="Subscribe">
      </form>
    </div>
  </div>
</div>

            <div class="flex-fill me-3" style="min-width: 250px;">
                <h3>Contact Information</h3>
                <p><strong>Address:</strong><br>Fresh&hot,<br>Kottawa, Pannipitiya</p>
                <p><strong>Phone:</strong><br>+94111111<br>+947123456</p>
            </div>

            <div class="flex-fill social-icons text-center" style="min-width: 250px;">
                <h3>Follow Us</h3>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
            </div>
        </div>

        <div class="text-center mt-3">
            &copy; 2024 Your Restaurant Name. All Rights Reserved.
        </div>
    </div>
</footer>

<!-- Bootstrap JS (optional) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

Ow cut krpn
<?php
include "connect.php"; // Assuming you have a database connection established
if($_POST['email']){
  $email = $_POST['email'];
}

if ($conn) {
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../home.php"); 
        exit(); 
    } else {
    }
  }

else{
}

// Close the connection
$conn = null;?>


