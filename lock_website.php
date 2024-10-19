<?php
// Set the timezone
date_default_timezone_set('Asia/Colombo');

// Get the current time
$current_time = date("h:i A");

// Set the shop opening and closing times
$opening_time = "7:00 AM";
$closing_time = "05:00 PM";

// Check if the shop is closed
if (strtotime($current_time) < strtotime($opening_time) || strtotime($current_time) > strtotime($closing_time)) {
    // Shop is closed, display popup message
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Shop Closed</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: rgba(0,0,0,0.5); /* Semi-transparent background */
            }
            .popup {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                text-align: center;
                box-shadow: 0px 0px 20px 5px rgba(0,0,0,0.3); /* Soft shadow */
                max-width: 400px;
            }
            h1 {
                margin-top: 0;
                color: #333;
            }
            h2 {
                color: #666;
            }
            button {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s ease; /* Smooth transition */
            }
            button:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="popup">
            <h1>Sorry, we are currently closed.</h1>
            <h2>We are open from <?php echo $opening_time; ?> to <?php echo $closing_time; ?>.</h2><br><br>
            <button onclick="window.location.reload()">Reload</button>
        </div>
    </body>
    </html>
    <?php
    exit();
}
?>
